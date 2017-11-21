module.exports = function (grunt) {

	// Configure task(s)
	grunt.initConfig({
		pkg: grunt.file.readJSON( 'package.json' ),
		uglify: {
			build: {
				src: 'src/js/*.js',
				dest: ''
			}
		}
	});

	// Load the plugins
	grunt.loadNpmTasks();

	// Register task(s)
	grunt.registerTask( 'default', [] );

};
