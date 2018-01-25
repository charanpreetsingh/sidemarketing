<?php
add_shortcode( 'dodge_section_header', function($atts,  $content = null){
	extract(shortcode_atts(array(
		'title'		=> '',
		'id'		=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output= '';
	$output.='<div class="section-heading text-center">';
		$output.='<h4 class="normal">'.html_entity_decode(vc_value_from_safe( $title, true )).'</h4>';
    $output.='</div>';  
	return $output;
});

if(class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		'name'			=> esc_html__( 'Dodge Section Header', 'dodge' ),
		'base'			=> 'dodge_section_header',
		'class'			=> '',
		'description'	=> esc_html__( 'Add dodge section header', 'dodge' ),
		'category'	  	=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'			=> 'textarea_safe',
				'heading'		=> esc_html__( 'Section Title', 'dodge' ),
				'param_name'	=> 'title' 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Id', 'dodge' ),
				'param_name'	=> 'id' 
			)
		)
	));
}