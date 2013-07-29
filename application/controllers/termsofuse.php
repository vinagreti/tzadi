<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TermsOfUse extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('termsOfUse', $this->session->userdata('language'));
  }

	public function index() {
	    if(!defined('SUBDOMAIN')){
	      $data->view = 'tzadi/termsOfUse';
	      $data->page_title = lang('term_page_title');
	      $this->page->load($data);  
	    }
	    else{
	      $this->load->model("agency_model");
	      $agency = $this->agency_model->getBySubdomain(SUBDOMAIN);
	      $data->content = $this->load->view('agency/about', $agency, true);
	      $data->agencyName = $this->session->userdata("agencyName");
	      $data->view = 'agency/termsOfUse';
	      $data->page_title = lang('term_page_title');
	      $this->page->load($data);
	    }
	}
}

/* End of file termsofuse.php */
/* Location: ./application/controllers/termsofuse.php */