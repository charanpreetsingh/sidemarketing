<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme dodge for publication on ThemeForest
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */


add_action( 'tgmpa_register', 'dodge_register_required_plugins' );


function dodge_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'               => esc_html__('dodge Post Type','dodge'),
			'slug'               => 'dodge_post_type',
			'source'             => esc_url('http://shapeux.com/wp/plugins/dodge/dodge_post_type.zip'),
			'required'           => true,
			'external_url'       => esc_url('http://shapeux.com/wp/plugins/dodge/dodge_post_type.zip'),
		),
		array(
			'name'               => esc_html__('Visual Composer','dodge'),
			'slug'               => 'js_composer',
			'source'             => esc_url('http://themecook.com/resources/js_composer.zip'),
			'required'           => true,
			'external_url'       => esc_url('http://themecook.com/resources/js_composer.zip'), 
		),
		array(
			'name'               => esc_html__('Dodge VC Addons','dodge'),
			'slug'               => 'vc_addon_dodge',
			'source'             => esc_url('http://shapeux.com/wp/plugins/dodge/vc_addon_dodge.zip'),
			'required'           => true,
			'external_url'       => esc_url('http://shapeux.com/wp/plugins/dodge/vc_addon_dodge.zip'),
		),
		array(
			'name'               => esc_html__('Dodge Widgets','dodge'),
			'slug'               => 'dodge_widget',
			'source'             => esc_url('http://shapeux.com/wp/plugins/dodge/dodge_widget.zip'),
			'required'           => true,
			'external_url'       => esc_url('http://shapeux.com/wp/plugins/dodge/dodge_widget.zip'), 
		),
		array(
			'name'               => esc_html__('Contact Form 7','dodge'),
			'slug'               => 'contact-form-7',
			'required'           => false, 
		),
		array(
			'name'               => esc_html__('Cmb2','dodge'),
			'slug'               => 'cmb2',
			'required'           => true, 
		),
		array(
			'name'               => esc_html__('Mailchimp for wp','dodge'),
			'slug'               => 'mailchimp-for-wp',
			'required'           => false, 
		),
	);
	$config = array(
		'id'           => 'dodge',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'dodge' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'dodge' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'dodge' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'dodge' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'dodge' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'dodge'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'dodge'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'dodge'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'dodge'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'dodge'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'dodge'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'dodge'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'dodge'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'dodge'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'dodge' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'dodge' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'dodge' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'dodge' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'dodge' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'dodge' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'dodge' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'dodge' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'dodge' ),
			'nag_type'                        => '', 
		),
	);
	tgmpa( $plugins, $config );
}