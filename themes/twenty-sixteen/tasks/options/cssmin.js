module.exports = {
	options: {
		banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
			' * <%=pkg.homepage %>\n' +
			' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
			' * Licensed GPL-2.0+' +
			' */\n'
	},
	minify: {
		expand: true,

		cwd: 'assets/css/',
		src: ['vincentragosta---twenty-sixteen.css', 'admin.css'],

		dest: 'assets/css/',
		ext: '.min.css'
	},
	imageCaptions: {
		expand: true,

		cwd: '../../plugins/image-captions/assets/css/',
		src: ['image-captions---twenty-sixteen.css'],

		dest: '../../plugins/image-captions/assets/css/',
		ext: '.min.css'
	}
};
