<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');

class Respondents_model extends Base_module_model {

	// read more about models in the user guide to get a list of all properties. Below is a subset of the most common:

	public $record_class = 'Respondent'; // the name of the record class (if it can't be determined)
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
		parent::__construct('fuel_questionnaire_respondents'); // table name
	}

	function list_items($limit = NULL, $offset = NULL, $col = 'precedence', $order = 'desc', $just_count = FALSE)
	{
		$data = parent::list_items($limit, $offset, $col, $order, $just_count = FALSE);
		return $data;
	}

	function form_fields($values = array(), $related = array())
	{	
		$fields = parent::form_fields($values, $related);
		return $fields;
	}

	function tree()
	{
		$CI =& get_instance();
		$CI->load->module_model(QUESTIONNAIRE_FOLDER, 'questions_model');
		$CI->load->module_model(QUESTIONNAIRE_FOLDER, 'answers_model');

		$return = array();

		$respondents = $this->find_all();
		$questions = $CI->questions_model->find_all();
		$answers = $CI->answers_model->find_all();

		foreach ($respondents as $respondent) {
			$return[$respondent->id] = array('id' => $respondent->id, 'label' => $respondent->name, 'location' => 'fuel/questionnaire/respondents/edit/'.$respondent->id);
		}

		foreach ($answers as $answer) {
			$question = $CI->questions_model->find_one(array('id' => $answer->question_id));
			$parent_id = $answer->respondent_id;
			$return['a_' . $answer->id] = array('label' => $question->content.': '.$answer->response, 'parent_id' => $parent_id, 'location' => 'fuel/questionnaire/answers/edit/'.$answer->id);
		}

		return $return;
	}
	
	function on_before_save($values)
	{
		parent::on_before_save($values);
		return $values;
	}

	function on_after_save($values)
	{
		parent::on_after_save($values);
		return $values;
	}

	function _common_query()
	{
		parent::_common_query();
	}

}

class Respondent_model extends Base_module_record {
	
	// put your record model code here
}