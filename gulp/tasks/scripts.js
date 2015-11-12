module.exports = function (gulp, plugins, config) {
    return function() {
        return gulp.src([config.js.src, "!" + config.jsBundle.src])
        .pipe(plugins.plumber())
        .pipe(plugins.uglify())
        .pipe(gulp.dest(config.js.dist))
    }
};
