<?php

add_action( 'cmb2_admin_init', 'dodge_banner_metabox' );
/**
 * Define the metabox and field configurations.
 */
function dodge_banner_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'dodge_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'banner_metabox',
        'title'         => esc_html__( 'Banner Slider Metabox', 'dodge' ),
        'object_types'  => array( 'dodge_banner', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, 
    ) );

    // Default button
    $cmb->add_field( array(
        'name'       => esc_html__( 'Button Text', 'dodge' ),
        'desc'       => esc_html__( 'default text: Get Started for Free', 'dodge' ),
        'id'         => $prefix . 'button_text',
        'type'       => 'text',
        'show_on_cb' => 'dodge_hide_if_no_cats', 
    ) );
    $cmb->add_field( array(
        'name'       => esc_html__( 'Button Link', 'dodge' ),
        'desc'       => esc_html__( 'add button link', 'dodge' ),
        'id'         => $prefix . 'button_link',
        'type'       => 'text_url',
        'show_on_cb' => 'dodge_hide_if_no_cats', 
    ) );

    // Video button
    $cmb->add_field( array(
        'name'       => esc_html__( 'Video Button Text', 'dodge' ),
        'desc'       => esc_html__( 'default text: Watch a Demo', 'dodge' ),
        'id'         => $prefix . 'video_button_text',
        'type'       => 'text',
        'show_on_cb' => 'dodge_hide_if_no_cats', 
    ) );
    $cmb->add_field( array(
        'name'       => esc_html__( 'Video Button Link', 'dodge' ),
        'desc'       => esc_html__( 'add video button link default: https://www.youtube.com/watch?v=Cx6eaVeYXOs', 'dodge' ),
        'id'         => $prefix . 'video_button_link',
        'type'       => 'text_url',
        'show_on_cb' => 'dodge_hide_if_no_cats', 
    ) );


   

}