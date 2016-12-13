"use strict";

import gulp from 'gulp';
import loadPlugins from 'gulp-load-plugins';
import merge from 'merge-stream';
import browserSync from 'browser-sync';
import config from './gulp/config';

import script from './gulp/tasks/scripts';
import bundle from './gulp/tasks/bundle';
import images from './gulp/tasks/images';
import less from './gulp/tasks/less';

const plugins = loadPlugins();
const reload = browserSync.reload;

/**
 * Front : compile LESS files
 */
gulp.task('less', () => {
    less(gulp, plugins, config.paths.front, config, reload);
});

/**
 * Front : optimize images
 */
gulp.task('images', () => {
    images(gulp, plugins, config.paths.front)
});

/**
 * Front : bundle and minify scripts
 */
gulp.task('scripts', () => {
    var uglify = script(gulp, plugins, config.paths.front);
    var concat = bundle(gulp, plugins, config.paths.front);
    return merge(uglify, concat);
});


/**
 * Admin : compile LESS files
 */
gulp.task('admin:less', () => {
    less(gulp, plugins, config.paths.admin, config, reload);
});


/**
 * Admin : bundle and minify scripts
 */
gulp.task('admin:scripts', () => {
    var uglify = script(gulp, plugins, config.paths.admin);
    var concat = bundle(gulp, plugins, config.paths.admin);
    return merge(uglify, concat);
});

/**
 * Live reloads and synschronised browser testing
 */
gulp.task('browser-sync', () => {
    browserSync({
        proxy: config.proxy,
        port: config.port,
        tunnel: config.tunnel,
        open: false
    });
});

/**
 * Copy NPM dependencies to public folder
 */
gulp.task('copy-npm', function() {
  gulp.src(plugins.npmFiles(), {base:'./'}).pipe(gulp.dest('./public/'));
});

/**
 * Watch files for changes
 */
gulp.task('watch', ['browser-sync'], () => {
    gulp.watch(config.paths.front.less.watch, ['less']);
    gulp.watch(config.paths.front.js.watch, ['scripts']);
    gulp.watch(config.paths.front.images.watch, ['images']);

    gulp.watch(config.paths.admin.less.watch, ['admin:less']);
    gulp.watch(config.paths.admin.js.watch, ['admin:scripts']);
});

gulp.task('front', ['less', 'images', 'scripts']);
gulp.task('admin', ['admin:less', 'admin:scripts']);

gulp.task('default', ['front', 'admin']);
