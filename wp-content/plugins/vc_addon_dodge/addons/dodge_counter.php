<?php
add_shortcode( 'dodge_counter', function($atts, $content=null){
	extract(shortcode_atts(array(
		'counters'		=> '',
		'number'		=> '',
		'text'			=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output='';
	$output .='<ul class="facts">';
	$counters = vc_param_group_parse_atts($atts['counters']);
	$is_array	= is_array($counters) ? true:false;
	if(!empty($counters) && $is_array){
		$size = 12/round(count($counters)); // column size
		foreach ($counters as $item ) {
		$output .='<li class="col-sm-'.$size.'"><span class="fact"><span class="count"><span class="timer" data-from="0" data-to="'.$item['number'].'"></span></span>'.$item['text'].'</span></li>';
		} //end foreach 
	} // end if
  
    $output .='</ul>'; 
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Counter', 'dodge' ),
		'base'	=> 'dodge_counter',
		'class'	=> '',
		'description'	=> esc_html__('add dodge counter section', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'value'		=> '',
				'heading'	=> esc_html__( 'Add Features', 'dodge' ),
				'param_name'=> 'counters',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Number', 'dodge' ),
						'param_name'=> 'number'
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Content', 'dodge' ),
						'param_name'=> 'text'
					)
				)
			),
			array(
				'type'		=> 'textfield',
				'value'		=> '',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

