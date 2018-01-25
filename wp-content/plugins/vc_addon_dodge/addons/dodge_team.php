<?php
add_shortcode( 'dodge_team', function($atts, $content=null){
	extract(shortcode_atts(array(
		'teams'			=> '',
		'social_items'	=> '',
		'thumbnail'		=> '',
		'username'		=> '',
		'designation'	=> '',
		'social_class'	=> '',
		'social_url'	=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return $output = '';
	$output ='';
	$output .='<div class="members">';

	$teams = vc_param_group_parse_atts($atts['teams']);
	$is_array	= is_array($teams) ? true:false;

	if(!empty($teams) && $is_array) {
		$size = 12/round(count($teams)); // column size

        foreach($teams as $team_single){
            	$thumbs = (isset($team_single['thumbnail']) ? $team_single['thumbnail'] : '');
            	$thumb_url = array(0=>'');
				 if(!empty($thumbs)){
				 	$thumb_url =  wp_get_attachment_image_src($thumbs, array(400,400));
				 }
		$output .='<div class="col-md-'.$size.' col-sm-6">';
        	$output .='<div class="member">';
            	$output .='<div class="member-mock">';
                	$output .='<img src="'.$thumb_url[0].'" alt="Member">';
                	// Social Link Start
                	$socials = vc_param_group_parse_atts($team_single['social_items']);
                	$test_array	= is_array($socials) ? true:false;
                	if(!empty($socials) && $test_array){
                    $output .='<div class="member-links">';
                    	foreach ($socials as $items) {
                    		$output .='<a href="'.(isset($items['social_url']) ? $items['social_url'] : '').'"><i class="fa '.(isset($items['social_class']) ? $items['social_class'] : '').'" aria-hidden="true"></i></a>';
                    	}	
	                $output .='</div>';
	                }
                $output .='</div>';
                $output .='<div class="member-info">';
                	$output .='<h4>'.(isset($team_single['username']) ? $team_single['username'] : '').'</h4>';
                    $output .='<p>'.(isset($team_single['designation']) ? $team_single['designation'] : '').'</p>';
                $output .='</div>';
            $output .='</div>';
        $output .='</div>';
    	} // end foreach loop
    } // end if 
    $output .='</div>';

	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Team', 'dodge' ),
		'base'	=> 'dodge_team',
		'class'	=> '',
		'description'	=> esc_html__('add dodge team', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Team Member', 'dodge' ),
				'param_name'=> 'teams',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Name', 'dodge' ),
						'param_name'=> 'username'
					),
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Designation', 'dodge' ),
						'param_name'=> 'designation'
					),
					array(
						'type'		=> 'attach_image',
						'heading'	=> esc_html__( 'Thumbnail', 'dodge' ),
						'param_name'=> 'thumbnail'
					),
					array(
						'type'		=> 'param_group',
						'heading'	=> esc_html__( 'Social', 'dodge' ),
						'param_name'=> 'social_items',
						'params'	=> array(
							array(
								'type'			=> 'iconpicker',
								'heading'		=> esc_html__( 'Add Social Icon', 'dodge' ),
								'param_name'	=> 'social_class'
							),
							array(
								'type'			=> 'textfield',
								'heading'		=> esc_html__( 'Add Social url', 'dodge' ),
								'param_name'	=> 'social_url'
							)	
						)
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

