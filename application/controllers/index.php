<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

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
		$content = $this->load->view('index', "", true);
		$data = array(
			'page_title' => lang('idx_page_title'),
			'content' => $content
			);
		$this->parser->parse('template', $data);
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */