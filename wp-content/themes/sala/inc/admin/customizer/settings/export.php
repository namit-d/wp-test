<?php
/* Add admin customizer export page  */
function sala_add_customizer_export_page() {
	add_submenu_page( 'options.php', '', '', 'edit_theme_options', 'sala_export_customizer_options', 'sala_customizer_options_exporter' );
}
add_action( 'admin_menu', 'sala_add_customizer_export_page' );

if ( ! empty( $_REQUEST['page'] ) && $_REQUEST['page'] == 'sala_export_customizer_options' ) {
	ob_start();
}

function sala_customizer_options_exporter() {
	$blogname  = strtolower( str_replace( ' ', '-', get_option( 'blogname' ) ) );
	$file_name = $blogname . date( 'Ydm' ) . '.txt';

	$options = get_theme_mods();
	unset( $options['nav_menu_locations'] );

	ob_clean();

	header( "Content-type: application/text", true, 200 );
	header( "Content-Disposition: attachment; filename=\"$file_name\"" );
	header( "Pragma: no-cache" );
	header( "Expires: 0" );

	echo( serialize( $options ) );

	die();
}
