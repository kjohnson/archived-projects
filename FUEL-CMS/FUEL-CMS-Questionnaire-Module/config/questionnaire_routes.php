<?php 
$route[FUEL_ROUTE.'questionnaire'] = 'questionnaire';

/**
 * Simple Modules
 */
$questionnaire_controllers = array('questions', 'respondents', 'answers');

foreach($questionnaire_controllers as $c) {

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'questionnaire'].'/'.$c] = FUEL_FOLDER.'/module';

	$route[FUEL_ROUTE.$route[FUEL_ROUTE.'questionnaire'].'/'.$c.'/(.*)'] = FUEL_FOLDER.'/module/$1';

}