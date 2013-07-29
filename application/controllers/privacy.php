<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('privacyPolicy', $this->session->userdata('language'));
  }

	public function index() {

	    if(!defined('SUBDOMAIN')){
	      $data->view = 'tzadi/privacyPolicy';
	      $data->page_title = lang('pvc_page_title');
	      $this->page->load($data);  
	    }
	    else{
	      $this->load->model("agency_model");
	      $agency = $this->agency_model->getBySubdomain(SUBDOMAIN);
	      $data->content = $this->load->view('agency/about', $agency, true);
	      $data->agencyName = $this->session->userdata("agencyName");
	      $data->view = 'agency/privacyPolicy';
	      $data->page_title = lang('pvc_page_title');
	      $this->page->load($data);
	    }
	}

}

/* End of file term.php */
/* Location: ./application/controllers/term.php */