module.exports = function (grunt) {

	// Configure task(s)
	grunt.initConfig({
		pkg: grunt.file.readJSON( 'package.json' ),
		uglify: {
			build: {
				src: 'assets/js/src/vincentragosta---twenty-sixteen.js',
				dest: 'assets/js/vincentragosta---twenty-sixteen.min.js'
			},
			dev: {
				options: {
					beautify: true,
					mangle: false,
					compress: false,
					preserveComments: 'all'
				},
				src: 'assets/js/src/vincentragosta---twenty-sixteen.js',
				dest: 'assets/js/vincentragosta---twenty-sixteen.min.js'
			}
		},
		watch: {
			js: {
				files: [ 'assets/js/src/vincentragosta---twenty-sixteen.js' ],
				tasks: [ 'uglify:dev' ]
			}
		}
	});

	// Load the plugins
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );

	// Register task(s)
	grunt.registerTask( 'default', [ 'uglify:dev' ] );
	grunt.registerTask( 'build', [ 'uglify:build' ] );

};
