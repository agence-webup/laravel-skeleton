module.exports = function (gulp, plugins, path, config, reload) {
    return function() {
        return gulp.src(path.less.src)
        .pipe(plugins.plumber())
        .pipe(plugins.less().on('error', function(err){
            plugins.util.log(err);
            this.emit('end');
        }))
        .pipe(plugins.autoprefixer({
            browsers: ['> 1%', 'last 2 versions'],
            cascade: false
        }))
        .pipe(config.env == 'production' && config.env.assetsBaseUrl ? plugins.cssUrlPrefixer(config.env.assetsBaseUrl) : plugins.util.noop())
        .pipe(config.env == 'production' ? plugins.minifyCss() : plugins.util.noop())
        .pipe(gulp.dest(path.less.dist))
        .pipe(reload({stream:true}));
    }
};
