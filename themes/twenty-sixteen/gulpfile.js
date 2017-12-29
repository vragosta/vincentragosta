'use strict';

var gulp = require( 'gulp' ),
	uglify = require( 'gulp-uglify' ),
	sass = require( 'gulp-sass' ),
	maps = require( 'gulp-sourcemaps' );

gulp.task( 'minifyScripts', function() {
	gulp.src( 'assets/js/vincentragosta---twenty-sixteen.js' )
		.pipe( uglify() )
		.pipe( gulp.dest( 'assets/js' ) );
} );

gulp.task( 'expandScripts', function() {
	gulp.src( 'assets/js/vincentragosta---twenty-sixteen.js' )
		.pipe( uglify( {
			mangle : false,
			output : {
				beautify : true
			}
		} ) )
		.pipe( gulp.dest( 'assets/js' ) );
} );

gulp.task( 'compileSass', function() {
	gulp.src( 'assets/scss/vincentragosta---twenty-sixteen.scss' )
	.pipe( maps.init() )
	.pipe( sass( {
		outputStyle : 'compressed'
	} ) )
	.pipe( maps.write( './' ) )
	.pipe( gulp.dest( 'assets/css') );
});

gulp.task( 'expandSass', function() {
	gulp.src( 'assets/scss/vincentragosta---twenty-sixteen.scss' )
	.pipe( maps.init() )
	.pipe( sass() )
	.pipe( maps.write( './' ) )
	.pipe( gulp.dest( 'assets/css') );
})

gulp.task( 'dev', [ 'expandScripts', 'expandSass' ] );
gulp.task( 'build', [ 'minifyScripts', 'compileSass' ] );
