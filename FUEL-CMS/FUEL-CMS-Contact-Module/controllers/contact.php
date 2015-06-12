<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(MODULES_PATH.'/contact/libraries/Contact_base_controller.php');
class Contact extends Contact_base_controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		if ($this->input->post('submit')) {

			//form validation
			$this->form_validation->set_rules('name', 'Name', implode('|', $this->fuel->contact->config('name_validation')));
			$this->form_validation->set_rules('email', 'Email', implode('|', $this->fuel->contact->config('email_validation')));
			$this->form_validation->set_rules('message', 'Message', implode('|', $this->fuel->contact->config('message_validation')));

			if ($this->form_validation->run() == TRUE) {
				$this->_submit();
			}
		}

		$vars['contacts'] = fuel_model('contacts');

		if ($this->fuel->contact->config('use_honeypot')) {
			$vars['honeypot'] = $this->fuel->contact->config('honeypot_name');
		}

		$this->_render('index', $vars);
	}

	public function thankyou() {
		$vars = array(
			'submit_message'  => $this->fuel->contact->config('submit_message'),
			);
		$this->_render('thankyou', $vars);
	}

	public function _submit() {

		//get form data from $_POST
		$post = $this->input->post();

		//check honeypot
		if ($this->fuel->contact->config('use_honeypot')) {
			$honeypot = $this->fuel->contact->config('honeypot_name');
			if (isset($post[$honeypot]) && $post[$honeypot] != NULL) {
				redirect('contact/thankyou'); //simulate successful submittion
			}
		}

		//structure data to insert into table
		$data = array(
			'name'    => $post['name'],
			'email'   => $post['email'],
			'to'      => $post['to'],
			'message' => $post['message']
			);

		//process through akismet
		if (!$this->_process_akismet($data)) {
			redirect('contact');
		}

		//if INSERT success, forward message and redirect url
		if($this->messages_model->insert($data)) {

			$this->_notify($data);

			redirect('contact/thankyou');
		} else {
			redirect('contact');
		}

	}

	/**
	 * Send Contact Notification
	 *
	 * @param array
	 */
	function _notify($data) {
		$contacts = ($data['to']) ? $this->contacts_model->find_all_array(array('id' => $data['to'])) : $this->contacts_model->find_all_array();
		
		foreach ($contacts as $contact) {
			$to[] = $contact['email'];
		}

		$this->load->library('email');

		$this->email->from($this->fuel->config('from_email'), $this->fuel->config('site_name'));
		if (!is_environment('production')) {
			$this->email->to($to);
		} else {
			$this->email->to($this->fuel->config('dev_email'));
		}

		if ($cc = $this->fuel->contact->config('email_cc')) {
			$this->email->cc($cc);
		}

		if ($bcc = $this->fuel->contact->config('email_bcc')) {
			$this->email->bcc($bcc);
		}

		$this->email->subject($this->fuel->contact->config('email_subject'));

		$msg = 'New Contact Message' . "\n";
		$msg .= 'From: ' . $data['name'] . ' (' . $data['email'] . ')' . "\n";
		$msg .= 'Message: ' . $data['message'] . "\n";

		$this->email->message($msg);

		$this->email->send();

		log_message('debug', $this->email->print_debugger());
	}

	/**
	 * Process through Akismet
	 *
	 * Adpated from Daylight Studio's Blog Module
	 *
	 * @param array
	 */
	function _process_akismet($data) {
		if ($this->fuel->contact->config('akismet_api_key'))
		{
			$this->load->module_library(CONTACT_FOLDER, 'akismet');

			$akisment_comment = array(
				'author'	=> $data['name'],
				'email'		=> $data['email'],
				'body'		=> $data['message']
			);

			$config = array(
				'blog_url' => $this->fuel->contact->url(),
				'api_key'  => $this->fuel->config->config('akismet_api_key'),
				'comment'  => $data['message']
			);

			$this->akismet->init($config);

			if ( $this->akismet->errors_exist() )
			{				
				if ( $this->akismet->is_error('AKISMET_INVALID_KEY') )
				{
					log_message('error', 'AKISMET :: Theres a problem with the api key');
				}
				elseif ( $this->akismet->is_error('AKISMET_RESPONSE_FAILED') )
				{
					log_message('error', 'AKISMET :: Looks like the servers not responding');
				}
				elseif ( $this->akismet->is_error('AKISMET_SERVER_NOT_FOUND') )
				{
					log_message('error', 'AKISMET :: Wheres the server gone?');
				}
			}
			else
			{
				//PASSES if not Spam
				return ($this->akismet->is_spam()) ? FALSE : TRUE;
			}

		} else {
			//no api key, PASSES
			return TRUE;
		}

	}

}
