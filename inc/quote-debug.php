<?php

class Quote_Debug extends Debug {
	const DEBUG = false; // turn on debugging for intrinsic testing (required for CMS)

	/**
	 * @return bool
	 */
	public static function is_quote_debug_active() {
		return( ( isset( $_GET['debug'] ) && $_GET['debug'] === 'Quote' ) || self::DEBUG );
	}

	/**
	 * @param $quote_data
	 * @param null $additiona_msg
	 */
	public static function print_quote_data( $quote_data, $additional_msg = null ) {
		if ( self::is_quote_debug_active() ) {
			print('<h2>Quote obj</h2>' . PHP_EOL);
			if ( $additional_msg ) {
				print( $additional_msg . '<br>' .PHP_EOL );
			}
			if ( is_array( $quote_data ) ) {
				var_dump( $quote_data );
			} else {
				print( $quote_data );
			}
			print('<h3>Quote obj</h3>' . PHP_EOL);
			exit;
		}
	}

	/**
	 * @param $quote_data
	 * @param $prefix_msg
	 */
	public static function display_quote_data( $quote_data, $prefix_msg ) {
		if ( self::is_quote_debug_active() && is_admin() ) {
			$exported_msg = var_export( $quote_data, true );
			$am = new Admin_Message( $prefix_msg . $exported_msg );
			$am->display_admin_normal_message();
		} elseif ( self::is_quote_debug_active() && is_page( 'debug' ) ) {
			// http://dev.rdnap/debug/ example
			print( $prefix_msg . '<br>' . PHP_EOL );
			var_dump( $quote_data );
		}
	}
}
