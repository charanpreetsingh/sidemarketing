<?php
add_shortcode( 'dodge_client', function($atts,  $content = null){
	extract(shortcode_atts(array(
		'client_thumb'		=> '',
		'link'				=> '',
		'clients'			=> '',
		'background_color'	=> '',
		'border_color'		=> '', 
		'id'				=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	 $output = '';
	 $output.='<div id="client-area" class="section client-area" style="background-color: '.(!empty($background_color) ? $background_color : '#f7f7f7').'; border-bottom: 1px solid; border-color: '.(!empty($border_color) ? $border_color : 'transparent').';">';
 		$output.='<div class="container">';
        	$output.='<div class="row">';
            	$output.='<div class="">';
            $clients = vc_param_group_parse_atts($atts['clients']);
			$is_array	= is_array($clients) ? true:false;
			if(!empty($clients) && $is_array) {
					$size = 12/round(count($clients)); // column size
            	foreach($clients as $client_item){
            			$thumbs = (isset($client_item['client_thumb']) ? $client_item['client_thumb'] : '');
            			$thumb_url = array(0=>'');
						 if(!empty($thumbs)){
						 	$thumb_url =  wp_get_attachment_image_src($thumbs, array(180,56));
						 }
                	$output.='<div class="col-md-'.$size.' col-sm-6 col-xs-12 heightFix">';
                    	$output.='<div class="client"><a href="'.(isset($client_item['link']) ? $client_item['link'] : '').'"><img src="'.$thumb_url[0].'" alt="'.esc_html__( 'Client', 'dodge' ).'"></a></div>';
                    $output.='</div>';
                } //end foreach loop
            } //end if
                $output.='</div>';
            $output.='</div>';
        $output.='</div>';
    $output.='</div>';
	return $output;
});

if(class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		'name'			=> esc_html__( 'Dodge Client', 'dodge' ),
		'base'			=> 'dodge_client',
		'class'			=> '',
		'description'	=> esc_html__( 'Add dodge Client section', 'dodge' ),
		'category'	  	=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'			=> 'param_group',
				'heading'		=> esc_html__( 'Add Client', 'dodge' ),
				'param_name'	=> 'clients',
				'params'		=> array(
					array(
						'type'			=> 'attach_image',
						'heading'		=> esc_html__( 'Thumbnail', 'dodge' ),
						'param_name'	=> 'client_thumb'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'link', 'dodge' ),
						'param_name'	=> 'link'
					)
				)
			),
			array(
				'type'		=> 'colorpicker',
				'heading'	=> esc_html__( 'Background Color', 'dodge' ),
				'param_name'=> 'background_color',

			),
			array(
				'type'		=> 'colorpicker',
				'heading'	=> esc_html__( 'Border Color', 'dodge' ),
				'param_name'=> 'border_color',
			)
		)
	));
}