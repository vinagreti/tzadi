<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends My_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();

  		$this->lang->load('template', $this->session->userdata('app_language'));
  		$this->lang->load('index', $this->session->userdata('app_language'));
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