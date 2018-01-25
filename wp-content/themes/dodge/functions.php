<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if(!function_exists("dodge_setup")){
	function dodge_setup(){
		// load text domains
		load_theme_textdomain( 'dodge', get_template_directory() . '/languages' );
		
		// all theme support here
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'blog-thumbnail', 770, 420, true );
		add_image_size( 'blog-small-thumbnail', 70, 70, true );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Set the default content width.
		$GLOBALS['content_width'] = 750;

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
        	'top'			=> esc_html__( 'Main Menu', 'dodge' ),
        	'bottom'		=> esc_html__( 'Footer Menu', 'dodge' ),
		) );

		/*
		* This theme styles the visual editor to resemble the theme style
		*/
		add_editor_style( 'css/custom-editor-style.css' );

		/*
		* Enable support for Post Formats.
		*
		* See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );

		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'       => 140,
			'height'      => 40,
			'flex-width'  => true,
		) );

	}
	add_action('after_setup_theme', 'dodge_setup');
}


/**
 * Enqueue scripts and styles.
 */
if(!function_exists( 'dodge_scripts' )) {
	function dodge_scripts(){
		//Enqueue all css file
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array());
		wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array('bootstrap'));
		wp_enqueue_style( 'et_line_icons', get_template_directory_uri() . '/css/et-line-icons.css', array('bootstrap', 'font_awesome'));
		wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array('bootstrap', 'font_awesome', 'et_line_icons'));
		wp_enqueue_style( 'magnific_popup', get_template_directory_uri() . '/css/magnific-popup.css', array('bootstrap', 'font_awesome', 'et_line_icons', 'owl.carousel'));
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array('bootstrap', 'font_awesome', 'et_line_icons', 'owl.carousel'));
		wp_enqueue_style( 'dodge_main_stylesheet', get_template_directory_uri() . '/css/style.css', array('bootstrap', 'font_awesome', 'et_line_icons', 'owl.carousel', 'magnific_popup', 'animate'));
		wp_enqueue_style( 'dodge_responsive', get_template_directory_uri() . '/css/responsive.css', array('bootstrap', 'font_awesome', 'et_line_icons', 'owl.carousel', 'magnific_popup', 'dodge_main_stylesheet', 'animate'));
		wp_enqueue_style( 'dodge_style', get_stylesheet_uri() );


		//Enqueue all js file
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery', 'bootstrap'), null, true );
		wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.js', array('jquery', 'bootstrap', 'owl.carousel'), null, true );
		wp_enqueue_script( 'visible', get_template_directory_uri() . '/js/visible.js', array('jquery', 'bootstrap', 'owl.carousel', 'matchHeight'), null, true );
		wp_enqueue_script( 'countTo', get_template_directory_uri() . '/js/jquery.countTo.js', array('jquery', 'bootstrap', 'owl.carousel', 'matchHeight', 'visible'), null, true );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery', 'bootstrap', 'owl.carousel', 'matchHeight', 'visible', 'countTo'), null, true );
		wp_enqueue_script( 'magnific_popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery', 'bootstrap', 'owl.carousel', 'matchHeight', 'visible', 'countTo', 'wow'), null, true );
		wp_enqueue_script( 'dodge_custom_script', get_template_directory_uri() . '/js/custom.js', array('jquery', 'bootstrap', 'owl.carousel', 'matchHeight', 'visible', 'countTo', 'wow', 'magnific_popup'), null, true );

		// Load the html5 shiv.
		wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.min.js', array());
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9');
		// Load the Respond .
		wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.min.js', array());
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9');


		// comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action('wp_enqueue_scripts', 'dodge_scripts');
}

/**
 * Enqueue google fonts
 */
if(!function_exists('dodge_web_fonts_url')) {
	function dodge_web_fonts_url($font) {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'dodge' ) ) {
			$font_url = add_query_arg( 'family', urlencode($font), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
}
	
if(!function_exists('dodge_font_scripts')) {
	function dodge_font_scripts() {
		wp_enqueue_style( 'dodge-web-font', dodge_web_fonts_url('Open+Sans:400,400i,600,700'), array());
	}
	add_action( 'wp_enqueue_scripts', 'dodge_font_scripts' );
}


/**
 *  Add post class
 */
function dodge_post_classes($classes){
	if(is_single()){
		$classes[] = 'single';
	}else{
		$classes[] = '';
	}
	return $classes;
}
	
add_filter( 'post_class', 'dodge_post_classes' );


/**
 * Register widget area.
 */

if(!function_exists("dodge_widgets_init")){
	function dodge_widgets_init(){
		   /**
			* Main Sidebar
			*/
			register_sidebar( array(
				'name'          => esc_html__( 'Main Sidebar', 'dodge' ),
				'id'            => 'main-sidebar',
				'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'dodge' ),
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>'
			) );

			/**
			* Footer Sidebar
			*/
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Sidebar', 'dodge' ),
				'id'            => 'footer-sidebar',
				'description'   => esc_html__( 'Add widgets here to appear in your footer sidebar', 'dodge' ),
				'before_widget' => '<div class="col-md-3 col-sm-6"><div class="widget %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>'
			) );

	}
	add_action( 'widgets_init', 'dodge_widgets_init' );
}

/**
 * required file include
 */

require_once get_template_directory() . '/inc/dodge_functions.php';

function custom_upload_mimes( $existing_mimes=array() ) {
	// add png to the list of mime types
	$existing_mimes['svg'] = 'image/svg';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'upload_mimes', 'custom_upload_mimes' );