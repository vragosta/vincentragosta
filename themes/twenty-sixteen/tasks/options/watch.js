module.exports = {
	livereload: {
		files: [ '*.css', 'assets/css/*.css', 'assets/js/*.js', '*.php', '**/*.php' ],
		options: {
			livereload: true
		}
	},
	styles: {
		files: [ 'assets/css/sass/**/*.scss', 'assets/css/sass/**/**/**/*.scss', 'assets/css/sass/**/**/*.scss' ],
		options: {
			debounceDelay: 500
		}
	},
	scripts: {
		files: [ 'assets/js/*.js', 'assets/js/src/**/*.js', 'assets/js/vendor/**/*.js' ],
		tasks: [ 'jshint' ],
		options: {
			debounceDelay: 500
		}
	}
};
