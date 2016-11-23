module.exports = function(gulp, plugins, path) {
    return gulp.src(path.jsBundle.src)
        .pipe(plugins.plumber())
        .pipe(plugins.babel({
            presets: ['es2015']
        }))
        .pipe(plugins.concat('bundle.js'))
        .pipe(plugins.uglify({
            mangle: true
        }))
        .pipe(gulp.dest(path.jsBundle.dist))
};
