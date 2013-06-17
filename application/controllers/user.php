<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
    $app_language = $this->session->userdata('app_language');
  	if(isset($app_language)) {
  		$this->lang->load('template', $app_language);
  		$this->lang->load('login', $app_language);
  	} else {
  		$this->lang->load('template', LANGUAGE);
  		$this->lang->load('login', LANGUAGE);
  	}
  }

	public function index()
	{
		$this->login();
	}

	public function login(){

      if(!defined('COMPANYNICK')) {
        $data->content = $this->load->view('user/tzadiLogin', "", true);
        $data->page_title = lang('lgn_Sign_In');
        $this->parser->parse('templates/tzadiTemplate', $data); 
      }
      else {
        $data->content = $this->load->view('user/companyLogin', "", true);
        $data->page_title = lang('lgn_Sign_In');
        $data->companyName = $this->session->userdata("companyName");
        $this->parser->parse('templates/companyTemplate', $data);
      }
	}

	public function submitLogin()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->load->model('user_model');
		$permission = $this->user_model->checkCredential($email, $password);

		if ( $permission ) echo json_encode(true);
		else  echo json_encode(false);

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'user', 'refresh');
	}

	public function changeLang($language) {
		$this->session->set_userdata('app_language', $language);
	}

}

/* End of file*/