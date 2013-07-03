<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('template', $this->session->userdata('app_language'));
		$this->lang->load('contact', $this->session->userdata('app_language'));
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
        $data->content = $this->load->view('tzadi/contact', "", true);
        $data->page_title = lang('ct_page_title');
        $data->companyName = $this->session->userdata("companyName");
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