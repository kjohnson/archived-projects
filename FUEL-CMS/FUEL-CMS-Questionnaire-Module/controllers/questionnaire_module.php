<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Questionnaire_module extends Fuel_base_controller {
	
	public $nav_selected = 'questionnaire|questionnaire/:any';
	

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$vars['page_title'] = $this->fuel->admin->page_title(array(lang('module_questionnaire')), FALSE);
		$crumbs = array('tools' => lang('section_tools'), lang('module_questionnaire'));
		$this->fuel->admin->set_titlebar($crumbs, 'ico_questionnaire');
		$this->fuel->admin->render('_admin/questionnaire', $vars);

	}
	
}