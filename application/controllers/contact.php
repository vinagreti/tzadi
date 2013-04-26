<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends My_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
    $app_language = $this->session->userdata('app_language');
  	if(isset($app_language)) {
  		$this->lang->load('template', $app_language);
  		$this->lang->load('contact', $app_language);
  	} else {
  		$this->lang->load('template', LANGUAGE);
  		$this->lang->load('contact', LANGUAGE);
  	}
  }

	public function index()
	{
		$data = $this->input->post();
		if(!$data){

      if(!defined('COMPANYNICK')) {
        $data->content = $this->load->view('tzadi/contact', "", true);
        $data->page_title = lang('ct_page_title');
        $this->parser->parse('templates/tzadiTemplate', $data);  
      }
      else {
        $company = $this->MYcheckCompany();
        if($company->companyContactFormPlace == "extern") redirect($company->companyContactLink);
        $data->content = $this->load->view('tzadi/contact', "", true);
        $data->page_title = lang('ct_page_title');
        $this->parser->parse('templates/companyTemplate', $data);  
      }
		} 
		else {
			if($data["email"] && $data["subject"] && $data["message"]){
				$this->load->model('contact_model');
				if($this->contact_model->save($data)){
					$response->success = true;
					$response->message = "Contato enviado com sucesso!";
					echo json_encode($response);
				}
				else {
					$response->success = false;
					$response->message = 'Houve algum problem ao enviar seu contato! Tente novamemte ou envie um email para <a href="mailto:contact@tzadi.com">contact@tzadi.com</a>';
					echo json_encode($response);
				}				
			} else {
				$response->success = false;
				$response->message = "Preencha todos os campos!";
				echo json_encode($response);
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */