var pngquant = require('imagemin-pngquant');

module.exports = function (gulp, plugins, path) {
    return function() {
        return gulp.src(path.images.src)
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(path.images.dist));
    }
};
