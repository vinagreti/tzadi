<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
    $app_language = $this->session->userdata('app_language');
  	if(isset($app_language)) {
  		$this->lang->load('template', $app_language);
  		$this->lang->load('user/login', $app_language);
  	} else {
  		$this->lang->load('template', LANGUAGE);
  		$this->lang->load('user/login', LANGUAGE);
  	}
  }

	public function index()
	{
		$this->login();
	}

	public function login(){
		$content = $this->load->view('user/login', "", true);
		$data = array(
			'page_title' => lang('lgn_Sign_In'),
			'content' => $content
			);
		$this->parser->parse('template', $data);
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

		$this->session->unset_userdata('userID');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('userEmail');
		$this->session->set_userdata('userLevel', 'public');

		redirect(base_url() . 'user', 'refresh');
	}

	public function changeLang($language) {
		$this->session->set_userdata('app_language', $language);
	}

}

/* End of file*/