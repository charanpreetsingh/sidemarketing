<?php
add_shortcode( 'dodge_accordion', function($atts, $content=null){
	extract(shortcode_atts(array(
		'title'			=> '',
		'accordions'	=> '',
		'panel_title'	=> '',
		'panel-body'	=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$output .='<div class="questions-wrap">';
		$output .='<h3>'.$title.'</h3>';
        $output .='<div class="panel-group" id="questions" role="tablist" aria-multiselectable="true">';
        $accordion = vc_param_group_parse_atts($atts['accordions']);
		$is_array	= is_array($accordion) ? true:false;
		$i = 1;
		if(!empty($accordion) && $is_array) {
		        foreach($accordion as $accordion_item){
        	$output .='<div class="panel panel-default">';
            	$output .='<div class="panel-heading" role="tab" id="heading'.$i.'">';
                	$output .='<h4 class="panel-title">';
                    	$output .='<a role="button" data-toggle="collapse" data-parent="#questions" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">'.(isset($accordion_item['panel_title']) ? $accordion_item['panel_title'] : '').'<i class="fa fa-angle-right" aria-hidden="true"></i></a>';
                    $output .='</h4>';    
                $output .='</div>'; // panel heading
                $output .='<div id="collapse'.$i.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$i.'">';
                	$output .='<div class="panel-body">';
                    	$output .='<p>'.(isset($accordion_item['panel_body']) ? $accordion_item['panel_body'] : '').'</p>';
                    $output .='</div>';   
                 $output .='</div>'; // panel-collapse
            $output .='</div>'; // end panel-default
            $i++;
        	}
        }
         $output .='</div>';
     $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Accordion', 'dodge' ),
		'base'	=> 'dodge_accordion',
		'class'	=> '',
		'description'	=> esc_html__('add dodge accordion', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Title', 'dodge' ),
				'param_name'=> 'title'
			),
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Accordion', 'dodge' ),
				'param_name'=> 'accordions',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Panel Title', 'dodge' ),
						'param_name'=> 'panel_title'
					),
					array(
						'type'		=> 'textarea',
						'heading'	=> esc_html__( 'Panel Body', 'dodge' ),
						'param_name'=> 'panel_body'
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

