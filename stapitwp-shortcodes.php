<?php
/*
Plugin Name: StrapitWP Shortcodes
Plugin URI: http://digitalfirstmedia.com
Description: A Strapit shortcodes plugin
Author: Debbie Gray
Author URI: http://digitalfirstmedia.com
Version: 1.0
License: GNU General Public License version 3.0
*/


// Include functions
require_once( dirname(__FILE__) . '/includes/scripts.php' ); // Adds plugin JS and CSS
require_once( dirname(__FILE__) . '/includes/shortcode-functions.php'); // Main shortcode functions
require_once( dirname(__FILE__) . '/includes/mce/strapit_shortcodes_tinymce.php'); // Add mce buttons to post editor