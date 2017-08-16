module.exports = {
	all: {
		files: {
			'assets/js/vincentragosta---twenty-sixteen.min.js': [ 'assets/js/vincentragosta---twenty-sixteen.js' ],
		},
		options: {
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
				' * <%= pkg.homepage %>\n' +
				' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
				' * Licensed GPL-2.0+' +
				' */\n',
			mangle: {
				except: [ 'jQuery' ]
			}
		}
	}
};
