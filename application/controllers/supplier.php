<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends My_Controller {

  public function __construct() { 
    parent::__construct();
    $this->lang->load('supplier', $this->session->userdata('app_language'));
  }

  public function getAllActive()
  {
    $this->load->model('supplier_model');
    $data = $this->supplier_model->getAllActive();
    echo json_encode($data);
  }

  public function add()
  {
    if($this->input->post("name")){
      $data->name = $this->input->post("name");
    }
    else {
      $data->name = lang('splr_newSupplier');
    }
    $this->load->model("supplier_model");
    $newSupplier = $this->supplier_model->add($data);
    echo json_encode($newSupplier[0]);
  }

  public function addCampi(){
    if($this->input->post("name")){
      $data->name = $this->input->post("name");
    }
    else {
      $data->name = lang('splr_newCampi');
    }
    $data->supplier = (int) $this->input->post("supplier");
    $this->load->model("supplier_model");
    $newCampi = $this->supplier_model->addCampi($data);
    echo json_encode($newCampi);
  }
}
/* End of file partner.php */
/* Location: ./application/controllers/partner.php */