<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
    $this->lang->load('user', $this->session->userdata('language'));
  }

	public function index()
	{
		$this->login();
	}

	public function login(){

    if( $this->session->userdata("userID") ) {

      redirect(base_url());

    } else {

      if($this->input->post()) {

        $email = $this->input->post('email');

        $password = $this->input->post('password');

        $this->load->model('user_model');

        echo json_encode($this->user_model->authenticate($email, $password));    

      } else {

        $data->dynJS = "user/login";

        $data->page_title = lang('lgn_Sign_In');

        $data->view = 'user/tzadiLogin';

        $this->page->load($data);

      }
      
    }

	}

	public function facebookAuthenticate()
	{
		$data = $this->input->post('data');
		$this->load->model('user_model');
    if($data["id"]) echo json_encode($this->user_model->facebookAuthenticate($data));
    else echo json_encode("não foi informado nenhum linkedin_id");
	}

  public function linkedinAuthenticate()
  {
    $data = $this->input->post('data');
    $this->load->model('user_model');
    if($data["id"]) echo json_encode($this->user_model->linkedinAuthenticate($data));
    else echo json_encode("não foi informado nenhum linkedin_id");
  }
  
  public function googleAuthenticate()
  {
    $data = $this->input->post('data');
    $this->load->model('user_model');
    if($data["id"]) echo json_encode($this->user_model->googleAuthenticate($data));
    else echo json_encode("não foi informado nenhum linkedin_id");
  }

	public function logout()
	{
    $customData = $this->session->all_userdata();
    unset($customData['session_id']);
    unset($customData['ip_address']);
    unset($customData['user_agent']);
    unset($customData['last_activity']);
    unset($customData['language']);
    $this->session->unset_userdata($customData);
		redirect("http://".ENVIRONMENT);
	}

	public function changeLang($language) {
		$this->session->set_userdata('language', $language);
	}

  public function resetDatabase(){
    if(ENVIRONMENT == "tzadi.com") {
      echo "impossível executar esta ação em produção";
    } else {
      $this->load->model('user_model');
      $this->user_model->resetDatabase();
    }

  }

  public function signup()
  {

    if( $this->session->userdata("userID") ) {

      redirect(base_url());

    } else {

      if($this->input->post()) {
        $this->load->model("user_model");
        echo json_encode( $this->user_model->signup($this->input->post()) );
      } else {
        $data->dynJS = 'user/signup';
        $data->view = 'user/signup';
        $data->page_title = lang('usr_signup');
        $this->page->load($data); 
      }

    }

  }

  public function finishSignup()
  {

    if($this->session->userdata("userKind") == "new") {

      if($this->input->post()) {
        $this->load->model("user_model");
        echo json_encode( $this->user_model->finishSignup( $this->input->post() ) );
      } else {
        $data->dynJS = 'user/finishSignup';
        $data->view = 'user/finishSignup';
        $data->page_title = lang('usr_finishSignup');
        $this->page->load($data); 
      }

    } else {

      redirect(site_url('error/tryingToRefinishSignup'));

    }

  }

}

/* End of file*/