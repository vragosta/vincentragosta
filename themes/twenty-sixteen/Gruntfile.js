module.exports = function (grunt) {

	// Configure task(s)
	grunt.initConfig({
		pkg: grunt.file.readJSON( 'package.json' ),
		uglify: {
			build: {
				src: 'assets/js/src/vincentragosta---twenty-sixteen.js',
				dest: 'assets/js/vincentragosta---twenty-sixteen.js'
			},
			dev: {
				options: {
					beautify: true,
					mangle: false,
					compress: false,
					preserveComments: 'all'
				},
				src: 'assets/js/src/vincentragosta---twenty-sixteen.js',
				dest: 'assets/js/vincentragosta---twenty-sixteen.js'
			}
		},
		sass: {
			build: {
				options: {
					outputStyle: 'compressed'
				},
				files: {
					'assets/css/vincentragosta---twenty-sixteen.css' : 'assets/scss/vincentragosta---twenty-sixteen.scss'
				}
			},
			dev: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'assets/css/vincentragosta---twenty-sixteen.css' : 'assets/scss/vincentragosta---twenty-sixteen.scss'
				}
			}
		},
		watch: {
			js: {
				files: [ 'assets/js/src/vincentragosta---twenty-sixteen.js' ],
				tasks: [ 'uglify:dev' ]
			},
			css: {
				files: [ 'assets/scss/**/*.scss' ],
				tasks: [ 'sass:dev' ]
			}
		}
	});

	// Load the plugins
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-sass' );

	// Register task(s)
	grunt.registerTask( 'default', [ 'uglify:dev', 'sass:dev' ] );
	grunt.registerTask( 'build', [ 'uglify:build', 'sass:build' ] );

};
