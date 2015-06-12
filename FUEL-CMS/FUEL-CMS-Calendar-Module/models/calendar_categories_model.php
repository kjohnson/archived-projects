<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Calendar_categories_model extends Base_module_model {

	// read more about models in the user guide to get a list of all properties. Below is a subset of the most common:

	public $record_class = 'Calendar_category'; // the name of the record class (if it can't be determined)
	public $filters = array(); // filters to apply to when searching for items
	public $required = array(); // an array of required fields. If a key => val is provided, the key is name of the field and the value is the error message to display
	public $foreign_keys = array(); // map foreign keys to table models
	public $linked_fields = array(); // fields that are linked meaning one value helps to determine another. Key is the field, value is a function name to transform it. (e.g. array('slug' => 'title'), or array('slug' => arry('name' => 'strtolower')));
	public $boolean_fields = array(); // fields that are tinyint and should be treated as boolean
	public $unique_fields = array(); // fields that are not IDs but are unique. Can also be an array of arrays for compound keys
	public $parsed_fields = array(); // fields to automatically parse
	public $serialized_fields = array(); // fields that contain serialized data. This will automatically serialize before saving and unserialize data upon retrieving
	public $has_many = array(); // keys are model, which can be a key value pair with the key being the module and the value being the model, module (if not specified in model parameter), relationships_model, foreign_key, candidate_key
	public $belongs_to = array(); // keys are model, which can be a key value pair with the key being the module and the value being the model, module (if not specified in model parameter), relationships_model, foreign_key, candidate_key
	public $formatters = array(); // an array of helper formatter functions related to a specific field type (e.g. string, datetime, number), or name (e.g. title, content) that can augment field results
	public $display_unpublished_if_logged_in = FALSE;
	
	protected $friendly_name = ''; // a friendlier name of the group of objects
	protected $singular_name = ''; // a friendly singular name of the object


	function __construct()
	{
		parent::__construct('fuel_calendar_categories'); // table name
	}

	function list_items($limit = NULL, $offset = NULL, $col = 'id', $order = 'desc', $just_count = FALSE)
	{
		$data = parent::list_items($limit, $offset, $col, $order, $just_count = FALSE);

		foreach ($data as &$item) {
			$item['color'] = "#" . $item['color'] . " <span style='background-color: #".$item['color']."; width: 8px; height: 8px; display: inline-block; border-radius: 50%; border: 1px solid black;'></span>";
		}

		return $data;
	}

	function form_fields($values = array(), $related = array())
	{	
		$fields = parent::form_fields($values, $related);

		$fields['color'] = array('type' => 'colorpicker');

		$fields['imported'] = array('type' => 'toggler', 'prefix' => 'toggle_', 'options' => array('0' => 'No', '1' => 'Yes'));
		$fields['module'] = array('class' => 'toggle toggle_1');
		$fields['model'] = array('class' => 'toggle toggle_1');
		$fields['mapping'] = array('type' => 'keyval', 'class' => 'toggle toggle_1');

		return $fields;
	}

	function find_all($where = null, $order_by = null, $limit = null, $offset = null, $return_method = null, $assoc_key = null)
	{
		$return = parent::find_all($where, $order_by, $limit, $offset, $return_method, $assoc_key);

		$uncategorized = array(
			'id' => '0',
			'name' => 'Uncategorized',
			);
		$return[] = $this->map_to_record_class($uncategorized);

		return $return;
	}
	
	function find_events() {
		return $this->load->module_model('app', 'events_model')->find_all() ;
	}

}

class Calendar_category_model extends Base_module_record
{
	function import_events($where = null)
	{
		$CI =& get_instance();
		$CI->load->module_model('calendar', 'calendar_events_model');
		if (!$where) $where = array();

		if ($this->imported)
		{
			//Load Model
			$CI->load->module_model($this->module, $this->model);

			//Find Events
			$events = $CI->{$this->model}->find_all($where);
			$imported_events = array();

			//Map Fields
			foreach ($events as &$event)
			{
				foreach (json_decode($this->mapping) as $new => $old)
				{
						$imported_event[$new] = $event->{$old};
				}
				$imported_event['color'] = $this->color;

				$imported_events[] = $CI->calendar_events_model->map_to_record_class($imported_event);
			}

			//Retrun Imported Events
			return $imported_events;
		}
		else
		{
			$where['category_id'] = $this->id;
			$events = $CI->calendar_events_model->find_all($where);

			foreach ($events as $event) {
				$event->color = $this->color;
			}

			return $events;
		}		
	}


}