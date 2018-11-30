<?php
/**
 * File: premium-load.php
 *
 * BoldGrid Source Code.
 *
 * @package Boldgrid_Premium_Loader
 * @copyright BoldGrid.com
 * @version 1.0.0
 * @author BoldGrid <support@boldgrid.com>
 * @since 1.0.0
 */

/**
 * BoldGrid update class.
 *
 * @since 1.0.0
 */
class Boldgrid_Premium_Loader {
	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$autoloader_path = dirname( __DIR__ ) . '/vendor/autoload.php';

		if ( file_exists( $autoloader_path ) ) {
			$loader = require $autoloader_path;

			new Boldgrid\Library\Util\Load(
				array(
					'type'            => 'theme',
					'file'            => get_template() . '/style.css',
					'loader'          => $loader,
					'keyValidate'     => true,
					'licenseActivate' => false,
				)
			);

			if ( class_exists( 'Boldgrid\Library\Theme\Updater' ) ) {
				new Boldgrid\Library\Theme\Updater();
			}
		}
	}
}
