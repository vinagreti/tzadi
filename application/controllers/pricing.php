<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricing extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('pricing', $this->session->userdata('language'));
  }

	public function index() {

    $data->view = 'tzadi/pricing';

    $data->page_title = lang('prc_page_title');

    $this->page->load($data);

	}

}

/* End of file term.php */
/* Location: ./application/controllers/term.php */