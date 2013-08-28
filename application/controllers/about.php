<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('about', $this->session->userdata('language'));
  }

	public function index()
	{
    $data->view = 'tzadi/about';
    $data->page_title = lang('abt_page_title');
    $this->page->load($data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */