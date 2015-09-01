var pngquant = require('imagemin-pngquant');

module.exports = function (gulp, plugins, config) {
    return function() {
        gulp.src(config.images.src)
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(config.images.dest));
    }
};
