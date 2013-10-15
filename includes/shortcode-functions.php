<?php

// Allow shortcodes in widgets

add_filter('widget_text', 'do_shortcode');


// Buttons

if( !function_exists('strapit_button_shortcode') ) {
	function strapit_button_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'color' => 'default',
			'size' => '',
			'url' => 'http://digitalfirstmedia.com',
			'title' => '',
			'target' => 'self',
			'rel' => '',
			'block' => '',
			'poptitle' => '',
			'popcontent' => '',
			'popplacement' => ''
			), $atts ) );

		$block = ($block == 'yes') ? "block " : '';
		$poptitle = ($poptitle <> '') ? "rel='popover' data-original-title='$poptitle'" : '';
		$popcontent = ($popcontent <> '') ? "data-content='$popcontent'" : '';
		$popplacement = ($popplacement <> '') ? "data-placement='$popplacement'" : '';
		
		return '<a ' . $popplacement . '' . $poptitle . '' . $popcontent . ' href="' . $url . '" class="btn ' . $size . ' ' . $color . ' ' . $block . '" target="_'.$target.'" title="'. $title .'">' .do_shortcode($content). '</a>';
	}
	add_shortcode('strapit_button', 'strapit_button_shortcode');
}

// Jumbotron

if( !function_exists('strapit_jumbotron_shortcode') ) {
	function strapit_jumbotron_shortcode( $atts, $content = null ) {
		

		$out = '<div class="jumbotron">' .do_shortcode($content). '</div>';

		return $out;
	}
	add_shortcode('strapit_jumbotron', 'strapit_jumbotron_shortcode');
}

// Well

if( !function_exists('strapit_well_shortcode') ) { 
	function strapit_well_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'width' => ''
			), $atts ) );


		return '<div class="well" style="width:'. $width .';">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('strapit_well', 'strapit_well_shortcode');
}

// Accordion

// Main
if( !function_exists('strapit_accordion_main_shortcode') ) {
	function strapit_accordion_main_shortcode( $atts, $content = null  ) {
		
		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('strapit_accordion');
		
		// Display the accordion	
		return '<div class="strapit-accordion">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'strapit_accordion', 'strapit_accordion_main_shortcode' );
}


// Section
if( !function_exists('strapit_accordion_section_shortcode') ) {
	function strapit_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title' => 'Title',
			), $atts ) );

		return '<h3 class="strapit-accordion-trigger"><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div>';
	}
	
	add_shortcode( 'strapit_accordion_section', 'strapit_accordion_section_shortcode' );
}



// Accordion Bootstrap

if( !function_exists('strapit_accordion_bootstrap_shortcode') ) {
	function strapit_accordion_bootstrap_shortcode( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'name' => '',
			), $atts));

		$output = '
		<div class="panel-group" id="'.$name.'">
		'.do_shortcode($content).'
		</div>';

		return $output;
	}
	add_shortcode('strapit_accordion_bootstrap', 'strapit_accordion_bootstrap_shortcode');
}

// Accordion Bootstrap Content
if( !function_exists('strapit_accordion_bootstrap_section_shortcode') ) {
	function strapit_accordion_bootstrap_section_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'name' => '',
			'heading' => '',
			'number' => '',
			'color' => '',
			'open' => '',
			), $atts));

		$open = ($open == 'yes') ? 'in' : '';

		$output = '

		<div class="panel panel-'.$color.'">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$name.'" href="#collapse'.$number.'">'. $heading .'</a>
		</h4>
		</div>
		<div id="collapse'.$number.'" class="panel-collapse collapse ' .$open. '">
		<div class="panel-body"> 
		'.do_shortcode($content).'
		</div>
		</div>
		</div>

		';

		return $output;
	}
	add_shortcode('strapit_accordion_bootstrap_section', 'strapit_accordion_bootstrap_section_shortcode');
}


// Tooltip


if( !function_exists('strapit_tooltip_shortcode') ) {
	function strapit_tooltip_shortcode( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'text' => '',
			'placement' => 'top',
			'color' => '',
			'size' => '',
			), $atts));

		$color = ($color <> '') ? "btn $color" : '';
		$size = ($size <> '') ? "$size" : '';

		$out = '<a class="' . $color . ' ' .$size. '" href="#" data-toggle="tooltip" rel="tooltip" data-placement="'. $placement .'" data-original-title="' . $text .'">' .do_shortcode($content). '</a>';

		return $out;
	}
	add_shortcode('strapit_tooltip', 'strapit_tooltip_shortcode');
}


// Modal

if ( !function_exists( 'strapit_modal_shortcode' ) ) {
	function strapit_modal_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id' => '1',
			'header' => '',
			'color' => 'primary',
			'size' => 'lg',
			'text' => 'Click Here',
		  ),
		  $atts ) );
		  return '<div class="modal fade" id="myModal'. $id .'" style="display: none;" tabindex="-1" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header">

					<button class="close" type="button" data-dismiss="modal">×</button>
					<h4 class="modal-title" id="myModalLabel">'. $header .'</h4>
					</div>
					<div class="modal-body">
					' . do_shortcode( $content ) . '
					</div>
					<div class="modal-footer"><button class="btn default" type="button" data-dismiss="modal">Close</button>
					</div>
					</div>
					<!-- /.modal-content -->

					</div>
					<!-- /.modal-dialog -->

					</div><a class="btn '. $color .' btn-'. $size .'" href="#myModal'. $id .'" data-toggle="modal">'. $text .'</a>';
	
	}
	add_shortcode('strapit_modal', 'strapit_modal_shortcode');
}