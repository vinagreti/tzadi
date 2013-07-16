<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('about', $this->session->userdata('app_language'));
  }

	public function index()
	{
    if(!defined('COMPANYSUBDOMAIN')){
      $data->view = 'tzadi/about';
      $data->page_title = lang('abt_page_title');
      $this->page->load($data);  
    }
    else{
      $this->load->model("company_model");
      $company = $this->company_model->getBySubdomain(COMPANYSUBDOMAIN);
      $data->content = $this->load->view('company/about', $company, true);
      $data->companyName = $this->session->userdata("companyName");
      $data->view = 'company/about';
      $data->page_title = lang('abt_page_title');
      $this->page->load($data);  
    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */