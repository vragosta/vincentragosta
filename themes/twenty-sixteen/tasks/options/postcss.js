module.exports = {
	dist: {
		options: {
			processors: [
				require( 'autoprefixer' )( {
					browsers: 'last 2 versions'
				} )
			]
		},
		files: {
			'assets/css/vincentragosta---admin.min.css': [ 'assets/css/admin.min.css' ],
			'assets/css/vincentragosta---twenty-sixteen.min.css': [ 'assets/css/vincentragosta---twenty-sixteen.min.css' ],
		}
	}
};
