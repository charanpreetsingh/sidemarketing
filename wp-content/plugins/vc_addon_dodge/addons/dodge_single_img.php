<?php
add_shortcode( 'dodge_single_img', function($atts,  $content= null){
	extract(shortcode_atts(array(
		'style'						=> '',
		// thumb left
		'thumb_left'				=> '',
		'thumb_left_animate_class'	=> '',
		'thumb_left_duration'		=> '',
		'thumb_left_delay'			=> '',
		// thumb right
		'thumb_right'				=> '',
		'thumb_right_animate_class'	=> '',
		'thumb_right_duration'		=> '',
		'thumb_right_delay'			=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output = '';
	// left thumb
	$thumb_one = array(0=>'');
	if(!empty($thumb_left)){
		$thumb_one =  wp_get_attachment_image_src($thumb_left, array(314,585));
	}
	// right thumb
	$thumb_two = array(0=>'');
	if(!empty($thumb_right)){
		$thumb_two =  wp_get_attachment_image_src($thumb_right, array(314,585));
	}
	// thumb left
	$animation_left_class_name = (!empty($thumb_left_animate_class) ? $thumb_left_animate_class : 'fadeInRight');

	// thumb right
	$animation_right_class_name = (!empty($thumb_right_animate_class) ? $thumb_right_animate_class : 'fadeInUp');
	// addons output
  $output .='<div class="res-center">';
    $output .='<div class="mock">';
      $output .='<img class="back-mock '.($style==1 ? $animation_left_class_name.' animated wow' : '').'" '.($style==1 ? 'data-wow-duration="'.$thumb_left_duration.'s" data-wow-delay="'.$thumb_left_delay.'s"' : '').' src="'.$thumb_one[0].'" alt="'.esc_html__( 'mock back', 'dodge' ).'"/>';
          $output .='<img class="front-mock '.($style==1 ? $animation_right_class_name.' animated wow' : '').'" '.($style==1 ? 'data-wow-duration="'.$thumb_right_duration.'s" data-wow-delay="'.$thumb_right_delay.'s"' : '').' src="'.$thumb_two[0].'" alt="'.esc_html__( 'mock front', 'dodge' ).'"/>';
      $output .='</div>';
    $output .='</div>';
	return $output;
});

if(class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		'name'			=> esc_html__( 'Dodge Images', 'dodge' ),
		'base'			=> 'dodge_single_img',
		'class'			=> '',
		'description'	=> esc_html__( 'Add dodge single image', 'dodge' ),
		'category'	  	=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Animation', 'dodge' ),
				'param_name'	=> 'style',
				'value'			=> array('OFF' => 0, 'ON' => 1) 
			),
			// thumbnail left
			array(
				'type'			=> 'attach_image',
				'heading'		=> esc_html__( 'Thumbnail Left', 'dodge' ),
				'param_name'	=> 'thumb_left' 
			),
			array(
				'type'			=> 'animation_style',
				'heading'		=> esc_html__( 'Thumbnail Left Animation Style', 'dodge' ),
				'param_name'	=> 'thumb_left_animate_class',
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Thumbnail Left Animation Duration', 'dodge' ),
				'param_name'	=> 'thumb_left_duration',
				'value'			=> 2 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Thumbnail Left Animation Delay', 'dodge' ),
				'param_name'	=> 'thumb_left_delay',
				'value'			=> 0.7,
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ), 
			),
			// thumbnail right
			array(
				'type'			=> 'attach_image',
				'heading'		=> esc_html__( 'Thumbnail Right', 'dodge' ),
				'param_name'	=> 'thumb_right' 
			),
			array(
				'type'			=> 'animation_style',
				'heading'		=> esc_html__( 'Thumbnail Right Animation Style', 'dodge' ),
				'param_name'	=> 'thumb_right_animate_class',
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Thumbnail Right Animation Duration', 'dodge' ),
				'param_name'	=> 'thumb_right_duration',
				'value'			=> 1.5,
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ), 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Thumbnail Right Animation Delay', 'dodge' ),
				'param_name'	=> 'thumb_right_delay',
				'value'			=> 1,
				'dependency' => array(
			        'element' => 'style',
			        'value' => '1'
			    ), 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'ID', 'dodge' ),
				'param_name'	=> 'id' 
			)
		)
	));
}