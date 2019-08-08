const gulp = require('gulp')
const Gulpy = require('@agence-webup/gulpy')

// config
const gulpy = new Gulpy({
  publicFolder: 'public',
  manifest: 'public/rev-manifest.json'
})

// front
const sass = gulpy.sass('resources/assets/sass/style.scss', 'public/assets/css')
const js = gulpy.js(['resources/assets/js/**/*', '!src/js/*.js'], 'public/assets/js')
const bundle = gulpy.bundle('resources/assets/js/*.js', 'public/assets/js', 'bundle.js')
const images = gulpy.images('resources/assets/img/**/*', 'public/assets/img')
const clean = gulpy.clean(['public/assets/**'])
const copyNpm = gulpy.copyNpm('public/node_modules')
const version = gulpy.version(['public/assets/**/*', 'public/vue/**/*'])

// admin
const sassAdmin = gulpy.sass('resources/assets/admin/sass/admin.scss', 'public/assets/admin/css')
const jsAdmin = gulpy.js(['resources/assets/admin/js/**/*'], 'public/assets/admin/js')

// export
exports.default = gulp.series(clean, gulp.parallel(sass, js, bundle, images, copyNpm, sassAdmin, jsAdmin))

if (gulpy.isProduction()) {
  exports.default = gulp.series(exports.default, version)
}
exports.watch = gulpy.watch()
