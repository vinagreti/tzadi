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

  public function getAll()
  {
    $this->load->model("collaborator_model");
    echo json_encode( $this->collaborator_model->getAll() );
  }

  public function add()
  {

    $data = $this->input->post();

    if( isset( $data["org_branch"] ) && isset( $data["org_resp"] ) && isset( $data["name"] ) && isset( $data["email"] ) ){

      $this->load->model("collaborator_model");

      echo json_encode( $this->collaborator_model->add( $data ) );

    } else {

      echo json_encode( array("error" => "preencha todos os campos" ) );

    }


  }

}
/* End of file partner.php */
/* Location: ./application/controllers/partner.php */