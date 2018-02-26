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

if (array_search(ABSPATH . 'wp-admin/includes/plugin.php', get_included_files()) === false) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$atk_plugin_name = "atkdemo";
$atk_plugin = __NAMESPACE__."\\Plugin";

//load composer autoloader to start loading classes.
$demo_loader = require 'vendor/autoload.php';
$$atk_plugin_name = new  $atk_plugin($atk_plugin_name, new Pathfinder(plugin_dir_path(__FILE__)), new ComponentController());

//Register class loader with this plugin. Make sure atkwp-loader.php is install in mu-plugins.
\AtkWpLoader::getLoader()->registerPluginLoader($atk_plugin_name, $demo_loader);
//Set plugin with AtkWpLoader instance.
$$atk_plugin_name->setClassLoader(\AtkWpLoader::getLoader());

if (!is_null( $$atk_plugin_name)) {
    $$atk_plugin_name->boot(__FILE__);
}
//No need for regular composer autoloader, our AtkWpLoader will take care of loading class from now on.
$demo_loader->unregister();
unset($demo_loader);
