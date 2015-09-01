var srcFolder = '';
var distFolder = '';

module.exports = {
	less: {
		src: srcFolder + '/assets/less/style.less',
		dest: distFolder + '/assets/css',
		watch: srcFolder + '/assets/less/**/*'
	},
	images: {
		src: srcFolder + '/assets/img/**/*',
		dest: distFolder + '/assets/img/',
		watch: srcFolder + '/assets/img/**/*'
	}
};
