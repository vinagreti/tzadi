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
    $this->load->model("collaborator_model");
    $data->collaborators = $this->collaborator_model->getAll();
    $this->page->load($data);
  }

  public function getAll()
  {
    $this->load->model("collaborator_model");
    echo json_encode( $this->collaborator_model->getAll() );
  }

}
/* End of file partner.php */
/* Location: ./application/controllers/partner.php */