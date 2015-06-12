<?php

$plugin->route->get([
    'as'   => 'simpleRoute',
    'uri'  => '/simple'
], function() {
    return 'Hello World';
});
