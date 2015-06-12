<?php 
$config['name'] = 'Calendar Module';
$config['version'] = CALENDAR_VERSION;
$config['author'] = 'Kyle B. Johnson';
$config['company'] = '';
$config['license'] = 'Apache 2';
$config['copyright'] = '';
$config['author_url'] = '';
$config['description'] = '';
$config['compatibility'] = '1.0';
$config['instructions'] = '';
$config['permissions'] = array('calendar', 'calendar_events', 'calendar_categories', 'calendar/settings' => 'Calendar Settings');
$config['migration_version'] = 0;
$config['install_sql'] = 'fuel_calendar_install.sql';
$config['uninstall_sql'] = 'fuel_calendar_uninstall.sql';
$config['repo'] = 'git://github.com/kbjohnson90/FUEL-CMS-Calendar-Module.git';