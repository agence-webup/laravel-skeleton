var plugins = require('gulp-load-plugins')();

var srcFolder = 'resources/assets';
var distFolder = 'public/assets';
var adminBasePath = 'admin';

var path = require('path');

/**
 * Get the first value which exist inside an array
 */
function getValue(values) {
    var value;
    values.forEach(function(val) {
        if (!value && val !== undefined) {
            value = val;
        }
    })
    return value;
}

module.exports = {
    proxy: getValue([process.env['GULP_BS_PROXY'], plugins.util.env.proxy, "127.0.0.1:8000"]),
    port: getValue([process.env['GULP_BS_PORT'], plugins.util.env.port, 3000]),
    tunnel: getValue([process.env['GULP_BS_TUNNEL'], plugins.util.env.tunnel, false]),
    assetsBaseUrl: getValue([process.env['GULP_ASSETS_BASE_URL'], false]),
    env: getValue([process.env['GULP_ENV'], plugins.util.env.env, 'production']),
    paths: {
        front: {
            less: {
                src: srcFolder + '/less/style.less',
                dist: distFolder + '/css',
                watch: srcFolder + '/less/**/*'
            },
            images: {
                src: srcFolder + '/img/**/*',
                dist: distFolder + '/img/',
                watch: srcFolder + '/img/**/*'
            },
            js: {
                src: path.join(srcFolder, '/js/**/*.js'),
                dist: path.join(distFolder, '/js'),
                watch: path.join(srcFolder, '/js/**/*')
            },
            jsBundle: {
                src: path.join(srcFolder, '/js/*.js'),
                dist: path.join(distFolder, '/js/'),
                watch: path.join(srcFolder, '/js/*.js')
            }
        },
        admin: {
            less: {
                src: path.join(srcFolder, '/admin/less/admin.less'),
                dist: path.join(distFolder, '/admin/css'),
                watch: path.join(srcFolder, '/admin/less/**/*')
            },
            js: {
                src: path.join(srcFolder, '/admin/js/**/*.js'),
                dist: path.join(distFolder, '/admin/js'),
                watch: path.join(srcFolder, '/admin/js/**/*')
            },
            jsBundle: {
                src: path.join(srcFolder, '/admin/js/*.js'),
                dist: path.join(distFolder, '/admin/js/'),
                watch: path.join(srcFolder, '/admin/js/*.js')
            }
        }
    }
};
