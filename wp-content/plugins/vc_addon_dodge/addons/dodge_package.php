<?php
add_shortcode( 'dodge_package', function($atts, $content=null){
	extract(shortcode_atts(array(
		'packages'		=> '',
		'column_size'	=> '',
		'icon'			=> '',
		'title'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	$output ='';
	$output .='';
	$output .='<div class="includes">';
	// start loop
	$packages = vc_param_group_parse_atts($atts['packages']);
	$is_array	= is_array($packages) ? true:false;
	$column = (!empty($column_size) ? $column_size : 'col-md-3');
	if(!empty($packages) && $is_array) {
        foreach($packages as $package_item){
		$output .='<div class="'.$column.' col-sm-6">';
       		$output .='<div class="include">';
            	$output .='<i class="'.$package_item['icon'].'"></i>';
                $output .='<h5>'.$package_item['title'].'</h5>';
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
		'name'	=> esc_html__( 'Dodge Package', 'dodge' ),
		'base'	=> 'dodge_package',
		'class'	=> '',
		'description'	=> esc_html__('add dodge package', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'dropdown',
				'heading'	=> esc_html__( 'Package Grid', 'dodge' ),
				'param_name'=> 'column_size',
				'value'		=> array('col-md-3', 'col-md-4', 'col-md-6', 'col-md-12')
			),
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Package', 'dodge' ),
				'param_name'=> 'packages',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Icon Class Name', 'dodge' ),
						'param_name'=> 'icon'
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Package Name', 'dodge' ),
						'param_name'=> 'title'
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

