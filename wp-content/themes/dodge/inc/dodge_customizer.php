<?php
	function dodge_customize_register( $dodge_customize ){
	/**
	* 	general section
	*/
	$dodge_customize->add_panel( 'general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__('General', 'dodge'),   
	) );
	// hader navbar
	$dodge_customize->add_section('blog', array(
		'title'		=> esc_html('Show Category', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'general'
	));
	$dodge_customize->add_setting('blog_cat', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('blog_cat', array(
		'section'	=> 'blog',
		'label'		=> esc_html__( 'Show blog categories', 'dodge' ),
		'type'		=> 'radio',
		'choices' => array('On','Off'),
	));
	/**
	* 	header section
	*/
	$dodge_customize->add_panel( 'header', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__('Header', 'dodge'),   
	) );
	// hader navbar
	$dodge_customize->add_section('header_navbar', array(
		'title'		=> esc_html('Navbar Style', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'header'
	));
	$dodge_customize->add_setting('navbar_style', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('navbar_style', array(
		'section'	=> 'header_navbar',
		'label'		=> esc_html__( 'Choose navbar Style', 'dodge' ),
		'type'		=> 'radio',
		'choices' => array('One','Two'),
	));	
	// Header Logo
	$dodge_customize->add_section('header_logo', array(
		'title'		=> esc_html('Header Logo', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'header'
	));
	$dodge_customize->add_setting('main_logo', array(
		'default'	=> get_template_directory_uri().'/img/logo.png',
		'transport' => 'refresh'
	));
	$dodge_customize->add_setting('main_footer_logo', array(
		'default'	=> get_template_directory_uri().'/img/logo.png',
		'transport' => 'refresh'
	));
	$dodge_customize-> add_control(
        new WP_Customize_Image_Control($dodge_customize, 'main_logo', array(
            'section'   => 'header_logo',
            'label'     => esc_html__('Logo','dodge'),
            'settings'  =>  'main_logo'
        ))
    );
	$dodge_customize-> add_control(
        new WP_Customize_Image_Control($dodge_customize, 'main_footer_logo', array(
            'section'   => 'footer_logo_text',
            'label'     => esc_html__('Footer 2 Logo','dodge'),
            'settings'  =>  'main_footer_logo'
        ))
    );

	/**
	* 	footer section
	*/
	$dodge_customize->add_panel( 'footer', array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__('Footer', 'dodge'),   
	) );
	/**
	* footer style
	*/
	$dodge_customize->add_section('footer_section', array(
		'title'		=> esc_html('Footer Style', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'footer'
	));
	$dodge_customize->add_setting('footer_style', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('footer_style', array(
		'section'	=> 'footer_section',
		'label'		=> esc_html__( 'Choose Footer Style', 'dodge' ),
		'type'		=> 'radio',
		'choices' => array('One','Two'),
	));
	/**
	* footer social
	*/
	$dodge_customize->add_section('footer_social', array(
		'title'		=> esc_html('Footer Social', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'footer'
	));
	// facebook
	$dodge_customize->add_setting('facebook', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('facebook', array(
		'section'	=> 'footer_social',
		'label'		=> esc_html__( 'Facebook', 'dodge' ),
		'type'		=> 'text',
	));
	// twitter
	$dodge_customize->add_setting('twitter', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('twitter', array(
		'section'	=> 'footer_social',
		'label'		=> esc_html__( 'Twitter', 'dodge' ),
		'type'		=> 'text',
	));
	// google plus
	$dodge_customize->add_setting('google_plus', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('google_plus', array(
		'section'	=> 'footer_social',
		'label'		=> esc_html__( 'Google Plus', 'dodge' ),
		'type'		=> 'text',
	));
	// Pinterest
	$dodge_customize->add_setting('pinterest', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('pinterest', array(
		'section'	=> 'footer_social',
		'label'		=> esc_html__( 'Pinterest', 'dodge' ),
		'type'		=> 'text',
	));
	// linkedin
	$dodge_customize->add_setting('linkedin', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('linkedin', array(
		'section'	=> 'footer_social',
		'label'		=> esc_html__( 'Linkedin', 'dodge' ),
		'type'		=> 'text',
	));

	/**
	* footer logo and text area
	*/
	$dodge_customize->add_section('footer_logo_text', array(
		'title'		=> esc_html('Footer Logo And Text', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'footer'
	));
	// footer logo
	$dodge_customize->add_setting('footer_logo', array(
		'default'	=> get_template_directory_uri().'/img/logo-color.png',
		'transport' => 'refresh'
	));
	$dodge_customize-> add_control(
        new WP_Customize_Image_Control($dodge_customize, 'footer_logo', array(
            'section'   => 'footer_logo_text',
            'label'     => esc_html__('Footer Logo','dodge'),
            'settings'  =>  'footer_logo'
        ))
    );
	// footer text
	$dodge_customize->add_setting('footer_text', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('footer_text', array(
		'section'	=> 'footer_logo_text',
		'label'		=> esc_html__( 'Footer Text', 'dodge' ),
		'type'		=> 'textarea',
	));
	/**
	* footer Subscribe
	*/
	$dodge_customize->add_section('footer_subscribe', array(
		'title'		=> esc_html('Footer Subscribe', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'footer'
	));
	// subscribe text
	$dodge_customize->add_setting('subscribe_text', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('subscribe_text', array(
		'section'	=> 'footer_subscribe',
		'label'		=> esc_html__( 'Add Text', 'dodge' ),
		'type'		=> 'textarea',
	));
	// subscribe form
	$dodge_customize->add_setting('subscribe', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('subscribe', array(
		'section'	=> 'footer_subscribe',
		'label'		=> esc_html__( 'Add Shortcode', 'dodge' ),
		'type'		=> 'text',
	));
	/**
	* footer copyright
	*/
	$dodge_customize->add_section('footer_copyright', array(
		'title'		=> esc_html('Footer Copyright', 'dodge'),
		'priority'	=> 70,
		'panel'		=> 'footer'
	));
	$dodge_customize->add_setting('copyright_text', array(
		'default'	=> '',
		'transport' => 'refresh'
	));
	$dodge_customize->add_control('copyright_text', array(
		'section'	=> 'footer_copyright',
		'label'		=> esc_html__( 'Copyright Text', 'dodge' ),
		'type'		=> 'textarea',
	));

	}
	add_action('customize_register', 'dodge_customize_register');

