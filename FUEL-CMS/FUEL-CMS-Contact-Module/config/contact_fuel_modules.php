<?php 

$config['modules']['contacts'] = array(
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'contact', // put in the advanced module name here
	'module_name' => 'Contacts',
	'module_uri' => 'contact/contacts',
	'model_name' => 'contacts_model',
	'nav_selected' => 'contact/contacts',
	'permission' => 'contact_contacts',
	'table_headers' => array(
		'id', //used as index
		'display_name',
		'email',
		'blurb',
		'precedence',
		'active',
	),
);

$config['modules']['messages'] = array(
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'contact', // put in the advanced module name here
	'module_name' => 'Messages',
	'module_uri' => 'contact/messages',
	'model_name' => 'messages_model',
	'nav_selected' => 'contact/messages',
	'permission' => 'contact_messages',
	'table_headers' => array(
		'id', //used as index
		'submitted',
		'name',
		'email',
		'read',
	),
	'filters' => array(
		'read' => array('type' => 'select', 'label' => 'Read: ', 'options' => array('no' => 'Unread', 'yes' => 'Read'), 'first_option' => 'Select One...'),
		),
);