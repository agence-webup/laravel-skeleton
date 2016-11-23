module.exports = function(gulp, plugins, path) {
    return gulp.src([path.js.src, "!" + path.jsBundle.src])
        .pipe(plugins.plumber())
        .pipe(plugins.babel({
            presets: ['es2015']
        }))
        .pipe(plugins.uglify())
        .pipe(gulp.dest(path.js.dist))
};
