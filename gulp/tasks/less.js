module.exports = function (gulp, plugins, config) {
    return function() {
        gulp.src('resources/assets/less/style.less')
        .pipe(plugins.less())
        .pipe(gulp.dest('public/assets/css'))
    }
};
