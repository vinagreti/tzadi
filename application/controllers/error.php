<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends My_Controller {

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
    $this->parser->parse('templates/tzadiTemplate', $data);
  }

  public function companyNotFound()
  {
    $content = $this->load->view('error/companyNotFound', "", true);
    $data = array(
      'page_title' => 'ops',
      'content' => $content
      );
    $this->parser->parse('templates/tzadiTemplate', $data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */