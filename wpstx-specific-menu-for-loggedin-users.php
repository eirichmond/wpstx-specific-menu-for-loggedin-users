<?php
/**
 * Plugin Name:     Wpstx Logged User Menu
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     wpstx-specific-menu-for-loggedin-users
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wpstx_Specific_Menu_For_Loggedin_Users
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Register Navigation Menus
function wpstx_logged_in_user_menu() {

	$locations = array(
		'logged-in-menu' => __( 'User Menu', 'wpstx_logged_in_user_menu' ),
		'logged-out-menu' => __( 'Login', 'wpstx_logged_in_user_menu' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'wpstx_logged_in_user_menu' );

// Function with a conditional for logged in/out users
function wpstx_users_menu() {
    wp_nav_menu(
        array(
            'theme_location' => is_user_logged_in() ? 'logged-in-menu' : 'logged-out-menu'
        )
    );
}
// create an action hook for uses in your theme
// to render the menu simply add "do_action('wpstx_users_menu');" anywhere in your theme
add_action('wpstx_users_menu','wpstx_users_menu');
