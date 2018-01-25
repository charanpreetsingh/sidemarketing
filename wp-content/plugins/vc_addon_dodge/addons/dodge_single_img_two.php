<?php
add_shortcode( 'dodge_single_img_two', function($atts, $content=null){
	extract(shortcode_atts(array(
		'thumbnail'			=> '',
		'style'				=> '',
		'animation_class'	=> '',
		'duration'			=> '',
		'delay'				=> '',
		'id'				=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	$output ='';
	$thumb_url = array(0=>'');
	if(!empty($thumbnail)){
		$thumb_url =  wp_get_attachment_image_src($thumbnail, array(668,647));
	}
	$animation_class_name = (!empty($animation_class) ? $animation_class : 'fadeInUp');
	$output .='<img class="'.($style==1 ? $animation_class_name.' animated wow' : '').'" '.($style==1 ? 'data-wow-duration="'.$duration.'s" data-wow-delay="'.$delay.'s"' : '').' src="'.$thumb_url[0].'" alt="'.esc_html__( 'facts image', 'dodge' ).'">';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Single Image', 'dodge' ),
		'base'	=> 'dodge_single_img_two',
		'class'	=> '',
		'description'	=> esc_html__('add dodge single image with animation', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'attach_image',
				'heading'	=> esc_html__( 'Thumbnail', 'dodge' ),
				'param_name'=> 'thumbnail'
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Animation', 'dodge' ),
				'param_name'	=> 'style',
				'value'			=> array('OFF' => 0, 'ON' => 1) 
			),
			array(
				'type'			=> 'animation_style',
				'heading'		=> esc_html__( 'Animation Style', 'dodge' ),
				'param_name'	=> 'animation_class',
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Duration', 'dodge' ),
				'param_name'	=> 'duration',
				'value'			=> 1.5,
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ), 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Delay', 'dodge' ),
				'param_name'	=> 'delay',
				'value'			=> 0,
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ), 
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

