<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Event_module extends Fuel_base_controller {
	
	public $nav_selected = 'event|event/:any';
	

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$vars['page_title'] = $this->fuel->admin->page_title(array(lang('module_event')), FALSE);
		$crumbs = array('tools' => lang('section_tools'), lang('module_event'));
		$this->fuel->admin->set_titlebar($crumbs, 'ico_event');
		$this->fuel->admin->render('_admin/event', $vars);

	}
	
}