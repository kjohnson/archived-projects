<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(MODULES_PATH.'/questionnaire/libraries/Questionnaire_base_controller.php');
class Questionnaire extends Questionnaire_base_controller
{
	protected $last_question = false;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');

		$this->load->model('questions_model');

		$this->load->helper('form');

		$this->action = 'questionnaire/next';
		$this->attributes = array(
			'method' => 'POST',
			'id' => 'QuestionnaireForm',
			'class' => $this->fuel->questionnaire->config('form_class'),
			);

		$this->questions = $this->questions_model->find_all(array('published' => 'yes'));
	}

	public function index()
	{
		$this->start();
	}

	public function start()
	{
		if ($post = $this->input->post() && $this->input->post('start'))
		{
			$this->respondents_model->insert(array(
				'name' => $post['name'],
				'email' => $post['email'],
				));

			$respondent_id = $this->respondents_model->db()->insert_id();

			$this->session->set_userdata(array('respondent_id' => $respondent_id));

			redirect('questionnaire/next');
		}
		else
		{
			$this->action = 'questionnaire/start';

			$data['name']['label'] = form_label('Name', 'name');
			$data['name']['input'] = form_input(array(
				'name' => 'name',
				'value' => $this->input->post('name'),
				));



			$data['email']['label'] = form_label('Email', 'email');
			$data['email']['input'] = form_input(array(
				'name' => 'email',
				'type' => 'email',
				'value' => $this->input->post('email'),
				));


			$data['submit'] = form_submit('start', 'Start');

			$this->_render('start', $data);
		}
	}

	public function question($key = 0)
	{
		if (!isset($this->questions[$key])) redirect('questionnaire/end');

		$question = $this->questions[$key];
		
		$progress = "(" . ($key + 1) . "/" . count($this->questions) . ")";

		$data['question'] = form_label($progress . " " . $question->content, $question->id);

		$data['answer'] = form_input(array(
			'name' => 'response',
		));

		$data['hidden'] = form_hidden(array(
			'question_key' => $key,
			'question_id' => $question->id,
			'respondent_id' => $this->session->userdata('respondent_id'),
		));

		$submit_text = 'Next';
		$data['submit'] = form_submit('', $submit_text);

		$this->_render('question', $data);
	}

	public function next()
	{
		if ($post = $this->input->post())
		{
			$this->answers_model->insert(array(
				'question_id' => $post['question_id'],
				'respondent_id' => $post['respondent_id'],
				'response' => $post['response'],
				));

			$question_key = $post['question_key'];
			$next_question_key = $question_key + 1;
		}
		else
		{
			$next_question_key = 0;
		}

		if (!isset($this->questions[$next_question_key])) redirect('questionnaire/end');

		$this->question($next_question_key);
	}

	public function end()
	{
		$this->_render('end');
	}
}
