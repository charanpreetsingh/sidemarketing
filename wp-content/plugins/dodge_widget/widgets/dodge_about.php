<?php
	
	/**
	 * Dodge About Widget
	 *
	 *
	 * @author 		ShapeUX
	 * @category 	Widgets
	 * @package 	dodge/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'dodge_about_widget');
	function dodge_about_widget() {
		register_widget('dodge_about_widget');
	}
	
	
	class dodge_about_widget  extends WP_Widget{
		
		const VERSION = '1.0.0';
        
		const CUSTOM_IMAGE_SIZE_SLUG = 'tribe_image_widget_custom';
		
		public function __construct(){
			parent::__construct('dodge_about_widget',esc_html__('Dodge about widget','dodge'),array(
				'description' => esc_html__('add logo and short description','dodge'),
			));
			
			add_action( 'sidebar_admin_setup', array( $this, 'admin_setup' ) );
			add_action( 'admin_head-widgets.php', array( $this, 'admin_head' ) );
		}
		public function admin_setup() {
			wp_enqueue_media();
			wp_enqueue_script( 'tribe-image-widget', plugins_url( 'js/image-widget.js', __FILE__ ));
			wp_localize_script( 'tribe-image-widget', 'TribeImageWidget', array(
				'frame_title' => esc_html__( 'Select an Image', 'dodge' ),
				'button_title' => esc_html__( 'Insert Into Widget', 'dodge' ),
			) );
		}
		
		
		public function widget($args,$instance){
			
			$attachment_id = !empty($instance['attachment_id'])?$instance['attachment_id']:'';
			$imageurl = !empty($instance['imageurl'])?$instance['imageurl']:'';
			$s_desc  = !empty($instance['s_desc'])? $instance['s_desc']:' ';
			$image = '';
			if(!empty($attachment_id)){
				$url = wp_get_attachment_image_src( $attachment_id, array(181,55) );
				$image = $url[0];
			}elseif(!empty($imageurl)){
				$image = $imageurl;
			} else {
				$image = get_template_directory_uri() . '/img/logo-color.png';
			}
			

			$widget = $args['before_widget'];
				$widget .='<div class="widget about-widget">';
						$widget .='<a href="'.esc_url( home_url( '/' ) ).'" class="logo"><img src="'.$image.'" alt="'.esc_html__('logo','dodge').'"></a>';
					$widget .='<p>';
						$widget .= $s_desc;
					$widget .='</p>';
				$widget .='</div>';
			$widget .= $args['after_widget'];
			print $widget;
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$instance = wp_parse_args( (array) $instance, self::get_defaults() );
			$id_prefix = $this->get_field_id('');
			$s_desc  = isset($instance['s_desc'])? $instance['s_desc']:'';
			?>
			<div class="uploader">
				<input type="submit" class="button" name="<?php print $this->get_field_name('uploader_button'); ?>" id="<?php print $this->get_field_id('uploader_button'); ?>" value="<?php esc_html_e('Add Logo', 'dodge'); ?>" onclick="dodgeWidget.uploader( '<?php print $this->id; ?>', '<?php print $id_prefix; ?>' ); return false;" />
				<div class="tribe_preview" id="<?php print $this->get_field_id('preview'); ?>">
					<?php print $this->get_image_html($instance, false); ?>
				</div>
				<input type="hidden" id="<?php print $this->get_field_id('attachment_id'); ?>" name="<?php print $this->get_field_name('attachment_id'); ?>" value="<?php echo abs($instance['attachment_id']); ?>" />
				<input type="hidden" id="<?php print $this->get_field_id('imageurl'); ?>" name="<?php print $this->get_field_name('imageurl'); ?>" value="<?php print $instance['imageurl']; ?>" />
			</div>
			<p>
				<label for="title"><?php esc_html_e('Short Description:','dodge'); ?></label>
			</p>
			<textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id('s_desc')); ?>" value="<?php echo esc_attr($s_desc); ?>" name="<?php echo esc_attr($this->get_field_name('s_desc')); ?>"><?php echo esc_attr($s_desc); ?></textarea>
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			//$instance = $old_instance;
			$new_instance = wp_parse_args( (array) $new_instance, self::get_defaults() );
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['s_desc'] = strip_tags($new_instance['s_desc']);
			// Reverse compatibility with $image, now called $attachement_id
			if ( $new_instance['attachment_id'] > 0 ) {
				$instance['attachment_id'] = abs( $new_instance['attachment_id'] );
			} elseif ( $new_instance['image'] > 0 ) {
				$instance['attachment_id'] = $instance['image'] = abs( $new_instance['image'] );
			}
			$instance['imageurl'] = $new_instance['imageurl']; // deprecated
			return $instance;
		}
				
		public function admin_head() {
				?>
			<style type="text/css">
				.uploader input.button {
					width: 100%;
					height: 34px;
					line-height: 33px;
					margin-top: 15px;
				}
				.tribe_preview .aligncenter {
					display: block;
					margin-left: auto !important;
					margin-right: auto !important;
				}
				.tribe_preview {
					overflow: hidden;
					max-height: 300px;
				}
				.tribe_preview img {
					margin: 10px 0;
					height: auto;
				}
			</style>
			<?php
		}
		private function get_image_html( $instance, $include_link = true ) {
			// Backwards compatible image display.
			if ( $instance['attachment_id'] == 0 && $instance['image'] > 0 ) {
				$instance['attachment_id'] = $instance['image'];
			}
			$output = '';
			if ( !empty( $instance['imageurl'] ) ) {
				// If all we have is an image src url we can still render an image.
				$src = $instance['imageurl'];
				$output = '<img width="100" height="100" src="'.$src.'" alt="'.esc_html__('img','dodge').'" />';
			} elseif( abs( $instance['attachment_id'] ) > 0 ) {
				$output = wp_get_attachment_image($instance['attachment_id'],array(100,100));
			}
			return $output;
		}
		private static function get_defaults() {

			$defaults = array(
				'title' => '',
				'image' => 0, // reverse compatible - now attachement_id
				'imageurl' => '', // reverse compatible.
				'attachment_id' => 0, // reverse compatible.
			);
			return $defaults;
		}
	}