<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Chooser_module extends Fuel_base_controller {
	
	public $nav_selected = 'chooser';
	

	function __construct()
	{
		parent::__construct();
		$this->load->model('chooser_photos_model');
	}
	
	function index()
	{
		$vars['page_title'] = $this->fuel->admin->page_title(array(lang('module_chooser')), FALSE);
		$crumbs = array('tools' => lang('section_tools'), lang('module_chooser'));
		$this->fuel->admin->set_titlebar($crumbs, 'ico_chooser');
		$this->fuel->admin->render('_admin/chooser', $vars);

	}

	function import() {
		$data = array(
			'name' => $this->input->post('name'),
			'link' => $this->input->post('link'),
			'thumbnailLink' => $this->input->post('thumbnailLink'),
			'icon' => $this->input->post('icon'),
		);
		$this->chooser_photos_model->insert($data);
	}
	
}