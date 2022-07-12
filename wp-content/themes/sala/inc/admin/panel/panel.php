<?php
/**
 * Sala Admin Panel
 */
class Sala_Admin {

	/**
	 * Constructor
	 * Sets up the panel pages
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'sala_panel_register_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'sala_panel_enqueue' ) );

		$this->sala_panel_includes();
		
	} // end constructor

	/**
	 * Load panel screen css
	 */
	public function sala_panel_enqueue() {

		if( is_rtl() ) {
			wp_enqueue_style( 'sala-panel-css', get_template_directory_uri() . '/inc/admin/panel/css/panel-rtl.css', SALA_THEME_VERSION );
		}else{
			wp_enqueue_style( 'sala-panel-css', get_template_directory_uri() . '/inc/admin/panel/css/panel.css', SALA_THEME_VERSION );
		}

		wp_enqueue_script( 'sala-panel-js', get_template_directory_uri() . '/inc/admin/panel/js/panel.js', array('jquery'), SALA_THEME_VERSION, true);

		$ajax_url     = admin_url( 'admin-ajax.php' );
		$current_lang = apply_filters( 'wpml_current_language', null );
		if ( $current_lang ) {
			$ajax_url = add_query_arg( 'lang', $current_lang, $ajax_url );
		}

		wp_localize_script('sala-panel-js', 'sala_panel_vars',
            array(
                'ajax_url' => esc_url( $ajax_url ),
            )
        );
	}

	/**
	 * Load panel file
	 */
	public function sala_panel_includes() {
		require_once( get_template_directory() . '/inc/admin/panel/class-panel.php' );
		require_once( get_template_directory() . '/inc/admin/panel/class-export.php' );
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.0.0
	 */
	public function sala_panel_register_menu() {
		add_menu_page( 'Welcome to Sala', 'Sala', 'manage_options', 'sala-panel', array( $this, 'sala_panel_welcome' ), get_template_directory_uri() . '/inc/admin/panel/logo.png', '2');

		add_submenu_page('sala-panel', 'System', 'System', 'manage_options', 'sala-panel-info', array( $this, 'sala_panel_info') );

		add_submenu_page('sala-panel', 'Change log', 'Change log', 'manage_options', 'sala-panel-changelog', array( $this, 'sala_panel_changelog') );

	    add_submenu_page('sala-panel', '', 'Customize', 'manage_options', 'customize.php' );
	}

	/**
	 * The welcome screen
	 * @since 1.0.0
	 */
	public function sala_panel_welcome() {
		?>
		<div class="sala-panel">
			<div class="wrap about-wrap">
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/alert.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/section-liense.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/section-welcome.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/section-plugins.php' ); ?>
			</div>
		</div>
		<?php
	}

	public function sala_panel_info() {
		?>
		<div class="sala-panel">
			<div class="wrap about-wrap">
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/alert.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/section-info.php' ); ?>
			</div>
		</div>
		<?php
	}

	public function sala_panel_changelog() {
		?>
		<div class="sala-panel">
			<div class="wrap about-wrap">
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/alert.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/section-changelog.php' ); ?>
			</div>
		</div>
		<?php
	}

	public function sala_panel_tutorials() {
		?>
		<div class="sala-panel">
			<div class="wrap about-wrap">
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/alert.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/tab-tutorials.php' ); ?>
			</div>
		</div>
		<?php
	}

	public function sala_panel_plugins() {
		?>
		<div class="sala-panel">
			<div class="wrap about-wrap">
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/alert.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/tab-plugins.php' ); ?>
			</div>
		</div>
		<?php
	}

	public function sala_panel_support() {
		?>
		<div class="sala-panel">
			<div class="wrap about-wrap">
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/alert.php' ); ?>
				<?php require_once( get_template_directory() . '/inc/admin/panel/sections/tab-support.php' ); ?>
			</div>
		</div>
		<?php
	}

}

$GLOBALS['Sala_Admin'] = new Sala_Admin();