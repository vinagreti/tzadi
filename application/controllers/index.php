<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends My_Controller {

  public function __construct() {
    // define os tipos de usuarios que podem acessar a classe Task
    parent::__construct();
	$this->lang->load('index', $this->session->userdata('app_language'));
  }

  public function index()
  {
    $data->dynJS = 'tzadi/index';
    $data->view = 'tzadi/index';
    $data->page_title = lang('idx_title');
    $this->page->load($data); 
  }
  
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */