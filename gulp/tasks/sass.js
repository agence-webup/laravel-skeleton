import gulp from 'gulp';
import _path from 'path';
import through from 'through2';
import log from 'fancy-log';

module.exports = (taskName, plugins, path, config, browserSync) => {
    return gulp.src(path.sass.src)
        .pipe(plugins.sass().on('error', plugins.sass.logError))
        .pipe(plugins.autoprefixer({
            browsers: ['> 1%', 'last 2 versions']
        }))
        .pipe(config.production ? plugins.cleanCss() : through.obj())
        .pipe(config.production ? plugins.revReplace({
            manifest: gulp.src(config.paths.manifestFile),
        }) : through.obj())
        .pipe(config.production ? plugins.rev() : through.obj())
        .pipe(gulp.dest(path.sass.dist))
        .pipe(browserSync.stream())
        .pipe(config.production ? plugins.rename((p) => {
            p.dirname = _path.join(path.sass.manifestPrefix, p.dirname);
        }) : through.obj())
        .pipe(config.production ? plugins.rev.manifest(config.paths.manifestFile, config.manifest) : through.obj())
        .pipe(config.production ? gulp.dest(config.paths.publicFolder) : through.obj());
};
