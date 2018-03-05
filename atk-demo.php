<?php

/*
Plugin Name: Atk-UI for Wordpress.
Description:A demo plugin demonstrating Agile Toolkit UI in Wordpress.
Version: 1.0
Author: Alain Belair
Author URI: https://github.com/ibelar
License: MIT
*/

namespace atkdemo;

use atkwp\controllers\ComponentController;
use atkwp\helpers\Pathfinder;

require 'vendor/autoload.php';
if (array_search(ABSPATH . 'wp-admin/includes/plugin.php', get_included_files()) === false) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$atk_plugin_name = "atkd";
$atk_plugin = __NAMESPACE__."\\Plugin";

$$atk_plugin_name = new  $atk_plugin($atk_plugin_name, new Pathfinder(plugin_dir_path(__FILE__)), new ComponentController());
if (!is_null( $$atk_plugin_name)) {
    $$atk_plugin_name->boot(__FILE__);
}
