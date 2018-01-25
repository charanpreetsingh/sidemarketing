<?php

if( !defined( 'ABSPATH' ) ) exit;

/*
* Plugin Name: Dodge Post Type
* Plugin URL: http://codepassenger.com/
* Description: Visual composer custom post type for dodge themes only
* Version: 1.0
* Author: codepassenger
* Author URI: http://codepassenger.com/

* Dodge custom post type
* @since dodge 1.0
* @Package DODGE
*/

define( 'DODGE_CMB2_ACTIVED', in_array( 'cmb2/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

if(DODGE_CMB2_ACTIVED){
	require_once  plugin_dir_path( __FILE__ ).'dodge_metabox.php';
}


/*--------------------------------------------------------------
 *		dodge Slider Post Type
 *-------------------------------------------------------------*/
if(!function_exists('dodge_banner_post')):
	function dodge_banner_post(){
		$labels = array( 
			'name'                	=> _x( 'Banner slider', 'Banner slider', 'dodge' ),
			'singular_name'       	=> _x( 'Slider', 'Banner slider', 'dodge' ),
			'menu_name'           	=> esc_html__( 'Banner slider', 'dodge' ),
			'parent_item_colon'   	=> esc_html__( 'Parent App Intro:', 'dodge' ),
			'all_items'           	=> esc_html__( 'All Banner slider', 'dodge' ),
			'view_item'           	=> esc_html__( 'View Banner slider', 'dodge' ),
			'add_new_item'        	=> esc_html__( 'Add New Banner slider', 'dodge' ),
			'add_new'             	=> esc_html__( 'New Banner slider', 'dodge' ),
			'edit_item'           	=> esc_html__( 'Edit Banner slider', 'dodge' ),
			'update_item'         	=> esc_html__( 'Update Banner slider', 'dodge' ),
			'search_items'        	=> esc_html__( 'Search Banner slider', 'dodge' ),
			'not_found'           	=> esc_html__( 'No article found', 'dodge' ),
			'not_found_in_trash'  	=> esc_html__( 'No article found in Trash', 'dodge' )
		);
		
		$args = array(
			'labels'             	=> $labels,
			'public'             	=> true,
			'publicly_queryable' 	=> true,
			'show_in_menu'       	=> true,
			'show_in_admin_bar'   	=> true,
			'can_export'          	=> true,
			'has_archive'        	=> false,
			'hierarchical'       	=> false,
			'menu_icon'             => 'dashicons-welcome-widgets-menus',
			'supports'           	=> array( 'title','editor','thumbnail')
		);
		register_post_type('dodge_banner',$args);
	}
	add_action('init','dodge_banner_post');
endif;


/*--------------------------------------------------------------
 *		dodge Gallery Post Type
 *-------------------------------------------------------------*/
if(!function_exists('dodge_gallery_post')):
	function dodge_gallery_post(){
		$labels = array( 
			'name'                	=> _x( 'Gallery slider', 'Gallery slider', 'dodge' ),
			'singular_name'       	=> _x( 'Slider', 'Gallery slider', 'dodge' ),
			'menu_name'           	=> esc_html__( 'Gallery slider', 'dodge' ),
			'parent_item_colon'   	=> esc_html__( 'Parent App Intro:', 'dodge' ),
			'all_items'           	=> esc_html__( 'All Gallery slider', 'dodge' ),
			'view_item'           	=> esc_html__( 'View Gallery slider', 'dodge' ),
			'add_new_item'        	=> esc_html__( 'Add New Gallery slider', 'dodge' ),
			'add_new'             	=> esc_html__( 'New Gallery slider', 'dodge' ),
			'edit_item'           	=> esc_html__( 'Edit Gallery slider', 'dodge' ),
			'update_item'         	=> esc_html__( 'Update Gallery slider', 'dodge' ),
			'search_items'        	=> esc_html__( 'Search Gallery slider', 'dodge' ),
			'not_found'           	=> esc_html__( 'No article found', 'dodge' ),
			'not_found_in_trash'  	=> esc_html__( 'No article found in Trash', 'dodge' )
		);
		
		$args = array(
			'labels'             	=> $labels,
			'public'             	=> true,
			'publicly_queryable' 	=> true,
			'show_in_menu'       	=> true,
			'show_in_admin_bar'   	=> true,
			'can_export'          	=> true,
			'has_archive'        	=> false,
			'hierarchical'       	=> false,
			'menu_icon'             => 'dashicons-format-gallery',
			'supports'           	=> array( 'title','thumbnail')
		);
		register_post_type('dodge_gallery',$args);
	}
	add_action('init','dodge_gallery_post');
endif;