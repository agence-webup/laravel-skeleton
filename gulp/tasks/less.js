module.exports = function (gulp, plugins, config, reload) {
    return function() {
        return gulp.src(config.less.src)
        .pipe(plugins.plumber())
        .pipe(plugins.less().on('error', function(err){
            plugins.util.log(err);
            this.emit('end');
        }))
        .pipe(plugins.autoprefixer({
            browsers: ['> 1%', 'last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest(config.less.dist))
        .pipe(reload({stream:true}));
    }
};
