<?php

if( !function_exists ('strapit_shortcodes_scripts') ) :
	function strapit_shortcodes_scripts() {
		wp_enqueue_script('jquery');
		wp_register_script( 'strapit_toggle', plugin_dir_url( __FILE__ ) . 'js/strapit_toggle.js', 'jquery', '1.0', true );
		wp_register_script( 'strapit_accordion', plugin_dir_url( __FILE__ ) . 'js/strapit_accordion.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0', true );
		wp_enqueue_style('strapit_shortcode_styles', plugin_dir_url( __FILE__ ) . 'css/strapit_shortcodes_styles.css');
	}
	add_action('wp_enqueue_scripts', 'strapit_shortcodes_scripts');
endif;