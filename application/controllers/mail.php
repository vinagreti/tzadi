<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends My_Controller {

  public function __construct() { 
    parent::__construct();
    $this->lang->load('mail', $this->session->userdata('app_language'));
    $this->lang->load('template', $this->session->userdata('app_language'));
  }

  public function shareProduct()
  {

    $data = $this->input->post();

    $this->load->model("mail_model");
    
    echo json_encode($this->mail_model->shareProduct($data));

  }
}