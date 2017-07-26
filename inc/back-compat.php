<?php
/**
 * Coding Simply back compat functionality
 *
 * Prevents Coding Simply from running on CodingSimply versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package CodingSimply
 * @subpackage Coding_Simply
 * @since Coding Simply 1.0
 */

/**
 * Prevent switching to Coding Simply on old versions of CodingSimply.
 *
 * Switches to the default theme.
 *
 * @since Coding Simply 1.0
 */
function codingsimply_switch_theme()
{
    switch_theme(WP_DEFAULT_THEME, WP_DEFAULT_THEME);
    unset($_GET['activated']);
    add_action('admin_notices', 'codingsimply_upgrade_notice');
}

add_action('after_switch_theme', 'codingsimply_switch_theme');

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Coding Simply on CodingSimply versions prior to 4.1.
 *
 * @since Coding Simply 1.0
 */
function codingsimply_upgrade_notice()
{
    $message = sprintf(__('Coding Simply requires at least Wordpress version 4.1. You are running version %s. Please upgrade and try again.', 'codingsimply'), $GLOBALS['wp_version']);
    printf('<div class="error"><p>%s</p></div>', $message);
}

/**
 * Prevent the Customizer from being loaded on CodingSimply versions prior to 4.1.
 *
 * @since Coding Simply 1.0
 */
function codingsimply_customize()
{
    wp_die(sprintf(__('Coding Simply requires at least Wordpress version 4.1. You are running version %s. Please upgrade and try again.', 'codingsimply'), $GLOBALS['wp_version']), '', array(
        'back_link' => true,
    ));
}

add_action('load-customize.php', 'codingsimply_customize');

/**
 * Prevent the Theme Preview from being loaded on CodingSimply versions prior to 4.1.
 *
 * @since Coding Simply 1.0
 */
function codingsimply_preview()
{
    if (isset($_GET['preview'])) {
        wp_die(sprintf(__('Coding Simply requires at least Wordpress version 4.1. You are running version %s. Please upgrade and try again.', 'codingsimply'), $GLOBALS['wp_version']));
    }
}

add_action('template_redirect', 'codingsimply_preview');
