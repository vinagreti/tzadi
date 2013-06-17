<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends My_Controller {

  public function __construct() { 
    parent::__construct();
    $this->lang->load('product', $this->session->userdata('app_language'));
  }

  public function index()
  {
    $data->class = 'product';
    $data->view = 'product/index';
    $data->page_title = lang('pdt_listTitle');
    $this->page->load($data);
  }

  public function getAll(){
    $this->load->model("product_model");
    echo json_encode($this->product_model->getAll());
  }

  public function drop()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("product_model");
    $res = $this->product_model->drop($_id);
    echo json_encode($res);
  }
  public function add()
  {
    $this->load->model("product_model");
    $data->name = $this->input->post("name");
    $data->kind = $this->input->post("kind");
    if(!$data->name) $data->name = lang('pdt_newProduct');
    $newProduct = $this->product_model->add($data);
    echo json_encode($newProduct[0]);
  }
  public function set()
  {
    $data = $this->input->post();
    $this->load->model("product_model");
    $res = $this->product_model->set($data);
    echo json_encode($res);
  }
  public function changePhoto()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("product_model");
    $res = $this->product_model->changePhoto($_id);
    echo json_encode($res);
  }
}
/* End of file product.php */
/* Location: ./application/controllers/product.php */