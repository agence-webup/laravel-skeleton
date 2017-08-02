module.exports = function(gulp, plugins, path, config, reload) {
    return gulp.src(path.less.src)
        .pipe(plugins.plumber())
        .pipe(plugins.less().on('error', function(err) {
            plugins.util.log(err);
            this.emit('end');
        }))
        .pipe(plugins.autoprefixer({
            browsers: ['> 1%', 'last 2 versions'],
            cascade: false
        }))
        .pipe(config.cachebuster == 'true' ? plugins.cssBuster({
            assetsPath: 'resources/assets/less'
        }) : plugins.util.noop())
        .pipe(config.env == 'production' ? plugins.cleanCss() : plugins.util.noop())
        .pipe(gulp.dest(path.less.dist))
        .pipe(reload({ stream: true }));
};
