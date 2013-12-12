<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('org', $this->session->userdata('language'));

	}

    public function getBranches(){

        $this->load->model("org_model");

        echo json_encode( $this->org_model->getBranches() );
        
    }

    public function payment(){

    	$this->MYensureOwnProfile();

    	if( $this->input->put("paymentMethods") ){

		    $this->load->model("org_model");

            $paymentMethods = json_decode($this->input->put("paymentMethods"));

	    	$data = json_encode( $this->org_model->setPayment( $paymentMethods ) );

		    $this->output->set_content_type('application/json');

		    $this->output->set_output($data);
		    
    	} else {

		    $this->load->model("org_model");

			$data->dynJS = 'org/paymentManage';

			$data->view = 'org/paymentManage';

            $agency = $this->org_model->getByID( $this->session->userdata("org") );

            $data->payment = $agency["payment"];

			$data->page_title = lang('agc_SettingsOf') . " " . $this->session->userdata("orgName");

			$this->page->load($data);

    	}

    }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */