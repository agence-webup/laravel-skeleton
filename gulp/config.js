var plugins = require('gulp-load-plugins')();
var srcFolder = 'resources';
var distFolder = 'public';
var frontBasePath = '';
var adminBasePath = 'admin';
var path = require('path');

var proxy = plugins.util.env.proxy ? plugins.util.env.proxy : "127.0.0.1:8000";
var port = plugins.util.env.port ? plugins.util.env.port : 3000;
var tunnel = plugins.util.env.tunnel ? plugins.util.env.tunnel : false;
var dev = plugins.util.env.dev ? plugins.util.env.dev : false;

module.exports = {
	env: {
		proxy: proxy,
		port: port,
		tunnel: tunnel,
		dev: dev
	},
	front: {
		less: {
			src: srcFolder + '/assets/less/style.less',
			dist: distFolder + '/assets/css',
			watch: srcFolder + '/assets/less/**/*'
		},
		images: {
			src: srcFolder + '/assets/img/**/*',
			dist: distFolder + '/assets/img/',
			watch: srcFolder + '/assets/img/**/*'
		},
		js : {
			src: path.join(srcFolder, frontBasePath, '/assets/js/**/*.js'),
			dist: path.join(distFolder, '/assets/js'),
			watch: path.join(srcFolder, '/assets/js/**/*')
		},
		jsBundle : {
			src: path.join(srcFolder, frontBasePath, '/assets/js/*.js'),
			dist: path.join(distFolder, '/assets/js/'),
			watch: path.join(frontBasePath, '/js/*.js')
		}
	},
	admin: {

	}
};
