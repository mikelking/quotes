<?php

require( 'quote-debug.php' );

/**
 * Class Quote_CPT
 * @link https://developer.wordpress.org/resource/dashicons/#format-quote
 */
class Quote_CPT extends Custom_Post_Type_Controller {
	const NAME          = 'Quotes';
	const SINGULAR_NAME = 'Quote';
	const DESCRIPTION   = 'Quote post type';
	const MENU_ICON     = 'dashicons-format-quote';
	const TEXT_DOMAIN   = 'quote-post-type';
	const ADD_TO_ADMIN_BAR = true; // label => show_in_admin_bar
	/**
	 * Default taxonomy setting override in your child for alternatives
	 */
	public function set_taxonomies() {
		$this->taxonomies = array(
			'category',
			'post_tag',
		);
	}

	public function debug_cpt( $cpt_object = null , $msg = null ) {
		Quote_Debug::display_quote_data( $cpt_object, $msg );
	}

}
