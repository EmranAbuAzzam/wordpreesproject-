<?php
namespace GrandPrixCore\CPT\Shortcodes\AnimationHolder;

use GrandPrixCore\Lib;

class AnimationHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_animation_holder';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Animation Holder', 'grandprix-core' ),
					'base'                    => $this->base,
					"as_parent"               => array( 'except' => 'vc_row' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by GRANDPRIX', 'grandprix-core' ),
					'icon'                    => 'icon-wpb-animation-holder extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'animation',
							'heading'     => esc_html__( 'Animation Type', 'grandprix-core' ),
							'value'       => array(
								esc_html__( 'Element Grow In', 'grandprix-core' )          => 'mkdf-grow-in',
								esc_html__( 'Element Fade In Down', 'grandprix-core' )     => 'mkdf-fade-in-down',
								esc_html__( 'Element From Fade', 'grandprix-core' )        => 'mkdf-element-from-fade',
								esc_html__( 'Element From Left', 'grandprix-core' )        => 'mkdf-element-from-left',
								esc_html__( 'Element From Right', 'grandprix-core' )       => 'mkdf-element-from-right',
								esc_html__( 'Element From Top', 'grandprix-core' )         => 'mkdf-element-from-top',
								esc_html__( 'Element From Bottom', 'grandprix-core' )      => 'mkdf-element-from-bottom',
								esc_html__( 'Element Flip In', 'grandprix-core' )          => 'mkdf-flip-in',
								esc_html__( 'Element X Rotate', 'grandprix-core' )         => 'mkdf-x-rotate',
								esc_html__( 'Element Z Rotate', 'grandprix-core' )         => 'mkdf-z-rotate',
								esc_html__( 'Element Y Translate', 'grandprix-core' )      => 'mkdf-y-translate',
								esc_html__( 'Element Fade In X Rotate', 'grandprix-core' ) => 'mkdf-fade-in-left-x-rotate',
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'animation_delay',
							'heading'    => esc_html__( 'Animation Delay (ms)', 'grandprix-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'animation'       => '',
			'animation_delay' => ''
		);
		extract( shortcode_atts( $args, $atts ) );
		
		$html = '<div class="mkdf-animation-holder ' . esc_attr( $animation ) . '" data-animation="' . esc_attr( $animation ) . '" data-animation-delay="' . esc_attr( $animation_delay ) . '"><div class="mkdf-animation-inner">' . do_shortcode( $content ) . '</div></div>';
		
		return $html;
	}
}