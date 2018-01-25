<?php
add_shortcode( 'dodge_service', function($atts,  $content= null){
	extract(shortcode_atts(array(
		'title'			=> '',
		'style'			=> '',
		'duration'		=> '',
		'delay'			=> '',
		'animate_class' => '',
		'icon'			=> '',
		'text'			=> '',
		'link'			=> '',
		'id'			=> ''
	),$atts ));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	$animation_class_name = (!empty($animate_class) ? $animate_class : 'fadeInUp');
	 $output= '';
		 $output.='<div class="service '.($style==1 ? $animation_class_name.' animated wow' : '').'" '.($style==1 ? 'data-wow-duration="'.$duration.'s" data-wow-delay="'.$delay.'s"' : '').'>';
		 	$output.='<i class="service-icon '.esc_attr( $icon ).'" aria-hidden="true"></i>';
		 	$output.='<h4>'.esc_html( $title ).'</h4>';
	        $output.='<p>'.esc_html( $text ).'</p>';
	        $output.='<a href="'.esc_url( $link ).'" class="service-more">'.esc_html__( 'Learn more ', 'dodge' ).'<i class="fa fa-angle-right" aria-hidden="true"></i></a>';
	    $output.='</div>';
	return $output;
});

if(class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		'name'			=> esc_html__( 'Dodge Service', 'dodge' ),
		'base'			=> 'dodge_service',
		'class'			=> '',
		'description'	=> esc_html__( 'Add dodge service section', 'dodge' ),
		'category'	  	=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Title', 'dodge' ),
				'param_name'	=> 'title' 
			),
			array(
				'type'			=> 'iconpicker',
				'heading'		=> esc_html__( 'Icon', 'dodge' ),
				'param_name'	=> 'icon',
			),
			array(
				'type'			=> 'textarea',
				'heading'		=> esc_html__( 'Content', 'dodge' ),
				'param_name'	=> 'text' 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Link', 'dodge' ),
				'param_name'	=> 'link' 
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
				'param_name'	=> 'animate_class',
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
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'ID', 'dodge' ),
				'param_name'	=> 'id' 
			)
		)
	));
}