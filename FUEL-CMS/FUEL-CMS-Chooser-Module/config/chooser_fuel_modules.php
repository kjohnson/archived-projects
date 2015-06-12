<?php 

$config['modules']['chooser_photos'] = array(
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'chooser', // put in the advanced module name here
	'module_name' => 'Chooser',
	'module_uri' => 'chooser/photos',
	'model_name' => 'chooser_photos_model',
	'nav_selected' => 'chooser/photos',
	'table_headers' => array(
		'id', //used as index
		'name',
		'precedence',
		'published',
	),
);
