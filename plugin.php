<?php
/*
Plugin Name: Quotes Post Type
Version: 0.1
Description: Add the quotes custom post type .
Author: Mikel King
Text Domain: quotes-post-type
License: BSD(3 Clause)
License URI: http://opensource.org/licenses/BSD-3-Clause

    Copyright (C) 2016, Mikel King, rd.com, (mikel.king AT rd DOT com)
    All rights reserved.

    Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:

        * Redistributions of source code must retain the above copyright notice, this
        list of conditions and the following disclaimer.

        * Redistributions in binary form must reproduce the above copyright notice,
        this list of conditions and the following disclaimer in the documentation
        and/or other materials provided with the distribution.

        * Neither the name of the {organization} nor the names of its
        contributors may be used to endorse or promote products derived from
        this software without specific prior written permission.

    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
    AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
    IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
    DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
    FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
    DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
    SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
    CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
    OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
    OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

require( 'inc/quote-cpt.php' );

class Quote_Controller extends WP_Base {
	const VERSION     = '0.0.1';

	public $quote;

	public function __construct() {
		// sets up the activation, deactivation & uninstall plugin hooks
		$this->init();
		$this->quote = new Quote_CPT();
	}

	public function activator() {
		// setup listicle post type
		$this->quote = new Quote_CPT();

		// flush the rules to add the appropriate endpoint
		flush_rewrite_rules();
	}
}

$q = Quote_Controller::get_instance();
