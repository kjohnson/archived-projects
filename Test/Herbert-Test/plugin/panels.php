<?php

$plugin->panel->add([
    'type'   => 'panel',
    'as'     => 'mainPanel',
    'title'  => 'Herbert Test',
    'slug'   => 'herbert-test',
    'icon'   => 'dashicons-admin-plugins'
], function() use ($plugin) {

    return $this->view->render('index', [
        'logo'  => get_site_url() . '/wp-content/plugins/herbert-test/plugin/assets/img/herbert-logo-small.svg',
        'title'   => 'Herbert Test - Admin',
    ]);

});
