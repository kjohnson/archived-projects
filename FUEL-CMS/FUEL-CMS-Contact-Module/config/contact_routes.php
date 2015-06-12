<?php 
$route[FUEL_ROUTE.'contact'] = 'contact';

/**
 * Simple Modules
 */
$contact_controllers = array('messages', 'contacts');

foreach($contact_controllers as $c) {

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'contact'].'/'.$c] = FUEL_FOLDER.'/module';

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'contact'].'/'.$c.'/(.*)'] = FUEL_FOLDER.'/module/$1';

}