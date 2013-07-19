<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TermsOfUse extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('termsOfUse', $this->session->userdata('app_language'));
  }

	public function index() {
	    if(!defined('COMPANYSUBDOMAIN')){
	      $data->view = 'tzadi/termsOfUse';
	      $data->page_title = lang('term_page_title');
	      $this->page->load($data);  
	    }
	    else{
	      $this->load->model("company_model");
	      $company = $this->company_model->getBySubdomain(COMPANYSUBDOMAIN);
	      $data->content = $this->load->view('company/about', $company, true);
	      $data->companyName = $this->session->userdata("companyName");
	      $data->view = 'company/termsOfUse';
	      $data->page_title = lang('term_page_title');
	      $this->page->load($data);
	    }
	}
}

/* End of file termsofuse.php */
/* Location: ./application/controllers/termsofuse.php */