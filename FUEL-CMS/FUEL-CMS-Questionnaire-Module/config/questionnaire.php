<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
$config['nav']['questionnaire'] = array(
		'questionnaire/questions' => 'Questions',
		'questionnaire/respondents' => 'Respondents',
		'questionnaire/answers' => 'Answers',
	);


/*
|--------------------------------------------------------------------------
| ADDITIONAL SETTINGS:
|--------------------------------------------------------------------------
*/

// set as defaults 
$config['questionnaire'] = array();
config['questionnaire']['form_class'] = '';
$config['questionnaire']['theme_module'] = 'questionnaire';
$config['questionnaire']['theme_path'] = '_blocks';


/*
|--------------------------------------------------------------------------
| Configurable in settings if questionnaire_use_db_table_settings is set
|--------------------------------------------------------------------------
*/

//deterines whether to use this configuration below or the database for controlling the blogs behavior
$config['contact_use_db_table_settings'] = TRUE;

$modules_list = array('app', 'questionnaire');

// used for Settings area

//theme
$config['questionnaire']['settings']['form_class'] = array();
$config['questionnaire']['settings']['section_theme'] = array('type' => 'section', 'tag' => 'h3', 'label' => 'Theme');
$config['questionnaire']['settings']['theme_module'] = array('type' => 'select', 'value' => 'questionnaire', 'options' => $modules_list, 'label' => 'Theme Module');
$config['questionnaire']['settings']['theme_path'] = array('value' => '_blocks');

/*
|--------------------------------------------------------------------------
| Programmer specific config (not exposed in settings)
|--------------------------------------------------------------------------
*/

// tables for inventory
$config['tables']['questionnaire_questions'] = 'fuel_questionnaire_questions';
$config['tables']['questionnaire_respondents'] = 'fuel_questionnaire_respondents';
$config['tables']['questionnaire_answers'] = 'fuel_questionnaire_answers';
