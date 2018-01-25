<?php
add_shortcode( 'dodge_post_carousel', function( $atts, $content=null){
	extract(shortcode_atts(array(
		'post_number'	=> '',
		'post_order'	=> '',
		'id'			=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output = '';
	$output ='';
	$output .='<div class="screen-wrap">';
		$output .='<div id="screen-carousel" class="screen-carousel owl-carousel">';
       	// post from custom post type
       	$get_post_order = (!empty($post_order) ? $post_order : 'ASC');
    $query = new WP_Query(array(
       	'post_type'			=> 'dodge_gallery',
       	'posts_per_page'	=> $post_number,
       	'order'				=> $get_post_order

    ));
    if($query->have_posts()) :
       	while($query->have_posts()) : $query->the_post();
			$output .='<div class="screen">'.get_the_post_thumbnail().'</div>';
		endwhile;
	wp_reset_postdata();
	endif;
		$output .='</div>';	
    $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Gallery Carousel', 'dodge' ),
		'base'	=> 'dodge_post_carousel',
		'class'	=> '',
		'description'	=> esc_html__('add images carousel', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'dropdown',
				'heading'	=> esc_html__( 'Post Order By', 'dodge' ),
				'param_name'=> 'post_order',
				'value'		=> array('ASC','DESC')
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'Posts Per Page', 'dodge' ),
				'param_name'=> 'post_number',
				'value'		=> -1
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

