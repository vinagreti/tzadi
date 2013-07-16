<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends My_Controller {

  public function __construct() {
    // carrega os arquivos de idioma
    parent::__construct();
    $this->lang->load('signup', $this->session->userdata('app_language'));
  }

  public function index()
  {
    $data->dynJS = 'tzadi/signup';
    $data->view = 'tzadi/signup';
    $data->page_title = lang('su_page_title');
    $this->page->load($data); 
  }

  public function checkSubdomain(){
    $subdomain = $this->input->post("subdomain");
    $this->load->model("company_model");
    if($this->company_model->getBySubdomain($subdomain)) {
      $erro = lang("su_theSubdomain");
      $erro .= " <strong>".$subdomain."</strong> ";
      $erro .= lang("su_isAlreadyInUse");
      echo json_encode($erro);
    }
    else echo json_encode(false);
  }

  public function checkEmail(){
    $email = $this->input->post("email");
    $this->load->model("user_model");
    if($this->user_model->getByEmail($email)) {
      $erro = lang("su_theEmail");
      $erro .= " <strong>".$email."</strong> ";
      $erro .= lang("su_isAlreadyInUse");
      echo json_encode($erro);
    }
    else echo json_encode(false);
  }

  public function add()
  {
    $this->load->model("company_model");
    $data = $this->input->post();
    $newCompany = $this->company_model->add($data);
    echo json_encode($newCompany);
  }
    
}

