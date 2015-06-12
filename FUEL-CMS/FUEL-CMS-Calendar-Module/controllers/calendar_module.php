<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Calendar_module extends Fuel_base_controller {
	
	public $nav_selected = 'calendar';

	public $prefs;	

	function __construct()
	{
		parent::__construct();

		$this->load->model('calendar_events_model', 'events');
		$this->load->model('calendar_categories_model', 'categories');

		$this->prefs = array (
		               'start_day'    => 'sunday',
		               'month_type'   => 'long',
		               'day_type'     => 'short',
		               'template'     => $this->load->view('_admin/calendar_template', '', true),
		               'show_next_prev'  => TRUE,
		               'next_prev_url'   => base_url().'fuel/calendar/view/'
		             );
	}

	function index() {
		$this->view();
	}
	
	function view($year = null, $month = null)
	{
		if (!$year)  $year  = date('Y');
		if (!$month) $month = date('m');

		$vars['page_title'] = $this->fuel->admin->page_title(array(lang('module_calendar')), FALSE);
		$crumbs = array('tools' => lang('section_tools'), lang('module_calendar'));
		$this->fuel->admin->set_titlebar($crumbs, 'ico_calendar');

		$where = array(
			'start_date >=' => $year . "/" . $month . "/01",
			'start_date <' => date('Y-m-t', strtotime($year . "/" . $month . "/01")),
			'published' => true,
			);

		$events = array(); //$this->events->find_all($where);

		$categories = $this->categories->find_all();
		foreach ($categories as $category)
		{
			$category_events = $category->import_events($where);

			$events = (object) array_merge((array)$events, (array)$category_events);				
		}

		$dates = $this->date_sort($events);

		$vars['calendar'] = $this->generate($dates, $year, $month);

		$this->fuel->admin->render('_admin/calendar', $vars);

	}

	function generate($dates, $year, $month)
	{
		$this->load->library('calendar', $this->prefs);

		return $this->calendar->generate($year, $month, $dates);
	}

	function date_sort($events)
	{
		$dates = array();

		foreach ($events as $event) {
			$date = date('j', strtotime($event->start_date));

			$data['event'] = $event;

			if (!array_key_exists($date, $dates)) {
				$dates[$date] = $this->load->view('_blocks/event_label', $data, true);
			} else {
				$dates[$date] .= $this->load->view('_blocks/event_label', $data, true);
			}
		}

		return $dates;
	}
	
}