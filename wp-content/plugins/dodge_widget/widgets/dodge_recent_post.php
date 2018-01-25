<?php
class dodge_recent_post extends WP_Widget {

	function __construct(){
		parent::__construct(
			'recent_entries', __('dodge recent posts', 'dodge'), array( 'description' => __('Recent post with thumbnail', 'dodge'), )
		);
	}
	public function widget( $args, $instance ) {
		$title = isset($instance['title']) ? $instance['title'] : '';
		$count = isset($instance['count']) ? $instance['count'] : '';
		print '<aside class="widget post-widget">';
			print $args['before_title'].$title.$args['after_title'];
			$arg = array( 'numberposts' => $count );
			$recent_posts = wp_get_recent_posts( $arg );

			print '<ul  class="recent-posts">';
			foreach($recent_posts as $recent){
				global $post;
				print '<li class="recent-post">';
						if(has_post_thumbnail( $recent['ID'] )){
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent['ID'] ), array(84, 84) );
		                    print '<div class="widget-thumb">
		                        <img src="'.esc_url($image[0]).'" alt="'.esc_html__('blog', 'dodge').'"/>
		                    </div>';
		                }
	                    print '<div class="recent-post-content">
	                        <a href="'.get_permalink($recent['ID']).'">'.esc_html( $recent['post_title'] ).'</a>
	                        <span class="post-date">'.get_the_date( 'j M, Y' ).'</span>
	                    </div>
	                </li>';
			}
			print '</ul>';
		print '</aside>';
	}

	public function form( $instance ){  
		$title = isset($instance['title']) ? $instance['title'] : '';
		$count = isset($instance['count']) ? $instance['count'] : '';
	?>
	<p>
		<label for="<?php print esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'dodge'); ?></label>
		<input class="widefat" type="text" id="<?php print esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php print esc_attr( $this->get_field_name('title') ); ?>" value="<?php print esc_attr( $title ); ?>">
	</p>	
	<p>
		<label for="<?php print esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e('Number of posts to show:', 'dodge'); ?></label>
		<input class="tiny-text" type="number" id="<?php print esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php print esc_attr( $this->get_field_name( 'count' ) ); ?>" value="<?php print esc_attr( $count ); ?>">
	</p>	

	<?php

	}

	public function update( $new_instance, $old_instance ){
		$instance = array();

		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['count'] = ( !empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';

		return $instance;
	}

}
function dodge_recent_post_load_widget(){
	register_widget( 'dodge_recent_post' );
}
add_action( 'widgets_init', 'dodge_recent_post_load_widget' );