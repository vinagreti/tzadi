<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('template', $this->session->userdata('app_language'));
		$this->lang->load('about', $this->session->userdata('app_language'));
  }

	public function index()
	{
    if(!defined('COMPANYNICK')){
      $data->content = $this->load->view('tzadi/about', "", true);
      $data->page_title = lang('tmpt_About_us');
      $this->parser->parse('templates/tzadiTemplate', $data);      
    }
    else{
      $this->load->model("company_model");
      $company = $this->company_model->getByNick(COMPANYNICK);
      $data->content = $this->load->view('company/about', $company, true);
      $data->page_title = lang('tmpt_About_us');
      $data->companyName = $this->session->userdata("companyName");
      $this->parser->parse('templates/companyTemplate', $data);

    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */