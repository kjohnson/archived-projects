<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Questionnaire_base_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('questions_model');
		$this->load->model('respondents_model');
		$this->load->model('answers_model');
	}

	function _render($view, $vars = array())
	{
		//set Theme Path for Views
		$theme_path = $this->fuel->questionnaire->config('theme_path');
		$module = $this->fuel->questionnaire->config('theme_module');
		$view_path = $theme_path . '/' . $view;

		$_vars = $this->fuel->pagevars->retrieve('questionnaire');

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