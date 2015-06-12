<?php 
$route[FUEL_ROUTE.'chooser'] = 'chooser';

/**
 * Simple Modules
 */
$contact_controllers = array('photos');

foreach($contact_controllers as $c) {

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'chooser'].'/'.$c] = FUEL_FOLDER.'/module';

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'chooser'].'/'.$c.'/(.*)'] = FUEL_FOLDER.'/module/$1';

}