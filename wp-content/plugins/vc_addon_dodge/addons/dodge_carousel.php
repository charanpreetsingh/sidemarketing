<?php
add_shortcode( 'dodge_carousel', function( $atts, $content=null){
	extract(shortcode_atts(array(
		'items'		=> '',
		'thumb'		=> '',
		'id'		=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	$output ='';
	$output .='<div class="screen-wrap">';
		$output .='<div id="screen-carousel" class="screen-carousel owl-carousel">';
        $img_items = vc_param_group_parse_atts($atts['items']);
        if(!empty($img_items)){
        	foreach ($img_items as $item) {
        		$thumb_url = array(0=>'');
		        if(!empty($item['thumb'])){
					$thumb_url =  wp_get_attachment_image_src($item['thumb'], array(367,656));
				}
			$output .='<div class="screen"><img src="'.$thumb_url[0].'" alt="'.esc_html__( 'Carousel', 'dodge' ).'"></div>';
			} // end foreach loop
		} // end if
		$output .='</div>';	
    $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Carousel', 'dodge' ),
		'base'	=> 'dodge_carousel',
		'class'	=> '',
		'description'	=> esc_html__('add images carousel', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Carousel Item', 'dodge' ),
				'param_name'=> 'items',
				'params'	=> array(
					array(
						'type'			=> 'attach_image',
						'heading'		=> esc_html__( 'Thumbnail', 'dodge' ),
						'param_name'	=> 'thumb'
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

