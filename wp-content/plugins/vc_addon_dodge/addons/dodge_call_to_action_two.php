<?php
add_shortcode( 'dodge_call_to_action_two', function($atts, $content=null){
	extract(shortcode_atts(array(
		'title'				=> '',
		'sub_title'			=> '',
		'link'				=> '',
		'button_text'		=> '',
		'background_img' 	=> '',
		'background_color'	=> '',
		'id'				=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	$output ='';
	$thumb_url = array(0=>'');
	if(!empty($background_img)){
		$thumb_url =  wp_get_attachment_image_src($background_img, array(1920,350));
	}
	$output .='<div class="section call-to-action cta-style-1 no-padding'.(!empty($background_img) ? ' style-2 bg-style-1' : '').'" style="background-image: url('.$thumb_url[0].');">';
		$output .='<div class="overlay" style="background-color: '.$background_color.';">';
			$output .='<div class="container">';
	        	$output .='<div class="row">';
	            	$output .='<div class="col-md-6 col-md-offset-3">';
	                	$output .='<h2>'.$title.'</h2>';
	                	$output .='<p>'.html_entity_decode(vc_value_from_safe( $sub_title, true )).'</p>';
	                if(!empty($button_text)){
	                	$output .='<a class="btn" href="'.esc_url( $link ).'">'.$button_text.'</a>';
	                }
	                $output .='</div>'; 
	            $output .='</div>';
	        $output .='</div>';
        $output .='</div>';
    $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Call To Action 2', 'dodge' ),
		'base'	=> 'dodge_call_to_action_two',
		'class'	=> '',
		'description'	=> esc_html__('add dodge call to action', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Title', 'dodge' ),
				'param_name'=> 'title',
			),
			array(
				'type'			=> 'textarea_safe',
				'heading'		=> esc_html__( 'Sub Title', 'dodge' ),
				'param_name'	=> 'sub_title' 
			),
			array(
				'type'		=> 'attach_image',
				'heading'	=> esc_html__( 'Background Image', 'dodge' ),
				'param_name'=> 'background_img',
				'value'		=> '#f7f7f7'
			),
			array(
				'type'		=> 'colorpicker',
				'heading'	=> esc_html__( 'Background Color', 'dodge' ),
				'param_name'=> 'background_color',
				'value'		=> 'rgba(55, 163, 235, 0.8)'
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Button Text', 'dodge' ),
				'param_name'=> 'button_text',
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Button Link', 'dodge' ),
				'param_name'=> 'link',
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

