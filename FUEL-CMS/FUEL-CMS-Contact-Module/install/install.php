<?php 
$config['name'] = 'Contact Module';
$config['version'] = CONTACT_VERSION;
$config['author'] = 'Kyle B. Johnson';
$config['company'] = '';
$config['license'] = 'Apache 2';
$config['copyright'] = '';
$config['author_url'] = '';
$config['description'] = '';
$config['compatibility'] = '1.0';
$config['instructions'] = '';
$config['permissions'] = array('contact_contacts', 'contact_messages', 'contact/settings' => 'Contact Settings');
$config['migration_version'] = 0;
$config['install_sql'] = 'fuel_contact_install.sql';
$config['uninstall_sql'] = 'fuel_contact_uninstall.sql';
$config['repo'] = 'git://github.com/kbjohnson90/FUEL-CMS-Contact-Module.git';