<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
$config['nav']['contact'] = array(
		'contact/messages' => 'Messages',
		'contact/contacts' => 'Contacts',
	);

/*
|--------------------------------------------------------------------------
| Module Configuration:
|--------------------------------------------------------------------------
*/

//page
$config['contact']['uri'] = 'contact';

//theme
$config['contact']['theme_module'] = 'contact';
$config['contact']['theme_path'] = '_themes/default';

//validation
$config['contact']['name_validation'] = array('trim', 'required', 'xss_clean');
$config['contact']['email_validation'] = array('trim', 'required', 'valid_email');
$config['contact']['message_validation'] = array('required', 'xss_clean');

//thank you page
$config['contact']['submit_message'] = "Your message has been recieved and you will be hearing from us as soon as possible.";

//email
$config['contact']['email_cc'] = array();
$config['contact']['email_bcc'] = array();
$config['contact']['email_subject'] = 'Inbound Message';

//spam
$config['contact']['use_honeypot'] = TRUE;
$config['contact']['honeypot_name'] = 'website'; //something not already used
$config['contact']['akismet_api_key'] = NULL;

//tables
$config['tables']['contact_messages'] = 'fuel_contact_messages';
$config['tables']['contact_contacts'] = 'fuel_contact_contacts';


/*
|--------------------------------------------------------------------------
| Configurable in settings if contact_use_db_table_settings is set
|--------------------------------------------------------------------------
*/

//deterines whether to use this configuration below or the database for controlling the blogs behavior
$config['contact_use_db_table_settings'] = TRUE;

//page
$config['contact']['settings']['uri'] = array('value' => 'contact');
$config['contact']['settings']['submit_message'] = array('type' => 'textarea', 'label' => 'Submit Message');

//theme
$modules_list = array('contact' => 'contact', 'app' => 'app');
$config['contact']['settings']['section_theme'] = array('type' => 'section', 'tag' => 'h3', 'label' => 'Theme');
$config['contact']['settings']['theme_module'] = array('type' => 'select', 'value' => 'contact', 'options' => $modules_list, 'label' => 'Theme Module');
$config['contact']['settings']['theme_path'] = array('value' => '_themes/default');

//validation
$validation_options = array('trim', 'required', 'xss_clean', 'valid_email');
$validation_options = array_combine($validation_options, $validation_options);
$config['contact']['settings']['section_validation'] = array('type' => 'section', 'tag' => 'h3', 'label' => 'Validation');
$config['contact']['settings']['name_validation'] = array('type' => 'multi', 'options' => $validation_options);
$config['contact']['settings']['email_validation'] = array('type' => 'multi', 'options' => $validation_options);
$config['contact']['settings']['message_validation'] = array('type' => 'multi', 'options' => $validation_options);

//email
$config['contact']['settings']['section_email'] = array('type' => 'section', 'tag' => 'h3', 'label' => 'Email');
$config['contact']['settings']['email_cc'] = array('label' => 'Cc', 'comment' => 'Carbon Copy for all messages (comma seperated)');
$config['contact']['settings']['email_bcc'] = array('label' => 'Bcc', 'comment' => 'Blind Carbon Copy for all messages (comma seperated)');
$config['contact']['settings']['email_subject'] = array('label' => 'Subject');

//spam
$config['contact']['settings']['section_spam'] = array('type' => 'section', 'tag' => 'h3', 'label' => 'Spam');
$config['contact']['settings']['use_honeypot'] = array('type' => 'checkbox', 'value' => 1, 'comment' => 'Form Submit SPAM feature');
$config['contact']['settings']['honeypot_name'] =array('label' => 'Honeypot Name', 'value' => 'website');
$config['contact']['settings']['akismet_api_key'] = array('label' => 'Akismet Key');

/*
|--------------------------------------------------------------------------
| Programmer specific config (not exposed in settings)
|--------------------------------------------------------------------------
*/
