const archiver = require( 'archiver' ),
	fs = require( 'fs' ),
	path = require( 'path' ),
	rimraf = require( 'rimraf' ),
	chalk = require( 'chalk' );

/**
 * @param {Object} options Module Options
 *
 * @returns {Promise}
 */
module.exports = ( options ) => {

	let opts = Object.assign( {
		source: null,
		path: process.cwd(),
		name: 'build',
		extension: 'auto',
		type: 'glob',
		globOpts: {},
		archiver: {
			format: 'zip',
			options: {
				zlib: {
					level: 9
				}
			}
		},
	}, options );

	if ( 'auto' === opts.extension ) {
		opts.extension = 'zip' === opts.archiver.format ? '.zip' : '.tar.gz';
	}

	console.log( chalk`{magenta Building archive:} ${ opts.name }${ opts.extension }` );

	const archive = archiver( opts.archiver.format, opts.archiver.options ),
		stream = fs.createWriteStream( opts.path + path.sep + opts.name + opts.extension );

	return new Promise( ( resolve, reject ) => {
		archive[ opts.type ]( opts.source, opts.globOpts )
			.on( 'error', err => {
				console.log( "\n" + chalk.red.bold( `✖  Unable to build ${ opts.name }${ opts.extension }!\n` ) );
				reject( err )
			} )
			.pipe( stream );

		stream.on( 'close', () => {
			console.log( chalk`{magenta Cleaning up temp files in:} ${ path.relative( process.cwd(), opts.globOpts.cwd ) }` );
			rimraf( opts.globOpts.cwd, () => {
				console.log( "\n" + chalk`{green.bold  ✔  Successfully built ${ opts.name }${ opts.extension }!}\n` );
				console.log( '    File located in: ' );
				console.log( '    ' + chalk.reset.underline( opts.path ) + "\n" );
				resolve();
			} );
		} );

		archive.finalize();
	} );
};
