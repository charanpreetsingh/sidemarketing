<?php
add_shortcode( 'dodge_slider', function($atts, $content=null){
	extract(shortcode_atts(array(
		'slider_type'		=> '',
		'bg_limit'			=> '',
		'post_order'		=> '',
		'post_limit2'		=> '',
		'post_order2'		=> '',
		'post_limit3'		=> '',
		'post_order3'		=> '',
		'bg_img'			=> '',
		'id'				=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$thumb_url = array(0=>'');
	 if(!empty($bg_img)){
	 	$thumb_url =  wp_get_attachment_image_src($bg_img, array(668,647));
	 }
	if($slider_type == 3){  // style three
		$output .='<section id="banner" class="banner">';	
			$output .='<div class="container">';
	        	$output .='<div class="row">';
	            	$output .='<div class="banner-content" style="background-image: url('.$thumb_url[0].'); background-position: top right; background-size: contain; background-repeat: no-repeat">';
	                	$output .='<div class="col-lg-5 col-md-7">';
	                    	$output .='<div id="header-slider" class="owl-carousel header-slider">';
	                        $query3 = new WP_Query(array('post_type' => 'dodge_banner', 'posts_per_page' => $post_limit3, 'order' => $post_order3));
                        	if($query3->have_posts()){
                        		while($query3->have_posts()) : $query3->the_post();
	                        	$output .='<div>';
	                            	$output .='<div class="absolute-content">';
	                                	$output .='<h1>'.get_the_title().'</h1>';
	                                    $output .=''; 
	                                    $output .='<p>'.get_the_content().'</p>';
	                                    $video_button = get_post_meta( get_the_ID(), 'dodge_video_button_text', true );
	                    				$default_button = get_post_meta( get_the_ID(), 'dodge_button_text', true );                    
	                                    $output .='<div class="btn-wrap">';
	                                    if(!empty($default_button)){ 
	                                    	$output .='<a href="'.get_post_meta( get_the_ID(), 'dodge_button_link', true ).'" class="btn">'.$default_button.'</a>'; 
	                                    }
	                                    if(!empty($video_button)){
	                                        $output .='<a href="'.get_post_meta( get_the_ID(), 'dodge_video_button_link', true ).'" class="btn border-btn play-video"><i class="fa fa-play-circle" aria-hidden="true"></i>'.$video_button.'</a>'; 	
	                                    }
	                                    $output .='</div>'; 
	                                $output .='</div>';
	                            $output .='</div>';
                            	endwhile;
                        		wp_reset_postdata();
                        	}
	                        $output .='</div>'; 
	                    $output .='</div>';
	                $output .='</div>';
	            $output .='</div>';
	        $output .='</div>';
	    $output .='</section>';  

	} else if($slider_type == 2){   // style two
		$output .= '<section id="banner" class="banner">';
	    	$output .= '<div id="header-slider" class="owl-carousel header-slider content-carousel">';
	        $query2 = new WP_Query(array('post_type' => 'dodge_banner', 'posts_per_page' => $post_limit2, 'order' => $post_order2));
	        if($query2->have_posts()){
	        	while($query2->have_posts()) : $query2->the_post();
	            $output .= '<div style="background-image: url('.get_the_post_thumbnail_url().')">';
	            	$output .= '<div class="container">';
	                	$output .= '<div class="row">';
	                    	$output .= '<div class="banner-content">';
	                        	$output .= '<div class="col-lg-5 col-md-7">';
	                            	$output .= '<div class="absolute-content">';
	                                	$output .= '<h1>'.get_the_title().'</h1>';
	                                    $output .= '<p>'.get_the_content().'</p>';
	                                    $video_button = get_post_meta( get_the_ID(), 'dodge_video_button_text', true );
	                    				$default_button = get_post_meta( get_the_ID(), 'dodge_button_text', true );                       
	                                    $output .= '<div class="btn-wrap">';
	                                    	if(!empty($default_button)){
	                                    	$output .= '<a href="'.get_post_meta( get_the_ID(), 'dodge_button_link', true ).'" class="btn">'.$default_button.'</a>';
	                                    	}
	                                    	if(!empty($video_button)){
	                                        $output .= '<a href="'.get_post_meta( get_the_ID(), 'dodge_video_button_link', true ).'"><i class="fa fa-play-circle" aria-hidden="true"></i>'.$video_button.'</a>';
	                                        }
	                                    $output .= '</div>';     
	                                    
	                                $output .= '</div>';
	                            $output .= '</div>';
	                        $output .= '</div>';
	                    $output .= '</div>';
	                $output .= '</div>';
	            $output .= '</div>';
	            endwhile;
	            wp_reset_postdata();
	        }   
	        $output .= '</div>';
	    $output .= '</section>';
	} else {  // style three or default style
		$output .='<section id="banner" class="banner">';
			$output .='<div id="header-slider" class="owl-carousel header-slider background-carousel">';

			$query = new WP_Query(array('post_type' => 'dodge_banner', 'posts_per_page' => $bg_limit, 'order' => $post_order));
			if($query->have_posts()){
				while($query->have_posts()) : $query->the_post();

	        	$output .='<div style="background-image: url('.get_the_post_thumbnail_url().')"></div>';
	        	endwhile;
	        	wp_reset_postdata();
	        }
	        
	        $output .='</div>';
	        $output .='<div class="container">';
	        	$output .='<div class="row">';
	            	$output .='<div class="banner-content">';
		                $output .='<div class="col-lg-5 col-md-7">';
	                    	$output .='<div class="absolute-content">';

	                    	$query = new WP_Query(array('post_type' => 'dodge_banner', 'posts_per_page' => 1, 'order' => $post_order));
	                    	if($query->have_posts()){
	                    		while($query->have_posts()) : $query->the_post();
	                    			$video_button = get_post_meta( get_the_ID(), 'dodge_video_button_text', true );
	                    			$default_button = get_post_meta( get_the_ID(), 'dodge_button_text', true );
	                        	$output .='<h1>'.get_the_title().'</h1>';
	                            $output .='<p>'.get_the_content().'</p>';
	                            $output .='<div class="btn-wrap">';
	                            	if(!empty($default_button)){
	                            	$output .='<a href="'.get_post_meta( get_the_ID(), 'dodge_button_link', true ).'" class="btn">'.$default_button.'</a>';
	                            	}
	                            	if(!empty($video_button)){
	                                $output .='<a href="'.get_post_meta( get_the_ID(), 'dodge_video_button_link', true ).'" class="btn border-btn play-video"><i class="fa fa-play-circle" aria-hidden="true"></i>'.$video_button.'</a>';
	                                }
	                            $output .='</div>'; 
	                            endwhile;
	                            wp_reset_postdata();
	                        }    
	                            
	                        $output .='</div>'; 
	                    $output .='</div>'; 
	                $output .='</div>'; 
	            $output .='</div>'; 
	        $output .='</div>'; 
	    $output .='</section>';
	}
	

	
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge slider', 'dodge' ),
		'base'	=> 'dodge_slider',
		'class'	=> '',
		'description'	=> esc_html__('add dodge slider', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'dropdown',
				'heading'	=> esc_html__( 'Choose Slider Style', 'dodge' ),
				'param_name'=> 'slider_type',
				'value'		=> array('background-image-slider' => 1, 'background-content-slider' => 2, 'content-text-slider' => 3),
			),
			// for style one
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Post Limit', 'dodge' ),
				'param_name'=> 'bg_limit',
				'value'		=> -1,
				'dependency' => array(
					'element' => 'slider_type',
					'value' => '1'
				), 
			),
			array(
				'type'		=> 'dropdown',
				'heading'	=> esc_html__( 'Post Order', 'dodge' ),
				'param_name'=> 'post_order',
				'value'		=> array('DESC', 'ASC'),
				'dependency' => array(
					'element' => 'slider_type',
					'value' => '1'
				), 
			),
			// for style two
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Post Limit', 'dodge' ),
				'param_name'=> 'post_limit2',
				'value'		=> -1,
				'dependency' => array(
					'element' => 'slider_type',
					'value' => '2'
				), 
			),
			array(
				'type'		=> 'dropdown',
				'heading'	=> esc_html__( 'Post Order', 'dodge' ),
				'param_name'=> 'post_order2',
				'value'		=> array('DESC', 'ASC'),
				'dependency' => array(
					'element' => 'slider_type',
					'value' => '2'
				), 
			),
			// for style three
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Post Limit', 'dodge' ),
				'param_name'=> 'post_limit3',
				'value'		=> -1,
				'dependency' => array(
					'element' => 'slider_type',
					'value' => '3'
				), 
			),
			array(
				'type'		=> 'dropdown',
				'heading'	=> esc_html__( 'Post Order', 'dodge' ),
				'param_name'=> 'post_order3',
				'value'		=> array('DESC', 'ASC'),
				'dependency' => array(
					'element' => 'slider_type',
					'value' => '3'
				), 
			),
			array(
				'type'		=> 'attach_image',
				'heading'	=> esc_html__( 'Background Image', 'dodge' ),
				'param_name'=> 'bg_img',
				'dependency' => array(
					'element' => 'slider_type',
					'value' => '3'
				), 
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

