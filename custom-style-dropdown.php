<?php
// Add new styles to the TinyMCE "formats" menu dropdown
if ( ! function_exists( 'wusm_styles_dropdown' ) ) {
	function wusm_styles_dropdown( $settings ) {

		// Create array of new styles
		// array of arrays, see example here: http://codex.wordpress.org/TinyMCE_Custom_Styles
		$new_styles = array(
			array(
				'title'	=> 'Custom Styles',
				'items'	=> array(
					array(
						'title'	  => 'Main content callout',
						'block'	  => 'div',
						'classes' => 'callout',
						'wrapper' => 'true'
					)
				),
			),
		);

		// Merge old & new styles
		// Setting this to true will inclue the style that are included as buttons
		// by default by WordPress
		$settings['style_formats_merge'] = false;

		// Add new styles
		if( ! isset( $settings['style_formats'] ) ) {
			$settings['style_formats'] = json_encode( $new_styles );
		} else {
			$settings['style_formats'] = json_encode( array_merge( json_decode( $settings['style_formats'] ), $new_styles ) );
		}

		// Return New Settings
		return $settings;
	}
}
add_filter( 'tiny_mce_before_init', 'wusm_styles_dropdown' );
?>
