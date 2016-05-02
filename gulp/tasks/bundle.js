module.exports = function (gulp, plugins, path) {
    return function() {
        return gulp.src(path.jsBundle.src)
        .pipe(plugins.plumber())
        .pipe(plugins.concat('bundle.js'))
        .pipe(plugins.uglify({
            mangle: true
        }))
        .pipe(gulp.dest(path.jsBundle.dist))
    }
};
