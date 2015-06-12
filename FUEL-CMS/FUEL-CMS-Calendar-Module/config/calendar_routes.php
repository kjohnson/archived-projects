<?php 
$route[FUEL_ROUTE.'calendar'] = 'calendar';

/**
 * Simple Modules
 */
$calendar_controllers = array('events', 'categories');

foreach($calendar_controllers as $c) {

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'calendar'].'/'.$c] = FUEL_FOLDER.'/module';

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'calendar'].'/'.$c.'/(.*)'] = FUEL_FOLDER.'/module/$1';

}