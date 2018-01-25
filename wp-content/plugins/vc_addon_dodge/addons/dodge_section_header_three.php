<?php
add_shortcode( 'dodge_section_header_three', function($atts, $content=null){
	extract(shortcode_atts(array(
		'title'				=> '',
		'icon'				=> '',
		'link'				=> '',
		'button_text'		=> '',
		'id'				=> ''

	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$output .='';
	$output .='<div class="section-heading text-center">';
		if(!empty($icon)){
			$output .='<i class="section-icon fa '.$icon.'" aria-hidden="true"></i>';
		}
        $output .='<h4 class="screenshot-title">'.$title.'</h4>';
        $output .='<a class="screens-btn" href="'.$link.'">'.$button_text.'</a>';
    $output .='</div>';    
    
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Section Header 3', 'dodge' ),
		'base'	=> 'dodge_section_header_three',
		'class'	=> '',
		'description'	=> esc_html__('add section header with icon', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Title', 'dodge' ),
				'param_name'=> 'title'
			),
			array(
				'type'		=> 'iconpicker',
				'heading'	=> esc_html__( 'Icon', 'dodge' ),
				'param_name'=> 'icon'
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Button Text', 'dodge' ),
				'param_name'=> 'button_text'
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Link', 'dodge' ),
				'param_name'=> 'link'
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

