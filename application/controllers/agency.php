<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('agency', $this->session->userdata('language'));

	}

    public function settings(){

	    $this->MYensureOwnProfile();

	    $this->load->model("org_model");

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

    public function budget(){

	    $this->MYensureOwnProfile();

	    $this->load->model("org_model");

	    if( $this->input->post() )
	      echo json_encode( $this->org_model->set( $this->input->post() ) );

	    else {

	      $data->dynJS = 'agency/settings/budget';

	      $data->view = 'agency/settings/budget';

	      $data->agency = $this->org_model->getByID( $this->session->userdata("org") );

	      $data->page_title = lang('agc_SettingsOf') . " " . $this->session->userdata("orgName");

	      $this->page->load($data);

	    }

    }

    public function payment(){

	    $this->MYensureOwnProfile();

	    $this->load->model("org_model");

	    if( $this->input->post() )
	      echo json_encode( $this->org_model->set( $this->input->post() ) );

	    else {

	      $data->dynJS = 'agency/settings/payment';

	      $data->view = 'agency/settings/payment';

	      $data->agency = $this->org_model->getByID( $this->session->userdata("org") );

	      $data->page_title = lang('agc_SettingsOf') . " " . $this->session->userdata("orgName");

	      $this->page->load($data);

	    }

    }

    public function theme(){

	    $this->MYensureOwnProfile();

	    $this->load->model("org_model");

	    if( $this->input->post() )
	      echo json_encode( $this->org_model->set( $this->input->post() ) );

	    else {

	      $data->dynJS = 'agency/settings/theme';

	      $data->view = 'agency/settings/theme';

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

  public function changeTheme( ) {

    $this->MYensureOwnProfile();

    $this->load->model('org_model');

    $data = $this->input->post();

    echo json_encode( $this->org_model->changeTheme( $data ) );

  }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */