<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Plugin Name: KJ Autoload
 * Plugin URI: http://kylebjohnson.me
 * Description: An example plugin for testing spl_autoload
 * Version: 0.0.0.0.1
 * Author: Kyle B. Johnson
 * Author URI: http://kylebjohnson.me
 */

/**
 * Class autoloaded
 */
class autoloaded
{
    public function kjautoload_autoloader( $class_name ) {
        if ( false !== strpos( $class_name, 'KJAutoload' ) ) {
            $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR;
            $class_file = str_replace( '_', DIRECTORY_SEPARATOR, $class_name ) . '.php';
            require_once $classes_dir . $class_file;
        }
    }
}

/**
 * Class KJAutoload
 */
class KJAutoload extends autoloaded
{

    public function __construct()
    {
        spl_autoload_register( array( $this, 'kjautoload_autoloader' ) );

        $this->base_class = new KJAutoload_ChildClass();
    }

}

// Self Instantiate Plugin Class
new KJAutoload();