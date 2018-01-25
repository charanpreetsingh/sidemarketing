<?php
add_shortcode( 'dodge_hero_banner', function($atts,  $content= null){
	extract(shortcode_atts(array(
		'style'			=> '',
		'title'			=> '',
		'subtitle'		=> '',
		'bg_img'		=> '',
		// img back
		'thumb_back'	=> '',
		'img_back_animate_class'	=> '',
		'img_back_duration'			=> '',
		'img_back_delay'			=> '',
		// img front
		'thumb_front'				=> '',
		'img_front_animate_class'	=> '',
		'img_front_duration'		=> '',
		'img_front_delay'			=> '',
		'contact_shortcode' 		=> '',
		// button
		'btn_video_text'			=> '',
		'video_url'					=> '',
		'link'						=> '',
		'btn_text'					=> '',
		'animation_for_image'		=> '', // animation for images only
		'animation'					=> '', // default animation
		'duration'					=> '',
		'delay'						=> '',
		'animate_class' 			=> '',
		'id'						=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return $output = '';
	$output= '';
	// contact form
	$contact_form = html_entity_decode(vc_value_from_safe( $contact_shortcode, true ));
	// images for second style
	$front_mock = array(0=> '');
	if(!empty($thumb_front)){
		$front_mock =  wp_get_attachment_image_src($thumb_front, array(268,493));
	}
	$back_mock = array(0=> '');
	if(!empty($thumb_back)){
		$back_mock =  wp_get_attachment_image_src($thumb_back, array(268,493));
	}

	// images for deafult style
	$thumb_url = array(0=>'');
	if(!empty($bg_img)){
		$thumb_url =  wp_get_attachment_image_src($bg_img, array(668,647));
	}
	$animation_class_name = (!empty($animate_class) ? $animate_class : 'fadeInUp');

	if($style == 3){
	// style three
	$output.='<section id="banner" class="banner style-2">';
    	$output.='<div class="container">';
        	$output.='<div class="row">';
            	$output.='<div class="banner-content '.($animation==1 ? $animation_class_name.' animated wow' : '').'" '.($animation==1 ? 'data-wow-duration="'.$duration.'s" data-wow-delay="'.$delay.'s"' : '').'>';
                	// column left
                	$output.='<div class="col-lg-5 col-md-7">';
                   		$output.='<div class="absolute-content">';
                        	$output.='<h1>'.html_entity_decode(vc_value_from_safe( $title, true )).'</h1>';
                            $output.='<p>'.html_entity_decode(vc_value_from_safe( $subtitle, true )).'</p>'; 	                     
                            $output.='<div class="btn-wrap">';
                            	if(!empty($btn_text)){
                            		$output.='<a href="'.esc_url( $link ).'" class="btn">'.$btn_text.'</a>';
                            	}
                                if(!empty($btn_video_text)) {
                                	$output.='<a href="'.esc_url( $video_url ).'" class="btn border-btn play-video"><i class="fa fa-play-circle" aria-hidden="true"></i>'.$btn_video_text.'</a>';
								}
                            $output.='</div>'; 
                        $output.='</div>';
                    $output.='</div>';

                    // column right
                    $output .= '<div class="col-lg-5 col-lg-offset-2 col-md-5 hidden-sm hidden-xs">';
                    	$output .= '<div class="absolute-content text-center '.($animation==1 ? $animation_class_name.' animated wow' : '').'" '.($animation==1 ? 'data-wow-duration="'.$duration.'s" data-wow-delay="'.$delay.'s"' : '').'>';
                        	$output .= '<div class="registration-wrap banner-form">'.do_shortcode( $contact_form, true ).'</div>';
                        $output .= '</div>';
                    $output .= '</div>';

                $output.='</div>';
            $output.='</div>';
        $output.='</div>';
    $output.='</section>';
	} else if($style == 2) {
    // style two
    $output.='<section id="banner" class="banner style-2">';
    	$output.='<div class="container">';
        	$output.='<div class="row">';
            	$output.='<div class="banner-content '.($animation==1 ? $animation_class_name.' animated wow' : '').'" '.($animation==1 ? 'data-wow-duration="'.$duration.'s" data-wow-delay="'.$delay.'s"' : '').' style="background-image: url('.$thumb_url[0].'); background-position: top right; background-size: contain; background-repeat: no-repeat">';
                	// column left
                	$output.='<div class="col-lg-5 col-md-7">';
                   		$output.='<div class="absolute-content">';
                        	$output.='<h1>'.html_entity_decode(vc_value_from_safe( $title, true )).'</h1>';
                            $output.='<p>'.html_entity_decode(vc_value_from_safe( $subtitle, true )).'</p>'; 	                     
                            $output.='<div class="btn-wrap">';
                            	if(!empty($btn_text)){
                            		$output.='<a href="'.esc_url( $link ).'" class="btn">'.$btn_text.'</a>';
                            	}
                                if(!empty($btn_video_text)) {
                                	$output.='<a href="'.esc_url( $video_url ).'" class="btn border-btn play-video"><i class="fa fa-play-circle" aria-hidden="true"></i>'.$btn_video_text.'</a>';
								}
                            $output.='</div>'; 
                        $output.='</div>';
                    $output.='</div>';
                    // column right
                    $output .= '<div class="col-lg-5 col-lg-offset-2 col-md-5 hidden-sm hidden-xs">';
                    	$output .= '<div class="absolute-content text-center">';
                        	$output .= '<div class="mock">';
                        		$output .= '<img class="front-mock '.($animation_for_image==1 ? $img_back_animate_class.' animated wow' : '').'" src="'.$front_mock[0].'" alt="'.esc_html__( 'Banner Mock', 'dodge' ).'"/>';
                                $output .= '<img class="back-mock '.($animation_for_image==1 ? $img_front_animate_class.' animated wow' : '').'" src="'.$back_mock[0].'" alt="'.esc_html__( 'Banner Mock', 'dodge' ).'"/>';
                            $output .= '</div>'; 
                        $output .= '</div>';
                    $output .= '</div>';

                $output.='</div>';
            $output.='</div>';
        $output.='</div>';
    $output.='</section>';
	} else {
    // default style
    $output.='<section id="banner" class="banner">';
    	$output.='<div class="container">';
        	$output.='<div class="row">';
            	$output.='<div class="banner-content '.($animation==1 ? $animation_class_name.' animated wow' : '').'" '.($animation==1 ? 'data-wow-duration="'.$duration.'s" data-wow-delay="'.$delay.'s"' : '').' style="background-image: url('.$thumb_url[0].'); background-position: top right; background-size: contain; background-repeat: no-repeat">';
                	$output.='<div class="col-lg-5 col-md-7">';
                   		$output.='<div class="absolute-content">';
                        	$output.='<h1>'.html_entity_decode(vc_value_from_safe( $title, true )).'</h1>';
                            $output.='<p>'.html_entity_decode(vc_value_from_safe( $subtitle, true )).'</p>'; 	                     
                            $output.='<div class="btn-wrap">';
                            	if(!empty($btn_text)){
                            		$output.='<a href="'.esc_url( $link ).'" class="btn">'.$btn_text.'</a>';
                            	}
                                if(!empty($btn_video_text)) {
                                	$output.='<a href="'.esc_url( $video_url ).'" class="btn border-btn play-video"><i class="fa fa-play-circle" aria-hidden="true"></i>'.$btn_video_text.'</a>';
								}
                            $output.='</div>'; 
                        $output.='</div>';
                    $output.='</div>';
                $output.='</div>';
            $output.='</div>';
        $output.='</div>';
    $output.='</section>';
    }

	return $output;
});

if(class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map(array(
		'name'			=> esc_html__( 'Dodge Hero', 'dodge' ),
		'base'			=> 'dodge_hero_banner',
		'class'			=> '',
		'description'	=> esc_html__( 'Add Dodge Hero Banner', 'dodge' ),
		'category'	  	=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Choose Banner Style', 'dodge' ),
				'param_name'	=> 'style',
				'value'			=> array('Style-01' => 1, 'Style-02' => 2, 'Style-03' => 3),
				'description'	=> esc_html__( 'Select Style form dropdown ( style-01 = single images, style-02 = two images, style-03 = contact form )', 'dodge' )
			),
			array(
				'type'			=> 'textarea_safe',
				'heading'		=> esc_html__( 'Title', 'dodge' ),
				'param_name'	=> 'title' 
			),
			array(
				'type'			=> 'textarea',
				'heading'		=> esc_html__( 'Sub Title', 'dodge' ),
				'param_name'	=> 'subtitle' 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Button Text', 'dodge' ),
				'param_name'	=> 'btn_text' 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Button Link', 'dodge' ),
				'param_name'	=> 'link' 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Button Video Text', 'dodge' ),
				'param_name'	=> 'btn_video_text' 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Button Video Link', 'dodge' ),
				'param_name'	=> 'video_url' 
			),
			// For Style 01
			array(
				'type'			=> 'attach_image',
				'heading'		=> esc_html__( 'Background Image', 'dodge' ),
				'param_name'	=> 'bg_img',
				'dependency' => array(
					'element' => 'style',
					'value' => '1'
				), 
			),
			// For Style 02
			// Animation for two images only
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Animation for images', 'dodge' ),
				'param_name'	=> 'animation_for_image',
				'value'			=> array('OFF' => 0, 'ON' => 1),
				'dependency' => array(
					'element' => 'style',
					'value' => '2'
				),  
			),
			array(
				'type'			=> 'attach_image',
				'heading'		=> esc_html__( 'Add Image', 'dodge' ),
				'description'	=> esc_html__( 'adding image for back', 'dodge' ),
				'param_name'	=> 'thumb_back',
				'dependency' => array(
					'element' => 'style',
					'value' => '2'
				), 
			),
			// images back animation
			array(
				'type'			=> 'animation_style',
				'heading'		=> esc_html__( 'Animation Style', 'dodge' ),
				'param_name'	=> 'img_back_animate_class',
				'dependency' => array(
					'element' => 'animation_for_image',
					'value' => '1'
				), 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Duration', 'dodge' ),
				'param_name'	=> 'img_back_duration',
				'value'			=> 1.5,
				'dependency' => array(
					'element' => 'animation_for_image',
					'value' => '1'
				),  
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Delay', 'dodge' ),
				'param_name'	=> 'img_back_delay',
				'value'			=> 0,
				'dependency' => array(
					'element' => 'animation_for_image',
					'value' => '1'
				),  
			),
			// images front
			array(
				'type'			=> 'attach_image',
				'heading'		=> esc_html__( 'Add Image', 'dodge' ),
				'description'	=> esc_html__( 'adding image for front', 'dodge' ),
				'param_name'	=> 'thumb_front',
				'dependency' => array(
					'element' => 'style',
					'value' => '2'
				), 
			),
			
			array(
				'type'			=> 'animation_style',
				'heading'		=> esc_html__( 'Animation Style', 'dodge' ),
				'param_name'	=> 'img_front_animate_class',
				'dependency' => array(
					'element' => 'animation_for_image',
					'value' => '1'
				), 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Duration', 'dodge' ),
				'param_name'	=> 'img_front_duration',
				'value'			=> 1.5,
				'dependency' => array(
					'element' => 'animation_for_image',
					'value' => '1'
				),  
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Delay', 'dodge' ),
				'param_name'	=> 'img_front_delay',
				'value'			=> 0,
				'dependency' => array(
					'element' => 'animation_for_image',
					'value' => '1'
				),  
			),

			// For Style 03
			array(
				'type'			=> 'textarea_safe',
				'heading'		=> esc_html__( 'Add Shortcode', 'dodge' ),
				'param_name'	=> 'contact_shortcode',
				'description'	=> esc_html__( 'Add Contact Form Shortcode', 'dodge' ),
				'dependency' => array(
					'element' => 'style',
					'value' => '3'
				), 
			),

			// Animation for all style
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Animation', 'dodge' ),
				'param_name'	=> 'animation',
				'description'	=> esc_html__( 'animation for all elements', 'dodge' ),
				'value'			=> array('OFF' => 0, 'ON' => 1) 
			),
			array(
				'type'			=> 'animation_style',
				'heading'		=> esc_html__( 'Animation Style', 'dodge' ),
				'param_name'	=> 'animate_class',
				'dependency' => array(
					'element' => 'animation',
					'value' => '1'
				), 
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Duration', 'dodge' ),
				'param_name'	=> 'duration',
				'value'			=> 1.5,
				'dependency' => array(
					'element' => 'animation',
					'value' => '1'
				),  
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Animation Delay', 'dodge' ),
				'param_name'	=> 'delay',
				'value'			=> 0,
				'dependency' => array(
					'element' => 'animation',
					'value' => '1'
				),  
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'ID', 'dodge' ),
				'param_name'	=> 'id' 
			)
		)
	));
}
