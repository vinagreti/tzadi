<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('currency', $this->session->userdata('language'));

	}

	public function index()
	{

		if( $this->session->userdata("myOrg") ){

			$this->changeExchangeRate();

		} else {

			$this->load->model("currency_model");

			if( defined("ORG_ID") )
				$currency = $this->currency_model->getProfileCurrency( );

			else
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

	}

	public function currencyIframe()
	{

		$currency = $this->currency_model->getProfileCurrency( );

	    $data->view = 'currency/todayIframe';

	    $data->page_title = lang('crc_Rates');

	    $data->currency = $currency;

	    $this->page->loadIframe($data);

	}

	public function getAll()
	{

		$this->load->model("currency_model");

		echo json_encode($this->currency_model->getAll( ));

	}


	public function change()
	{

		$currencyBase = $this->input->post("currencyBase");

		if( $currencyBase ){

			$this->load->model("user_model");

			echo json_encode( $this->user_model->changeCurrencyBase( $currencyBase ) );

		} else
			echo json_encode($this->load->view('currency/change', "", TRUE));

	}

	public function changeExchangeRate()
	{

	    $this->MYensureOwnProfile();
  
		$data = $this->input->post();

		if( $data["kind"] && $data["value"] !== false ) {

			$this->load->model("org_model");

			echo json_encode( $this->org_model->setExchangeRate( $data ) );

		}

		else {

			$this->load->model("currency_model");

			$this->load->model("org_model");

			$data->exchangeRate = $this->org_model->getExchangeRate( );

			$data->currency = $this->currency_model->getToday( );

			$data->profileCurrency = $this->currency_model->getProfileCurrency( );

			$data->dynJS = 'currency/exchange';

			$data->view = 'currency/exchange';

			$data->page_title = lang('crc_changeExchangeRate');

			$this->page->load($data);

		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */