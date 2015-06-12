<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Calendar_events_model extends Base_module_model {

	public $record_class = 'Calendar_event'; // the name of the record class (if it can't be determined)
	public $required = array('name');
	public $foreign_keys = array(
		'category_id' => array(CALENDAR_FOLDER => 'calendar_categories_model'),
		); // map foreign keys to table models
	public $parsed_fields = array('description', 'description_formatted', 'excerpt', 'excerpt_formatted');
	
	function __construct()
	{
		parent::__construct('fuel_calendar_events'); // table name
	}

	function list_items($limit = null, $offset = null, $col = 'name', $order = 'asc')
	{
		$this->db->select('fuel_calendar_events.id, fuel_calendar_events.name, fuel_calendar_events.start_date, fuel_calendar_events.end_date, fuel_calendar_events.published', FALSE);
		$this->db->select('categories.name AS category', FALSE);
		$this->db->join('fuel_calendar_categories as categories', 'categories.id = fuel_calendar_events.category_id', 'left');

		$data = parent::list_items($limit, $offset, $col, $order);
		return $data;
	}
	
	function on_before_clean($values)
	{
		if (empty($value['slug']))
		{
			$values['slug'] = url_title($values['name'], 'dash', TRUE);
		}
		return $values;
	}
	
	function form_fields($values = array(), $related = array())
	{
		$fields = parent::form_fields();
		return $fields;
	}
	
	function _common_query()
	{
		parent::_common_query();
		$this->db->order_by('start_date asc');
	}
	
}

class Calendar_event_model extends Base_module_record {

	public $color;
	
	function get_start_date_formatted($format = 'F')
	{
		return date($format, strtotime($this->start_date));
	}
	

	function get_date_range()
	{
		return date_range_string($this->start_date, $this->end_date);
	}
	
	function get_image_path()
	{
		return img_path($this->image);
	}

	function map_field($new, $old) {
		$this->{$new} = $this->{$old};
	}
}
?>