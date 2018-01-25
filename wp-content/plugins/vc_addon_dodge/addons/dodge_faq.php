<?php
add_shortcode( 'dodge_faq', function($atts, $content=null){
	extract(shortcode_atts(array(
		'question'		=> '',
		'number'		=> '',
		'answer'		=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$output .='<div class="faq">';
		$output .='<h5 class="faq-question"><span class="faq-number">'.$number.'</span>'.$question.'</h5>';
        $output .='<div class="faq-answer">';
       		$output .='<p>'.$answer.'</p>';
       	$output .='</div>';
    $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Faq', 'dodge' ),
		'base'	=> 'dodge_faq',
		'class'	=> '',
		'description'	=> esc_html__('add dodge faq', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Question Number', 'dodge' ),
				'param_name'=> 'number'
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Question', 'dodge' ),
				'param_name'=> 'question'
			),
			array(
				'type'		=> 'textarea',
				'heading'	=> esc_html__( 'Answer', 'dodge' ),
				'param_name'=> 'answer'
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

