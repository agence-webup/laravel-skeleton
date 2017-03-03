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
    proxy: getValue([plugins.util.env.proxy, "127.0.0.1:8000"]),
    port: getValue([plugins.util.env.port, 3000]),
    tunnel: getValue([plugins.util.env.tunnel, false]),
    env: getValue([process.env['APP_ENV'], plugins.util.env.env, 'production']),
    cachebuster: getValue([process.env['CACHEBUSTER_ENABLED'], 'false']),
    paths: {
        front: {
            less: {
                src: path.join(srcFolder, '/less/style.less'),
                dist: path.join(distFolder, '/css'),
                watch: path.join(srcFolder, '/less/**/*')
            },
            images: {
                src: path.join(srcFolder, '/img/**/*'),
                dist: path.join(distFolder, '/img/'),
                watch: path.join(srcFolder,'/img/**/*')
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
