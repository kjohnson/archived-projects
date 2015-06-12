<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_base_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('contacts_model');
		$this->load->model('messages_model');
		$this->load->module_helper(CONTACT_FOLDER, 'contact');
	}

	function _render($view, $vars = array())
	{
		//set Theme Path for Views
		$theme_path = $this->fuel->contact->config('theme_path');
		$module = $this->fuel->contact->config('theme_module');
		$view_path = $theme_path . '/' . $view;

		$_vars = $this->fuel->pagevars->retrieve('contact');

		if (is_array($_vars)) {
			$vars = array_merge($_vars, $vars);
		}

		//get body for view in layout
		$vars['body'] = $this->load->module_view($module, $view_path, $vars, TRUE);

		//set the default layout
		$layout = (! empty($vars['layout']) ) ? $vars['layout'] : 'main';
		$output = $this->load->module_view($module, '_layouts/'.$layout, $vars, TRUE);

		$output = $this->fuel->page->fuelify($output);

		//Output
		$this->output->set_output($output);
	}

}