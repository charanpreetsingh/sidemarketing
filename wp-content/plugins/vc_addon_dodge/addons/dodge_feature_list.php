<?php
add_shortcode( 'dodge_feature_list', function($atts, $content=null){
	extract(shortcode_atts(array(
		'features'		=> '',
		'icon'			=> '',
		'title'			=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return $output = '';
	$output ='';
	$output .='<ul class="features icon-list">';
	$features = (isset($atts['features']) ? $atts['features'] : '');
	$features_list = vc_param_group_parse_atts($features);
	$is_array	= is_array($features_list) ? true:false;
	if(!empty($features_list) && $is_array){
		foreach ($features_list as $item) {
			$output .='<li class="feature"><i class="'.$item['icon'].'"></i>'.$item['title'].'</li>';
		} //end foreach loop
	}
    $output .='</ul>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Feature List', 'dodge' ),
		'base'	=> 'dodge_feature_list',
		'class'	=> '',
		'description'	=> esc_html__('add dodge feature', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Features', 'dodge' ),
				'param_name'=> 'features',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Title', 'dodge' ),
						'param_name'=> 'title'
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Icon Class Name', 'dodge' ),
						'param_name'=> 'icon'
					)
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