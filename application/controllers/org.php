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

    	if( $this->input->post() ){

		    $this->load->model("org_model");

	    	$data = json_encode( $this->org_model->setPayment( $this->input->post() ) );

		    $this->output->set_content_type('application/json');

		    $this->output->set_output($data);
		    
    	} else {

		    $this->load->model("org_model");

			$data->dynJS = 'org/paymentManage';

			$data->view = 'org/paymentManage';

			$data->agency = $this->org_model->getByID( $this->session->userdata("org") );

			$data->paymentResumeHTML = $this->load->view("org/paymentResume", $data->agency["payment"], true);

			$data->page_title = lang('agc_SettingsOf') . " " . $this->session->userdata("orgName");

			$this->page->load($data);

    	}

    }

  public function budget()
  {
    $this->load->model("org_model");
    $this->lang->load('org', $this->session->userdata('language'));
    $data->agency = $this->org_model->getByID( $this->session->userdata("org") );
    $data->paymentResumeHTML = $this->load->view("org/paymentResume", $data->agency["payment"], true);
    $data->dynJS = "org/budget";
    $data->view = 'org/budgetManage';
    $data->page_title = lang('org_budgetTitle');
    $this->page->load($data);
  }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */