<?php
add_shortcode( 'dodge_button_group', function($atts, $content=null){
	extract(shortcode_atts(array(
		'buttons'	=> '',
		'icon'		=> '',
		'link'		=> ''	
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return $output = '';
	$output ='';
	$output .='<div class="btn-wrap">';
	$button_item = vc_param_group_parse_atts($atts['buttons']);
	if(!empty($button_item)){
		foreach($button_item as $item){
			$output .='<a class="app-icon" href="'.$item['link'].'"><i class="fa '.$item['icon'].'" aria-hidden="true"></i></a>';
		}
	}
    $output .='</div>';   
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Button', 'dodge' ),
		'base'	=> 'dodge_button_group',
		'class'	=> '',
		'description'	=> esc_html__('add multiple button', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Button', 'dodge' ),
				'param_name'=> 'buttons',
				'params'	=> array(
					array(
						'type'		=> 'iconpicker',
						'heading'	=> esc_html__( 'Icon', 'dodge' ),
						'param_name'=> 'icon'
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'link', 'dodge' ),
						'param_name'=> 'link'
					)
				)
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

