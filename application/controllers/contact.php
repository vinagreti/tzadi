<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends My_Controller {

  public function __construct() {
    parent::__construct();
	$this->lang->load('contact', $this->session->userdata('language'));
  }

	public function index()
	{
		$data = $this->input->post();
		if(!$data){
	        $data->dynJS = 'tzadi/contact';
	        $data->view = 'tzadi/contact';
	        $data->page_title = lang('ct_page_title');
	        $this->page->load($data); 
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

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */