<?php
/**
 * Plugin Name: Disable Plugins
 * Plugin URI:  https://gist.github.com/joshuafredrickson/949cc0eb19d8ca2d5d7c23d8d9134ff3
 * Version:     1.0.0
 * Description: Disable certain plugins in certain environments; define WP_ENVIRONMENT_TYPE in wp-config.php
 * Author:      Kinetic
 * Author URI:  https://kinetic.com
 * License:     GNU General Public License v2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

add_action('admin_init', function () {
    disable_plugins([
        'query-monitor/query-monitor.php',
        'wp-force-login/wp-force-login.php',
    ], ['production']);

    disable_plugins([
        'backupbuddy/backupbuddy.php',
        'sg-cachepress/sg-cachepress.php',
        'simple-history/index.php',
        'wp-fastest-cache/wpFastestCache.php',
    ], ['local', 'development', 'staging']);

    disable_plugins([
        'autoptimize/autoptimize.php',
        'ithemes-security-pro/ithemes-security-pro.php',
        'iwp-client/init.php',
        'sucuri-scanner/sucuri.php',
    ], ['local', 'development']);

    disable_plugins([
        'wp-force-login/wp-force-login.php'
    ], ['local']);
});

function disable_plugins(array $plugins = [], array $environments = [])
{
    if (in_array(wp_get_environment_type(), $environments)) {
        deactivate_plugins($plugins);

        // Notify / override actions on plugin screen to let admin know why it's disabled
        add_filter('plugin_action_links', function ($action_links, $plugin_file) use ($plugins, $environments) {
            if (in_array($plugin_file, $plugins)) {
                $envs = implode(', ', $environments);
                $action_links = [
                    'disabled' => "<small style='color: #333;'><b style='color: #b32d2e;'>Disabled in {$envs}</b>. Config in `mu-plugins/disable-plugins.php`</small>"
                ];
            }
            return $action_links;
        }, 10, 5);
    }
}
