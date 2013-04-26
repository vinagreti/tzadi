<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends My_Controller {

  public function __construct() {
    // carrega os arquivos de idioma
    parent::__construct();
    $app_language = $this->session->userdata('app_language');
  	if(isset($app_language)) {
  		$this->lang->load('template', $app_language);
  		$this->lang->load('about', $app_language);
  	} else {
  		$this->lang->load('template', LANGUAGE);
  		$this->lang->load('about', LANGUAGE);
  	}
  }

	public function index()
	{
    if(!defined('COMPANYNICK')){
      $data->content = $this->load->view('tzadi/about', "", true);
      $data->page_title = lang('tmpt_About_us');
      $this->parser->parse('templates/tzadiTemplate', $data);      
    }
    else{
      $company = $this->MYcheckCompany();
      if($company->companyAboutContent == "extern") redirect($company->companyAboutLink);
      $data->content = $this->load->view('company/about', $company, true);
      $data->page_title = lang('tmpt_About_us');
      $this->parser->parse('templates/companyTemplate', $data);

    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */