"use strict";

import gulp from 'gulp';
import loadPlugins from 'gulp-load-plugins';
import del from 'del';
import log from 'fancy-log';

import config from './gulp/config';
import script from './gulp/tasks/scripts';
import bundle from './gulp/tasks/bundle';
import images from './gulp/tasks/images';
import sass from './gulp/tasks/sass';

const browserSync = require('browser-sync').create();
const argv = require('minimist')(process.argv.slice(2));
const plugins = loadPlugins();
const reload = browserSync.reload;

// update config with argv
config.production = argv.production ? true : false;

/**
 * Front workflow
 */
gulp.task('sass', () => sass('sass', plugins, config.paths.front, config, browserSync));
gulp.task('images', () => images('images', plugins, config.paths.front, config));
gulp.task('js', () => script('js', plugins, config.paths.front, config));
gulp.task('js-bundle', () => bundle(plugins, config.paths.front, config));


/**
 * Admin workflow
 */
gulp.task('admin:sass', () => sass('admin:sass', plugins, config.paths.admin, config, browserSync));
gulp.task('admin:js', () => script('admin:js', plugins, config.paths.admin, config));
gulp.task('admin:js-bundle', () => bundle(plugins, config.paths.admin, config));

/**
 * Copy NPM dependencies to public folder
 */
gulp.task('copy-npm', () => {
    return gulp.src(plugins.npmFiles(), { base: './' }).pipe(gulp.dest('./public/'));
});


/**
 * Clean build folder and manifest file
 */
gulp.task('clean', () => {
    return del(['public/assets', 'public/rev-manifest.json']);
});

/**
 * Watch files for changes
 */
gulp.task('watch', () => {
    if (argv.proxy) {
        browserSync.init({
            proxy: argv.proxy,
            open: false,
            notify: true
        });
    }

    gulp.watch(config.paths.front.sass.watch, gulp.series('sass'));
    gulp.watch(config.paths.front.js.watch, gulp.series('js'));
    gulp.watch(config.paths.front.jsBundle.watch, gulp.series('js-bundle'));
    gulp.watch(config.paths.front.images.watch, gulp.series('images'));

    gulp.watch(config.paths.admin.sass.watch, gulp.series('admin:sass'));
    gulp.watch(config.paths.admin.js.watch, gulp.series('admin:js'));
    gulp.watch(config.paths.admin.jsBundle.watch, gulp.series('admin:js-bundle'));
});

// IMPORTANT : we need to use series since writing to the manifest doesn't play well with async
if (argv.production) {
    gulp.task('front', gulp.series('images', 'sass', 'js', 'js-bundle'));
    gulp.task('admin', gulp.series('admin:sass', 'admin:js', 'admin:js-bundle'));
    gulp.task('default', gulp.series('clean', 'front', 'admin', 'copy-npm'));
} else {
    gulp.task('front', gulp.parallel('sass', 'images', 'js', 'js-bundle'));
    gulp.task('admin', gulp.parallel('admin:sass', 'admin:js', 'admin:js-bundle'));
    gulp.task('default', gulp.series('clean', gulp.parallel('front', 'admin', 'copy-npm')));
}