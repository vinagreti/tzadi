<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends My_Controller {

  public function __construct() {
    parent::__construct();
    $this->lang->load('error', $this->session->userdata('language'));
  }

  public function index()
  {
    $data->view = 'error/pageNotFound';
    $data->page_title = "ops  !";
    $this->page->load($data);
  }

  public function permission()
  {
    $data->view = 'error/permission';
    $data->page_title = lang('ops');
    $this->page->load($data);
  }

  public function identityNotFound()
  {
    $data->view = 'error/identityNotFound';
    $data->page_title = lang('ops');
    $this->page->load($data);
  }

  public function incompatibleUserAgent()
  {
    $data->view = 'error/incompatibleUserAgent';
    $data->page_title = lang('ops');
    $this->page->load($data);
  }

  public function tryingToRefinishSignup()
  {
    $data->view = 'error/tryingToRefinishSignup';
    $data->page_title = lang('ops');
    $this->page->load($data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */