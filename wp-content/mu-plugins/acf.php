<?php
/**
 * Plugin Name: ACF Configuration
 * Plugin URI:  https://kinetic.com
 * Version:     1.0.2
 * Description: Set up ACF defaults; move field groups to JSON.
 * Author:      Kinetic
 * Author URI:  https://kinetic.com
 * License:     GNU General Public License v2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * ACF Options Page
 *
 * @return void
 */
add_action('acf/init', function () {
    acf_add_options_page([
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'parent_slug' => 'themes.php',
        'redirect' => false,
    ]);
    
    acf_update_setting('enable_shortcode', false);
});

/**
 * Place ACF JSON in content directory
 * Note: Directory must exist before fields are saved there.
 *
 * @return string
 */
add_filter('acf/settings/save_json', function () {
    return dirname(__FILE__) . '/field-groups';
});

/**
 * Load ACF JSON from content directory
 *
 * @return array
 */
add_filter('acf/settings/load_json', function (array $paths) {
    unset($paths[0]);
    $paths[] = dirname(__FILE__) . '/field-groups';
    return $paths;
});

/**
 * Hide menu items from the admin menu
 *
 * @return void
 */
add_action('admin_menu', function () {
    // List of users that don't have pages removed
    $admins = [
        'kinadmin',
        'admin',
    ];

    $current_user = wp_get_current_user();
    if (! in_array($current_user->user_login, $admins)) {
        remove_menu_page('edit.php?post_type=acf-field-group');

        // Hide the ACF "Edit field group" cog in metaboxes.
        add_action('acf/input/admin_head', function () {
            ?>
            <style>
                .acf-postbox .acf-hndle-cog {
                    display: none !important;
                }
            </style>
            <?php
        });
    }
}, PHP_INT_MAX);
