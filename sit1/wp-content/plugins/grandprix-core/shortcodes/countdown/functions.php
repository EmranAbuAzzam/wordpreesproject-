<?php

if ( ! function_exists( 'grandprix_core_add_countdown_shortcodes' ) ) {
	function grandprix_core_add_countdown_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'GrandPrixCore\CPT\Shortcodes\Countdown\Countdown'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'grandprix_core_filter_add_vc_shortcode', 'grandprix_core_add_countdown_shortcodes' );
}

if ( ! function_exists( 'grandprix_core_set_countdown_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for countdown shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function grandprix_core_set_countdown_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-countdown';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'grandprix_core_filter_add_vc_shortcodes_custom_icon_class', 'grandprix_core_set_countdown_icon_class_name_for_vc_shortcodes' );
}