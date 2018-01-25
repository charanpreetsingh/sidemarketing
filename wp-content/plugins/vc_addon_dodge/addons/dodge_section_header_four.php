<?php
add_shortcode( 'dodge_section_header_four', function($atts,  $content = null){
	extract(shortcode_atts(array(
		'title'		=> '',
		'sub_title'		=> '',
		'id'		=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output= '';
    $output .= '<div class="section-heading text-center">';
    	$output .= '<h2 class="section-title">'.$title.'</h2>';
        $output .= '<p class="section-subtitle">'.html_entity_decode(vc_value_from_safe( $sub_title, true )).'</p>';
    $output .= '</div>';
	return $output;
});

if(class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		'name'			=> esc_html__( 'Dodge Section Header 4', 'dodge' ),
		'base'			=> 'dodge_section_header_four',
		'class'			=> '',
		'description'	=> esc_html__( 'Add dodge default section header', 'dodge' ),
		'category'	  	=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Section Title', 'dodge' ),
				'param_name'	=> 'title' 
			),
			array(
				'type'			=> 'textarea_safe',
				'heading'		=> esc_html__( 'Section Sub Title', 'dodge' ),
				'param_name'	=> 'sub_title' 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Id', 'dodge' ),
				'param_name'	=> 'id' 
			)
		)
	));
}