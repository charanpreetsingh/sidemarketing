<?php
add_shortcode( 'dodge_call_to_action', function($atts, $content=null){
	extract(shortcode_atts(array(
		'title'				=> '',
		'button_text'		=> '',
		'link'				=> '',
		'background_color' 	=> '',
		'id'				=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	$output ='';
	$output .='<div class="section call-to-action cta-style-2" style="background-color:'.$background_color.';">';
		$output .='<div class="container">';
        	$output .='<div class="row">';
            	$output .='<div class="col-md-6 col-md-offset-3">';
                	$output .='<h4>'.$title.'</h4>';
                    $output .='<a class="cta-btn" href="'.esc_url( $link ).'">'.$button_text.' <i class="fa fa-angle-right" aria-hidden="true"></i></a>';
                $output .='</div>'; 
            $output .='</div>';
        $output .='</div>';
    $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Call To Action', 'dodge' ),
		'base'	=> 'dodge_call_to_action',
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
				'type'		=> 'colorpicker',
				'heading'	=> esc_html__( 'Background Color', 'dodge' ),
				'param_name'=> 'background_color',
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

