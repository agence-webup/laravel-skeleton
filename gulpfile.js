var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var config = require('./gulp/config.js');

/**
* Compile LESS files
*/
gulp.task('less', require('./gulp/tasks/less')(gulp, plugins, config));

/**
* Optimize pictures
*/
gulp.task('images', require('./gulp/tasks/images')(gulp, plugins, config));

/**
* Handle scripts with browserify and babel
*/
gulp.task('scripts', require('./gulp/tasks/scripts')(gulp, plugins, config));


gulp.task('default', function() {

});
