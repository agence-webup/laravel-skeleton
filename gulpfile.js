var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var config = require('./gulp/config.js');
var merge = require('merge-stream');
var browserSync = require('browser-sync');

var reload = browserSync.reload;

/**
 * Front : compile LESS files
 */
gulp.task('less', require('./gulp/tasks/less')(gulp, plugins, config.front, reload));

/**
 * Front : optimize images
 */
gulp.task('images', require('./gulp/tasks/images')(gulp, plugins, config.front));

/**
 * Front : bundle and minify scripts
 */
gulp.task('scripts', function(){
	var uglify = require('./gulp/tasks/scripts')(gulp, plugins, config.front)();
	var concat = require('./gulp/tasks/bundle')(gulp, plugins, config.front)();
	return merge(uglify, concat);
});

/**
 * Live reloads and synschronised browser testing
 */
gulp.task('browser-sync', function() {
    browserSync({
        proxy: config.env.proxy,
		port: config.env.port,
        tunnel: config.env.tunnel
    });
});

/**
 * Watch files for changes
 */
gulp.task('watch', ['browser-sync'], function() {
	gulp.watch(config.front.less.watch, ['less']);
	gulp.watch(config.front.js.watch, ['scripts']);
	gulp.watch(config.front.images.watch, ['images']);
});

gulp.task('front', ['less', 'images', 'scripts']);

gulp.task('default', ['front']);
