<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('agency', $this->session->userdata('language'));

	}

    public function settings(){

	    $this->MYensureOwnProfile();

	    $this->load->model("org_model");

	    $data = new StdClass();

	    if( $this->input->post() )
	      echo json_encode( $this->org_model->set( $this->input->post() ) );

	    else {

	      $data->dynJS = 'agency/settings/basics';

	      $data->view = 'agency/settings/basics';

	      $data->agency = $this->org_model->getByID( $this->session->userdata("org") );

	      $data->page_title = lang('agc_SettingsOf') . " " . $this->session->userdata("orgName");

	      $this->page->load($data);

	    }

    }

	public function changeImg( ) {

		$this->MYensureOwnProfile();

		$this->load->model('org_model');

		echo json_encode( $this->org_model->changeImg() );

	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */