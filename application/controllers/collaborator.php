<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collaborator extends My_Controller {

  public function __construct() { 
    parent::__construct();
    $this->lang->load('collaborator', $this->session->userdata('language'));
  }

  public function index()
  {
    $data->dynJS = 'collaborator/manage';
    $data->view = 'collaborator/manage';
    $data->page_title = lang('clb_listTitle');
    $this->page->load($data);
  }

}
/* End of file partner.php */
/* Location: ./application/controllers/partner.php */