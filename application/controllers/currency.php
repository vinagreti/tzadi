<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('currency', $this->session->userdata('language'));

	}

	public function index()
	{

		$this->load->model("currency_model");

		$currency = $this->currency_model->getToday( );

		if($this->input->post()) {

			echo json_encode( $currency );

		} else {

	    $data->view = 'currency/today';

	    $data->page_title = lang('crc_Rates');

	    $data->currency = $currency;

	    $this->page->load($data);

		}

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