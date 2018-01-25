<?php

if( !defined( 'ABSPATH' ) ) exit;

/*
* Plugin Name: Dodge VC Addons
* Plugin URL: http://shapeux.com/plugins/
* Description: Visual Composer Custom-Addons for dodge themes
* Version: 1.0
* Author: ShapeUX
* Author URI: http://shapeux.com/

* Dodge VC Addons
* @since Dodge 1.0
* @Package DODGE
*/

	/*-------------------------------------------------------
	*			Custom Addons Include
	*-------------------------------------------------------*/


	define( 'DODGE_CORE_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

	if('DODGE_CORE_VISUAL_COMPOSER_ACTIVED') {
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_service.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_client.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_section_header.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_section_header_two.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_section_header_three.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_section_header_four.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_hero_banner.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_single_img.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_single_img_two.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_feature_list.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_counter.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_call_to_action.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_call_to_action_two.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_carousel.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_gallery_carousel.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_button_group.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_testimonial.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_skill.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_team.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_contact_info.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_map.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_tabs.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_faq.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_package.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_price_table.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_accordion.php';
		require_once plugin_dir_path(__FILE__) . 'addons/dodge_slider.php';
	}

	function dodge_loadscript(){
		wp_enqueue_script('fin-google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg', array('jquery'),false,false);
		wp_enqueue_script('g-map',plugins_url('js/gmap3.min.js',__FILE__),array('jquery'),false,false);
	}
	add_action('init','dodge_loadscript');

