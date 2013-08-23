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

    if( $this->session->userdata("_id") ) {

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

        $data->view = 'user/login';

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

  public function changeImg( ) {

    $this->load->model('user_model');

    echo json_encode( $this->user_model->changeImg() );

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

    if( $this->session->userdata("_id") ) {

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

    if($this->session->userdata("kind") == "new") {

      if($this->input->post()) {
        $this->load->model("user_model");
        echo json_encode( $this->user_model->finishSignup( $this->input->post() ) );
      } else {
        $data->dynJS = 'user/finishSignup';
        $data->view = 'user/finishSignup';
        $data->page_title = lang('usr_finishSignup');
        $this->page->load($data); 
      }

    } else if ( $this->session->userdata("_id") ) {

      redirect(site_url('error/tryingToRefinishSignup'));

    } else {

      redirect(base_url());

    }

  }

  public function profile()
  {

    if( IDENTITY != $this->session->userdata("identity") )
      redirect("http://".$this->session->userdata("identity").".".ENVIRONMENT."/".lang("rt_profile"));

    $this->load->model("user_model");

    if( $this->input->post() )
      echo json_encode( $this->user_model->set( $this->input->post() ) );

    else {

      $data->dynJS = 'user/profile';

      $data->view = 'user/profile';

      $data->user = $this->user_model->getByIdentity(IDENTITY);

      $data->page_title = lang('usr_profile');

      $this->page->load($data); 

    }

  }

  public function interests()
  {

    $this->lang->load('product', $this->session->userdata('language'));

    if( IDENTITY != $this->session->userdata("identity") )
      redirect("http://".$this->session->userdata("identity").".".ENVIRONMENT."/".lang("rt_interests"));

    $this->load->model("user_model");

    if( $this->input->post() )
      echo json_encode( $this->user_model->set( $this->input->post() ) );

    else {

      $data->dynJS = 'user/interests';

      $data->view = 'user/interests';

      $data->user = $this->user_model->getByIdentity(IDENTITY);

      $data->page_title = lang('usr_interests');

      $this->page->load($data); 

    }

  }

  public function proposals()
  {

    if( IDENTITY != $this->session->userdata("identity") )
      redirect("http://".$this->session->userdata("identity").".".ENVIRONMENT."/".lang("rt_proposals"));

    $this->load->model("user_model");

    if( $this->input->post() )
      echo json_encode( $this->user_model->set( $this->input->post() ) );

    else {

      $data->dynJS = 'user/proposals';

      $data->view = 'user/proposals';

      $data->user = $this->user_model->getByIdentity(IDENTITY);

      $data->page_title = lang('usr_proposals');

      $this->page->load($data); 

    }

  }
}

/* End of file*/