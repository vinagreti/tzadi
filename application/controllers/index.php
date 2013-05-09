<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends My_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
    $app_language = $this->session->userdata('app_language');
  	if(isset($app_language)) {
  		$this->lang->load('template', $app_language);
  		$this->lang->load('index', $app_language);
  	} else {
  		$this->lang->load('template', LANGUAGE);
  		$this->lang->load('index', LANGUAGE);
  	}
  }

	public function index()
	{
		$content = $this->load->view('tzadi/index', "", true);
		$data = array(
			'page_title' => 'Home',
			'content' => $content
			);
		$this->parser->parse('templates/tzadiTemplate', $data);
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */