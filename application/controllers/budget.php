<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('budget', $this->session->userdata('language'));

	}

    public function index(){

	    $this->MYensureOwnProfile();

	    $this->load->model("org_model");

	    if( $this->input->post() )
	      echo json_encode( $this->org_model->set( $this->input->post() ) );

	    else {

	      $data->dynJS = 'budget/manage';

	      $data->view = 'budget/manage';

	      $data->agency = $this->org_model->getByID( $this->session->userdata("org") );

	      $data->page_title = lang('agc_SettingsOf') . " " . $this->session->userdata("orgName");

	      $this->page->load($data);

	    }

    }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */