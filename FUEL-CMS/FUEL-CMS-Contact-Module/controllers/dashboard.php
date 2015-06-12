<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Dashboard extends Fuel_base_controller {

	function __construct() {
		parent::__construct();
		$this->load->model('messages_model');
	}

	function index() {

		if ($this->fuel->auth->has_permission('contact')) {
			$vars = array();

			try {

				$vars['messages'] = $this->messages_model->list_items(5);

			} catch(Exception $e) {
				//echo '<p class="dashboard_error">'.lang('google_analytics_connect_error').'</p>';
				die();
			}

			$this->load->view('_admin/dashboard', $vars);

		}

	}
}