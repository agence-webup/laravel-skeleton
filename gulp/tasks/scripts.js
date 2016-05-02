module.exports = function (gulp, plugins, path) {
    return function() {
        return gulp.src([path.js.src, "!" + path.jsBundle.src])
        .pipe(plugins.plumber())
        .pipe(plugins.uglify())
        .pipe(gulp.dest(path.js.dist))
    }
};
