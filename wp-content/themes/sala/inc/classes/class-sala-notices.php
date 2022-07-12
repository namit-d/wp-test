<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Sala_Notices' ) ) {

	class Sala_Notices {

		protected static $instance = null;

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function initialize() {
			// Notice Cookie Confirm.
			add_action( 'wp_ajax_notice_cookie_confirm', array( $this, 'notice_cookie_confirm' ) );
			add_action( 'wp_ajax_nopriv_notice_cookie_confirm', array( $this, 'notice_cookie_confirm' ) );
		}

		public function notice_cookie_confirm() {
			setcookie( 'notice_cookie_confirm', 'yes', time() + 365 * 86400, COOKIEPATH, COOKIE_DOMAIN );

			wp_die();
		}

		function get_notice_cookie_messages() {
			$notice_messages = Sala_Helper::setting( 'notice_cookie_messages' );
			$button_text     = Sala_Helper::setting( 'notice_cookie_button_text' );

			$messages = '';
			$messages .= '<i class="fal fa-cookie-bite"></i>';
			$messages .= '<p>' . $notice_messages . '</p>';
			$messages .= '<a id="sala-button-cookie-notice-ok" class="sala-button full-filled size-xs wide">' . $button_text . '</a>';

			return $messages;
		}
	}

	Sala_Notices::instance()->initialize();
}
