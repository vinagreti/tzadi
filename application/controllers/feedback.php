<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('feedback', $this->session->userdata('language'));

	}

	public function open()
	{

		$data->email = "";

		$data->uneditable = "";

		if( $this->session->userdata('email') ) {

			$data->email = $this->session->userdata('email');

			$data->uneditable = "uneditable-input";

		}

		echo json_encode($this->load->view('feedback/modalForm', $data, TRUE));

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */