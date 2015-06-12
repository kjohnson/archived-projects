<?php 

$config['modules']['questionnaire_respondents'] = array(
	'module_name' => 'Questionnaire',
	'module_uri' => 'questionnaire/respondents',
	'model_name' => 'respondents_model',
	'nav_selected' => 'questionnaire/respondents',
	'permission' => 'questionnaire_respondents',
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'questionnaire', // put in the advanced module name here
);

$config['modules']['questionnaire_questions'] = array(
	'module_name' => 'Questionnaire',
	'module_uri' => 'questionnaire/questions',
	'model_name' => 'questions_model',
	'nav_selected' => 'questionnaire/questions',
	'permission' => 'questionnaire_questions',
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'questionnaire', // put in the advanced module name here
);

$config['modules']['questionnaire_answers'] = array(
	'module_name' => 'Questionnaire',
	'module_uri' => 'questionnaire/answers',
	'model_name' => 'answers_model',
	'nav_selected' => 'questionnaire/answers',
	'permission' => 'questionnaire_answers',
	'preview_path' => '', // put in the preview path on the site e.g products/{slug}
	'model_location' => 'questionnaire', // put in the advanced module name here
);
