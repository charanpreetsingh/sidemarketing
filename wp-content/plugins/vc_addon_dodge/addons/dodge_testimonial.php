<?php
add_shortcode( 'dodge_testimonial', function($atts, $content=null){
	extract(shortcode_atts(array(
		'testimonials'		=> '',
		'thumb'				=> '',
		'text'				=> '',
		'author'			=> '',
		'style'				=> '',
		'animation_class'	=> '',
		'duration'			=> '',
		'delay'				=> '',
		'id'				=> '',
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$output .='<div class="testimonials">';
		$testimonials = vc_param_group_parse_atts($atts['testimonials']);
		$is_array	= is_array($testimonials) ? true:false;
		if(!empty($testimonials) && $is_array){
			$size = 12/round(count($testimonials)); // column size
			foreach ($testimonials as $item ) {
				// thumbnail
				$thumb_url = array(0=>'');
				if(!empty($item['thumb'])){
					$thumb_url =  wp_get_attachment_image_src($item['thumb'], array(367,656));
				}
				// animation class
				$animation_class_name = (!empty($item['animation_class']) ? $item['animation_class'] : 'fadeInUp');
				$output .='<div class="col-md-'.$size.'">';
					$output .='<div class="testimonial '.($style==1 ? $animation_class_name.' animated wow' : '').'" '.($style==1 ? 'data-wow-duration="'.$item["duration"].'s" data-wow-delay="'.$item["delay"].'s"' : '').'>';
						$output .='<img src="'.$thumb_url[0].'" alt="'.esc_html__( 'Testimonial client', 'dodge' ).'">';
						$output .='<blockquote>'.$item['text'].'</blockquote>';	
						$output .='<h5 class="client-name">'.$item['author'].'</h5>';
					$output .='</div>';
				$output .='</div>';
			} // end foreach
		} // end if
    $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Testimonial', 'dodge' ),
		'base'	=> 'dodge_testimonial',
		'class'	=> '',
		'description'	=> esc_html__('add dodge testimonial', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Animation', 'dodge' ),
				'param_name'	=> 'style',
				'value'			=> array('OFF' => 0, 'ON' => 1) 
			),
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Testimonial', 'dodge' ),
				'param_name'=> 'testimonials',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'author', 'dodge' ),
						'param_name'=> 'author'
					),
					array(
						'type'		=> 'textarea',
						'heading'	=> esc_html__( 'Comments', 'dodge' ),
						'param_name'=> 'text'
					),
					array(
						'type'		=> 'attach_image',
						'heading'	=> esc_html__( 'Thumbnail', 'dodge' ),
						'param_name'=> 'thumb'
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
						'value'			=> 1,
						'dependency' => array(
					        'element' => 'style',
					        'value' => '1'
					    ), 
					),
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


