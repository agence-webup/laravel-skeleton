const p = require('path');

const SRC = 'resources/assets';
const DIST = 'public/assets';
const adminBasePath = 'admin';

module.exports = {
    manifest: {
        merge: true,
        base: 'public'
    },
    paths: {
        manifestFile: 'public/rev-manifest.json',
        publicFolder: 'public',
        front: {
            sass: {
                src: p.join(SRC, '/sass/*.scss'),
                dist: p.join(DIST, '/css'),
                watch: p.join(SRC, '/sass/**/*'),
                manifestPrefix: 'assets/css'
            },
            images: {
                src: p.join(SRC, '/img/**/*'),
                dist: p.join(DIST, '/img/'),
                watch: p.join(SRC,'/img/**/*'),
                manifestPrefix: 'assets/img'
            },
            js: {
                src: p.join(SRC, '/js/**/*.js'),
                dist: p.join(DIST, '/js'),
                watch: [p.join(SRC, '/js/**/*'), '!' + p.join(SRC, '/js/*.js')],
                manifestPrefix: 'assets/js'
            },
            jsBundle: {
                src: p.join(SRC, '/js/*.js'),
                dist: p.join(DIST, '/js/'),
                watch: p.join(SRC, '/js/*.js'),
                manifestPrefix: 'assets/js'
            }
        },
        admin: {
            sass: {
                src: p.join(SRC, '/admin/sass/admin.scss'),
                dist: p.join(DIST, '/admin/css'),
                watch: p.join(SRC, '/admin/sass/**/*'),
                manifestPrefix: 'assets/admin/css'
            },
            js: {
                src: p.join(SRC, '/admin/js/**/*.js'),
                dist: p.join(DIST, '/admin/js'),
                watch: p.join(SRC, '/admin/js/**/*'),
                manifestPrefix: 'assets/admin/js'
            },
            jsBundle: {
                src: p.join(SRC, '/admin/js/*.js'),
                dist: p.join(DIST, '/admin/js/'),
                watch: p.join(SRC, '/admin/js/*.js'),
                manifestPrefix: 'assets/admin/js'
            }
        }
    }
};
