module.exports = function (gulp, plugins, config) {
    return function() {
        return gulp.src(config.jsBundle.src)
        .pipe(plugins.plumber())
        .pipe(plugins.concat('bundle.js'))
        .pipe(plugins.uglify({
            mangle: true
        }))
        .pipe(gulp.dest(config.jsBundle.dist))
    }
};
