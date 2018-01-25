<?php
add_shortcode( 'dodge_price_table', function($atts, $content = null){
	extract(shortcode_atts(array(
		'price_tables'		=> '',
		'heading'			=> '',
		'currency'			=> '',
		'price'				=> '',
		'duration'			=> '',
		'package_features'	=> '',
		'feature_item'		=> '',
		'button_text'		=> '',
		'button_link'		=> '',
		'id'				=> ''

	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return $output = '';
	$output ='';
	$output .='<div class="pricing-tables">';
  $output .='<div class="row">';
	$price_tables = vc_param_group_parse_atts($atts['price_tables']);
	$is_array	= is_array($price_tables) ? true:false;

	if(!empty($price_tables) && $is_array) {
		$size = 12/round(count($price_tables)); // column size
        foreach($price_tables as $price_table){
		$output .='<div class="col-md-'.$size.'">';
        	$output .='<div class="pricing-table">';
            	$output .='<h3 class="table-heading">'.(isset($price_table['heading']) ? $price_table['heading'] : '').'</h3>';
                $output .='<div class="pricing">';	
                	$output .='<span class="currency">'.(isset($price_table['currency']) ? $price_table['currency'] : '').'</span><span class="price">'.(isset($price_table['price']) ? $price_table['price'] : '').'</span><span class="price-cicle">/'.(isset($price_table['duration']) ? $price_table['duration'] : '').'</span>';
                $output .='</div>';    
                $output .='<ul class="package-features">';
                // features
                $get_features = (isset($price_table['package_features']) ? $price_table['package_features'] : '');
                $package_feature = vc_param_group_parse_atts($get_features);
                if(!empty($package_feature) && is_array($package_feature)){
                	foreach($package_feature as $features){
                		$output .='<li>'.(isset($features['feature_item']) ? $features['feature_item'] : '').'</li>';
                	} // end foreach
                } // end if	
                $output .='</ul>';    
                $output .='<a class="btn border-btn buy-btn" href="'.(isset($price_table['button_link']) ? $price_table['button_link'] : '').'">'.(isset($price_table['button_text']) ? $price_table['button_text'] : '').'</a>';
            $output .='</div>';
        $output .='</div>'; 
    	}
    }

    $output .='</div>'; 
    $output .='</div>';   

	
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Price Table', 'dodge' ),
		'base'	=> 'dodge_price_table',
		'class'	=> '',
		'description'	=> esc_html__('add dodge price table', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Table', 'dodge' ),
				'param_name'=> 'price_tables',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Name', 'dodge' ),
						'param_name'=> 'heading'
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Currency', 'dodge' ),
						'param_name'=> 'currency',
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Price', 'dodge' ),
						'param_name'=> 'price',
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Duration', 'dodge' ),
						'param_name'=> 'duration',
					),
					array(
						'type'		=> 'param_group',
						'heading'	=> esc_html__( 'Add Package Features', 'dodge' ),
						'param_name'=> 'package_features',
						'params'	=> array(
							array(
								'type'			=> 'textfield',
								'heading'		=> esc_html__( 'Add Feature', 'dodge' ),
								'param_name'	=> 'feature_item'
							)
						)
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Button Text', 'dodge' ),
						'param_name'=> 'button_text',
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Button Link', 'dodge' ),
						'param_name'=> 'button_link',
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
