<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends My_Controller {

  public function __construct() { 
    parent::__construct();
    $this->lang->load('supplier', $this->session->userdata('language'));

    $this->MYensureOwnProfile();
  }

  public function index()
  {
    $data = new StdClass();
    $data->dynJS = 'supplier/supplier';
    $data->view = 'supplier/manage';
    $data->page_title = lang('splr_listTitle');
    $this->page->load($data);
  }

  public function getAll()
  {
    $this->load->model('supplier_model');
    $data = $this->supplier_model->getAll();
    echo json_encode($data);
  }

  public function getAllActive()
  {
    $this->load->model('supplier_model');
    $data = $this->supplier_model->getAllActive();
    echo json_encode($data);
  }

  public function add()
  {
    $data = new StdClass();
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

  public function makeClone()
  {
    $this->load->model("supplier_model");
    $newSupplier = $this->supplier_model->makeClone($this->input->post("supplierID"));
    echo json_encode($newSupplier);
  }

  public function drop()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("supplier_model");
    $res = $this->supplier_model->drop($_id);
    echo json_encode($res);
  }

  public function addCampus(){
    $data = new StdClass();
    if($this->input->post("name")){
      $data->name = $this->input->post("name");
    }
    else {
      $data->name = lang('splr_newCampi');
    }
    $data->supplier = (int) $this->input->post("supplier");
    $this->load->model("supplier_model");
    $newCampus = $this->supplier_model->addCampus($data);
    echo json_encode($newCampus);
  }

  public function update()
  {
    $data = $this->input->post();
    $this->load->model("supplier_model");
    $res = $this->supplier_model->update($data);
    echo json_encode($res);
  }

  public function changeImg()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("supplier_model");
    $res = $this->supplier_model->changeImg($_id);
    echo json_encode($res);
  }

  public function attach()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("supplier_model");
    $res = $this->supplier_model->attach($_id);
    echo json_encode($res);
  }

  public function dropAttachment()
  {
    $data = $this->input->post();
    $this->load->model("supplier_model");
    $res = $this->supplier_model->dropAttachment($data);
    echo json_encode($res);
  }

  public function activate()
  {
    $data = $this->input->post();
    $this->load->model("supplier_model");
    $res = $this->supplier_model->activate($data);
    echo json_encode($res);
  }

  public function dropCampus()
  {
    $data = $this->input->post();
    $this->load->model("supplier_model");
    $res = $this->supplier_model->dropCampus($data);
    echo json_encode($res);
  }
}
/* End of file partner.php */
/* Location: ./application/controllers/partner.php */