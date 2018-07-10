import _path from 'path';
import gulp from 'gulp';
import through from 'through2';
import pngquant from 'imagemin-pngquant';

module.exports = (taskName, plugins, path, config) => {
    return gulp.src(path.images.src, {since: gulp.lastRun(taskName)})
        .pipe(plugins.imagemin({
            progressive: true,
            svgoPlugins: [{ removeViewBox: false }],
            use: [pngquant()]
        }))
        .pipe(config.production ? plugins.rev() : through.obj())
        .pipe(gulp.dest(path.images.dist))
        .pipe(config.production ? plugins.rename((p) => {
            p.dirname = _path.join(path.images.manifestPrefix, p.dirname);
        }) : through.obj())
        .pipe(config.production ? plugins.rev.manifest(config.paths.manifestFile, config.manifest) : through.obj())
        .pipe(config.production ? gulp.dest(config.paths.publicFolder) : through.obj());
};
