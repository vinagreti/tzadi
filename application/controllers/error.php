<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
    $app_language = $this->session->userdata('app_language');
    if(isset($app_language)) {
      $this->lang->load('template', $app_language);
      //$this->lang->load('welcome', $app_language);
    } else {
      $this->lang->load('template', LANGUAGE);
      //$this->lang->load('welcome', LANGUAGE);
    }
  }

  public function index()
  {
    $content = $this->load->view('error/pageNotFound', "", true);
    $data = array(
      'page_title' => 'ops',
      'content' => $content
      );
    $this->parser->parse('template', $data);
  }

  public function permission()
  {
    $content = $this->load->view('error/permission', "", true);
    $data = array(
      'page_title' => 'ops',
      'content' => $content
      );
    $this->parser->parse('template', $data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */