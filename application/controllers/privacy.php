<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('privacyPolicy', $this->session->userdata('app_language'));
  }

	public function index() {
      $data->view = 'tzadi/privacyPolicy';
      $data->page_title = lang('pvc_page_title');
      $this->page->load($data);  
	}
}

/* End of file term.php */
/* Location: ./application/controllers/term.php */