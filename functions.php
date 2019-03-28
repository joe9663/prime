<?php
/**
 * Include the BoldGrid Theme Framework
 *
 * @package Prime
 */

require_once get_theme_file_path( 'inc/boldgrid-theme-framework-config/config.php' );
require_once get_parent_theme_file_path( 'inc/boldgrid-theme-framework/boldgrid-theme-framework.php' );

if ( class_exists( 'Boldgrid_Framework' ) ) {
	require_once get_parent_theme_file_path( 'inc/class-boldgrid-crio-welcome.php' );
	$crio_welcome = new BoldGrid_Crio_Welcome();
	$crio_welcome->add_hooks();
}
