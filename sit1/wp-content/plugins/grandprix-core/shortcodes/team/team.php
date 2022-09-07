<?php
namespace GrandPrixCore\CPT\Shortcodes\Team;

use GrandPrixCore\lib;

class Team implements lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_team';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		$team_social_icons_array = array();
		
		for ( $x = 1; $x < 6; $x ++ ) {
			$teamIconCollections = grandprix_mikado_icon_collections()->getCollectionsWithSocialIcons();
			foreach ( $teamIconCollections as $collection_key => $collection ) {
				
				$team_social_icons_array[] = array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Social Icon ', 'grandprix-core' ) . $x,
					'param_name' => 'team_social_' . $collection->param . '_' . $x,
					'value'      => $collection->getSocialIconsArrayVC(),
					'dependency' => Array( 'element' => 'team_social_icon_pack', 'value' => array( $collection_key ) )
				);
			}
			
			$team_social_icons_array[] = array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Social Icon ', 'grandprix-core' ) . $x . esc_html__( ' Link', 'grandprix-core' ),
				'param_name' => 'team_social_icon_' . $x . '_link',
				'dependency' => array(
					'element' => 'team_social_icon_pack',
					'value'   => grandprix_mikado_icon_collections()->getIconCollectionsKeys()
				)
			);
			
			$team_social_icons_array[] = array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Social Icon ', 'grandprix-core' ) . $x . esc_html__( ' Target', 'grandprix-core' ),
				'param_name' => 'team_social_icon_' . $x . '_target',
				'value'      => array(
					esc_html__( 'Same Window', 'grandprix-core' ) => '_self',
					esc_html__( 'New Window', 'grandprix-core' )  => '_blank'
				),
				'dependency' => Array( 'element' => 'team_social_icon_' . $x . '_link', 'not_empty' => true )
			);
		}
		
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Team', 'grandprix-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by GRANDPRIX', 'grandprix-core' ),
					'icon'                      => 'icon-wpb-team extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array_merge(
						array(
							array(
								'type'        => 'dropdown',
								'param_name'  => 'type',
								'heading'     => esc_html__( 'Type', 'grandprix-core' ),
								'value'       => array(
									esc_html__( 'Info Below Image', 'grandprix-core' )    => 'info-below-image',
									esc_html__( 'Info On Image Hover', 'grandprix-core' ) => 'info-on-image'
								),
								'save_always' => true
							),
							array(
								'type'       => 'attach_image',
								'param_name' => 'team_image',
								'heading'    => esc_html__( 'Image', 'grandprix-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_name',
								'heading'    => esc_html__( 'Name', 'grandprix-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'team_name_tag',
								'heading'     => esc_html__( 'Name Tag', 'grandprix-core' ),
								'value'       => array_flip( grandprix_mikado_get_title_tag( true ) ),
								'save_always' => true,
								'dependency'  => array( 'element' => 'team_name', 'not_empty' => true )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'team_name_color',
								'heading'    => esc_html__( 'Name Color', 'grandprix-core' ),
								'dependency' => array( 'element' => 'team_name', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_position',
								'heading'    => esc_html__( 'Position', 'grandprix-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'team_position_color',
								'heading'    => esc_html__( 'Position Color', 'grandprix-core' ),
								'dependency' => array( 'element' => 'team_position', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_text',
								'heading'    => esc_html__( 'Text', 'grandprix-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'team_text_color',
								'heading'    => esc_html__( 'Text Color', 'grandprix-core' ),
								'dependency' => array( 'element' => 'team_text', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_link',
								'heading'    => esc_html__( 'Link', 'grandprix-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'team_target',
								'heading'    => esc_html__( 'Target', 'grandprix-core' ),
								'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
								'dependency' => array( 'element' => 'team_link', 'not_empty' => true )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'textual_social_icons',
								'heading'    => esc_html__( 'Display Text Instead Of Icon', 'grandprix-core' ),
								'value'      => array_flip( grandprix_mikado_get_yes_no_select_array(false, true ) )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_1',
								'heading'    => esc_html__( 'Social 1', 'grandprix-core' ),
								'dependency'  => array( 'element' => 'textual_social_icons', 'value' => array('yes') ),
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_link_1',
								'heading'    => esc_html__( 'Social 1 Link', 'grandprix-core' ),
								'dependency' => array( 'element' => 'textual_social_1', 'not_empty' => true )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'textual_social_link_target_1',
								'heading'    => esc_html__( 'Social 1 Target', 'grandprix-core' ),
								'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
								'dependency' => array( 'element' => 'textual_social_link_1', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_2',
								'heading'    => esc_html__( 'Social 2', 'grandprix-core' ),
								'dependency'  => array( 'element' => 'textual_social_icons', 'value' => array('yes') ),
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_link_2',
								'heading'    => esc_html__( 'Social 2 Link', 'grandprix-core' ),
								'dependency' => array( 'element' => 'textual_social_2', 'not_empty' => true )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'textual_social_link_target_2',
								'heading'    => esc_html__( 'Social 2 Target', 'grandprix-core' ),
								'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
								'dependency' => array( 'element' => 'textual_social_link_2', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_3',
								'heading'    => esc_html__( 'Social 3', 'grandprix-core' ),
								'dependency'  => array( 'element' => 'textual_social_icons', 'value' => array('yes') ),
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_link_3',
								'heading'    => esc_html__( 'Social 3 Link', 'grandprix-core' ),
								'dependency' => array( 'element' => 'textual_social_3', 'not_empty' => true )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'textual_social_link_target_3',
								'heading'    => esc_html__( 'Social 3 Target', 'grandprix-core' ),
								'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
								'dependency' => array( 'element' => 'textual_social_link_3', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_4',
								'heading'    => esc_html__( 'Social 4', 'grandprix-core' ),
								'dependency'  => array( 'element' => 'textual_social_icons', 'value' => array('yes') ),
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_link_4',
								'heading'    => esc_html__( 'Social 4 Link', 'grandprix-core' ),
								'dependency' => array( 'element' => 'textual_social_4', 'not_empty' => true )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'textual_social_link_target_4',
								'heading'    => esc_html__( 'Social 4 Target', 'grandprix-core' ),
								'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
								'dependency' => array( 'element' => 'textual_social_link_4', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_5',
								'heading'    => esc_html__( 'Social 5', 'grandprix-core' ),
								'dependency'  => array( 'element' => 'textual_social_icons', 'value' => array('yes') ),
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'textual_social_link_5',
								'heading'    => esc_html__( 'Social 5 Link', 'grandprix-core' ),
								'dependency' => array( 'element' => 'textual_social_5', 'not_empty' => true )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'textual_social_link_target_5',
								'heading'    => esc_html__( 'Social 5 Target', 'grandprix-core' ),
								'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
								'dependency' => array( 'element' => 'textual_social_link_5', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'team_social_icon_pack',
								'heading'     => esc_html__( 'Social Icon Pack', 'grandprix-core' ),
								'value'       => array_merge( array( '' => '' ), grandprix_mikado_icon_collections()->getIconCollectionsVCExclude( 'linea_icons' ) ),
								'dependency'  => array( 'element' => 'textual_social_icons', 'value' => array('no') ),
								'save_always' => true
							),
						),
						$team_social_icons_array
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'type'                         => 'info-below-image',
			'team_image'                   => '',
			'team_name'                    => '',
			'team_name_tag'                => 'h4',
			'team_name_color'              => '',
			'team_position'                => '',
			'team_position_color'          => '',
			'team_text'                    => '',
			'team_text_color'              => '',
			'team_link'                    => '',
			'team_target'                  => '_self',
			'textual_social_icons'         => '',
			'textual_social_1'             => '',
			'textual_social_link_1'        => '',
			'textual_social_link_target_1' => '_self',
			'textual_social_2'             => '',
			'textual_social_link_2'        => '',
			'textual_social_link_target_2' => '_self',
			'textual_social_3'             => '',
			'textual_social_link_3'        => '',
			'textual_social_link_target_3' => '_self',
			'textual_social_4'             => '',
			'textual_social_link_4'        => '',
			'textual_social_link_target_4' => '_self',
			'textual_social_5'             => '',
			'textual_social_link_5'        => '',
			'textual_social_link_target_5' => '_self',
			'team_social_icon_pack'        => ''
		);
		
		$team_social_icons_form_fields = array();
		$number_of_social_icons        = 5;
		
		for ( $x = 1; $x <= $number_of_social_icons; $x ++ ) {
			
			foreach ( grandprix_mikado_icon_collections()->iconCollections as $collection_key => $collection ) {
				$team_social_icons_form_fields[ 'team_social_' . $collection->param . '_' . $x ] = '';
			}
			
			$team_social_icons_form_fields[ 'team_social_icon_' . $x . '_link' ]   = '';
			$team_social_icons_form_fields[ 'team_social_icon_' . $x . '_target' ] = '';
		}
		
		$args = array_merge( $args, $team_social_icons_form_fields );
		
		$params = shortcode_atts( $args, $atts );
		
		$params['number_of_social_icons'] = 5;
		
		$params['type']                 = ! empty( $params['type'] ) ? $params['type'] : $args['type'];
		$params['holder_classes']       = $this->getHolderClasses( $params );
		$params['team_name_tag']        = ! empty( $params['team_name_tag'] ) ? $params['team_name_tag'] : $args['team_name_tag'];
		$params['team_social_icons']    = $this->getTeamSocialIcons( $params );
		$params['team_name_styles']     = $this->getTeamNameStyles( $params );
		$params['team_position_styles'] = $this->getTeamPositionStyles( $params );
		$params['team_text_styles']     = $this->getTeamTextStyles( $params );
		
		//Get HTML from template based on type of team
		$html = grandprix_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'team', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-team-' . $params['type'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getTeamSocialIcons( $params ) {
		extract( $params );
		$social_icons = array();
		
		if ( $team_social_icon_pack !== '' ) {
			
			$icon_pack                    = grandprix_mikado_icon_collections()->getIconCollection( $team_social_icon_pack );
			$team_social_icon_type_label  = 'team_social_' . $icon_pack->param;
			$team_social_icon_param_label = $icon_pack->param;
			
			for ( $i = 1; $i <= $params['number_of_social_icons']; $i ++ ) {
				
				$team_social_icon   = ${$team_social_icon_type_label . '_' . $i};
				$team_social_link   = ${'team_social_icon_' . $i . '_link'};
				$team_social_target = ${'team_social_icon_' . $i . '_target'};
				
				if ( $team_social_icon !== '' ) {
					
					$team_icon_params                                  = array();
					$team_icon_params['icon_pack']                     = $team_social_icon_pack;
					$team_icon_params[ $team_social_icon_param_label ] = $team_social_icon;
					$team_icon_params['link']                          = ( $team_social_link !== '' ) ? $team_social_link : '';
					$team_icon_params['target']                        = ( $team_social_target !== '' ) ? $team_social_target : '';
					
					$social_icons[] = grandprix_mikado_execute_shortcode( 'mkdf_icon', $team_icon_params );
				}
			}
		}
		
		return $social_icons;
	}
	
	private function getTeamNameStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['team_name_color'] ) ) {
			$styles[] = 'color: ' . $params['team_name_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTeamPositionStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['team_position_color'] ) ) {
			$styles[] = 'color: ' . $params['team_position_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTeamTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['team_text_color'] ) ) {
			$styles[] = 'color: ' . $params['team_text_color'];
		}
		
		return implode( ';', $styles );
	}
}