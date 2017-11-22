module.exports = function (grunt) {

	// Configure task(s)
	grunt.initConfig({
		pkg: grunt.file.readJSON( 'package.json' ),
		uglify: {
			build: {
				files: {
					'assets/js/vincentragosta---twenty-sixteen.js' : 'assets/js/vincentragosta---twenty-sixteen.js',
					'../../plugins/image-captions/assets/js/image-captions---twenty-sixteen.js' : '../../plugins/image-captions/assets/js/image-captions---twenty-sixteen.js'
				}
			},
			dev: {
				options: {
					beautify: true,
					mangle: false,
					compress: false,
					preserveComments: 'all'
				},
				files: {
					'assets/js/vincentragosta---twenty-sixteen.js' : 'assets/js/vincentragosta---twenty-sixteen.js',
					'../../plugins/image-captions/assets/js/image-captions---twenty-sixteen.js' : '../../plugins/image-captions/assets/js/image-captions---twenty-sixteen.js'
				}
			}
		},
		sass: {
			build: {
				options: {
					outputStyle: 'compressed'
				},
				files: {
					'assets/css/vincentragosta---twenty-sixteen.css' : 'assets/scss/vincentragosta---twenty-sixteen.scss',
					'assets/css/vincentragosta-admin---twenty-sixteen.css' : 'assets/scss/vincentragosta-admin---twenty-sixteen.scss',
					'../../plugins/image-captions/assets/css/image-captions---twenty-sixteen.css' : '../../plugins/image-captions/assets/scss/image-captions---twenty-sixteen.scss'
				}
			},
			dev: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'assets/css/vincentragosta---twenty-sixteen.css' : 'assets/scss/vincentragosta---twenty-sixteen.scss',
					'assets/css/vincentragosta-admin---twenty-sixteen.css' : 'assets/scss/vincentragosta-admin---twenty-sixteen.scss',
					'../../plugins/image-captions/assets/css/image-captions---twenty-sixteen.css' : '../../plugins/image-captions/assets/scss/image-captions---twenty-sixteen.scss'
				}
			}
		},
		watch: {
			js: {
				files: [ 'assets/js/vincentragosta---twenty-sixteen.js', '../../plugins/image-captions/assets/js/image-captions---twenty-sixteen.js' ],
				tasks: [ 'uglify:dev' ]
			},
			css: {
				files: [ 'assets/scss/**/*.scss', '../../plugins/image-captions/assets/scss/**/*.scss' ],
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
