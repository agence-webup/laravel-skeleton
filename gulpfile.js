var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var config = require('./gulp/config.js');
var merge = require('merge-stream');
var browserSync = require('browser-sync');

var reload = browserSync.reload;

/**
 * Front : compile LESS files
 */
gulp.task('less', require('./gulp/tasks/less')(gulp, plugins, config.paths.front, config, reload));

/**
 * Front : optimize images
 */
gulp.task('images', require('./gulp/tasks/images')(gulp, plugins, config.paths.front));

/**
 * Front : bundle and minify scripts
 */
gulp.task('scripts', function() {
    var uglify = require('./gulp/tasks/scripts')(gulp, plugins, config.paths.front)();
    var concat = require('./gulp/tasks/bundle')(gulp, plugins, config.paths.front)();
    return merge(uglify, concat);
});


/**
 * Admin : compile LESS files
 */
gulp.task('admin:less', require('./gulp/tasks/less')(gulp, plugins, config.paths.admin, config, reload));


/**
 * Admin : bundle and minify scripts
 */
gulp.task('admin:scripts', function() {
    var uglify = require('./gulp/tasks/scripts')(gulp, plugins, config.paths.admin)();
    var concat = require('./gulp/tasks/bundle')(gulp, plugins, config.paths.admin)();
    return merge(uglify, concat);
});

/**
 * Live reloads and synschronised browser testing
 */
gulp.task('browser-sync', function() {
    browserSync({
        proxy: config.proxy,
        port: config.port,
        tunnel: config.tunnel,
        open: false
    });
});

/**
 * Watch files for changes
 */
gulp.task('watch', ['browser-sync'], function() {
    gulp.watch(config.paths.front.less.watch, ['less']);
    gulp.watch(config.paths.front.js.watch, ['scripts']);
    gulp.watch(config.paths.front.images.watch, ['images']);

    gulp.watch(config.admin.less.watch, ['admin:less']);
    gulp.watch(config.admin.js.watch, ['admin:scripts']);
});

gulp.task('front', ['less', 'images', 'scripts']);
gulp.task('admin', ['admin:less', 'admin:scripts']);

gulp.task('default', ['front', 'admin']);
