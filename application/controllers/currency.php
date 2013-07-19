<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('currency', $this->session->userdata('app_language'));

	}

	public function index()
	{

		$this->load->model("currency_model");

		echo json_encode($this->currency_model->getToday( ));

	}

	public function getAll()
	{

		$this->load->model("currency_model");

		echo json_encode($this->currency_model->getAll( ));

	}


	public function change()
	{

		echo json_encode($this->load->view('currency/change', "", TRUE));

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */