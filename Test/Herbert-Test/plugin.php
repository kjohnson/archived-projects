<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Herbert Test
 * Plugin URI:        http://developd.io/
 * Description:       A test of the Herbet plugin framework
 * Version:           0.1.0
 * Author:            Kyle B. Johnson
 * Author URI:        http://kylebjohnson.me/
 * License:           MIT
 */

require_once __DIR__ . '/vendor/autoload.php';

// Initialise framework
$plugin = new Herbert\Framework\Plugin();

if ($plugin->config['eloquent'])
{
    $plugin->database->eloquent();
}

if (!get_option('permalink_structure'))
{
    $plugin->message->error($plugin->name . ': Please ensure you have permalinks enabled.');
}
