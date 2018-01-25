<?php
add_shortcode( 'dodge_skill', function($atts, $content=null){
	extract(shortcode_atts(array(
		'skills'			=> '',
		'title'				=> '',
		'skill_value'		=> '',
		'id'				=> '',
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$output .='<div class="skills">';
	$skill = vc_param_group_parse_atts($atts['skills']);
	$is_array	= is_array($skill) ? true:false;
	if(!empty($skill) && $is_array){
		foreach($skill as $item){
		$output .='<div class="skill '.$item['title'].'">';
        	$output .='<h6>'.$item['title'].'</h6>';
            $output .='<div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="'.$item['skill_value'].'" aria-valuemin="10" aria-valuemax="100" style="width: 2%;"><span>'.$item['skill_value'].'%</span></div>';
            $output .='</div>';
         $output .='</div>';
		} //end foreach loop
	} // end if
     $output .='</div>';
	
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Skills', 'dodge' ),
		'base'	=> 'dodge_skill',
		'class'	=> '',
		'description'	=> esc_html__('add dodge Skills bar', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Skills', 'dodge' ),
				'param_name'=> 'skills',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Skill Name', 'dodge' ),
						'param_name'=> 'title'
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Skill Percentage Number', 'dodge' ),
						'param_name'=> 'skill_value'
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

