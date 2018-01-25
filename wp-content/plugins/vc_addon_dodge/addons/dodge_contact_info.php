<?php
add_shortcode( 'dodge_contact_info', function($atts, $content=null){
	extract(shortcode_atts(array(
		'contacts'		=> '',
		'thumb_icon'	=> '',
		'contact_text'	=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$output .='	<div class="contact-infos">';

	$contact = vc_param_group_parse_atts($atts['contacts']);
	$is_array	= is_array($contact) ? true:false;
	if(!empty($contact) && $is_array) {
			$size = 12/round(count($contact)); // column size
        foreach($contact as $contact_item){
		$output .='<div class="col-sm-'.$size.'">';
        	$output .='<div class="contact-info address">';
	            $output .='<div class="contact-icon">';
                	$output .='<i class="'.$contact_item['thumb_icon'].'" aria-hidden="true"></i>';
                $output .='</div>';    
                $output .='<div class="contact-data">'.html_entity_decode(vc_value_from_safe( $contact_item['contact_text'], true )).'</div>';
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
		'name'	=> esc_html__( 'Dodge Contact Info', 'dodge' ),
		'base'	=> 'dodge_contact_info',
		'class'	=> '',
		'description'	=> esc_html__('add dodge contact information', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Contact', 'dodge' ),
				'param_name'=> 'contacts',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Contact Icon', 'dodge' ),
						'param_name'=> 'thumb_icon'
					),
					array(
						'type'		=> 'textarea_safe',
						'heading'	=> esc_html__( 'Contact Text', 'dodge' ),
						'param_name'=> 'contact_text'
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

