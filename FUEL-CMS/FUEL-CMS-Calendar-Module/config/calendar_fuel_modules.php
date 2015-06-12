<?php 

$config['modules']['calendar_events'] = array(
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'calendar', // put in the advanced module name here
	'module_name' => 'Events',
	'module_uri' => 'calendar/events',
	'model_name' => 'calendar_events_model',
	'nav_selected' => 'calendar/events',
	'permission' => 'calendar_events',
	'table_headers' => array(
		'id',
		'name',
		'category',
		'start_date',
		'end_date',
		'published',
		),
);

$config['modules']['calendar_categories'] = array(
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'calendar', // put in the advanced module name here
	'module_name' => 'Categories',
	'module_uri' => 'calendar/categories',
	'model_name' => 'calendar_categories_model',
	'nav_selected' => 'calendar/categories',
	'permission' => 'calendar_categories',
	'table_headers' => array(
		'id',
		'name',
		'color',
		),
);
