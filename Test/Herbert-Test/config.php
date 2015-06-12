<?php

if (!defined('HERBERT_CONFIG'))
    die();

return [
    'framework' => 'framework', /** You will need to update the composer.json file if you change this value **/
    'plugin'    => 'plugin', /** You will need to update the composer.json file if you change this value **/
    'views'     => 'views',
    'assets'    => 'assets',
    'core'      => 'plugin.php',
    'api'       => 'herbertTestApi',
    'name'      => 'Herbert Test',
    'eloquent'  => true
];
