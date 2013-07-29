<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends My_Controller {

  public function __construct() { 
    parent::__construct();
    $this->lang->load('product', $this->session->userdata('language'));
  }

  public function index()
  {
    $data->dynJS = 'product/vitrine';
    $data->view = 'product/vitrine';
    $data->page_title = "Vitrine";
    $this->page->load($data);
  }

  public function manage()
  {
    $data->dynJS = 'product/manage';
    $data->view = 'product/manage';
    $data->page_title = lang('pdt_listTitle');
    $this->page->load($data);
  }

  public function budget()
  {
    $data->dynJS = 'product/budget';
    $data->view = 'product/budget';
    $data->page_title = lang('pdt_budgetTitle');
    $this->page->load($data);
  }

  public function getAll(){
    $this->load->model("product_model");
    echo json_encode($this->product_model->getAll());
  }

  public function getPublic()
  {
    $this->load->model('product_model');
    $data = $this->product_model->getPublic();
    echo json_encode($data);
  }

  public function getByID(){
    $productID = $this->input->post("productID");
    $this->load->model("product_model");
    $data = $this->product_model->getByID( $productID );
    echo json_encode($data);
  }

  public function drop()
  {
    $_id = (int) $this->input->post('_id');
    if(!isset($_id)) echo json_encode(lang("pdt_idNotSent"));
    else {
      $this->load->model("product_model");
      echo json_encode($this->product_model->drop($_id));
    }
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

  public function makeClone()
  {
    $this->load->model("product_model");
    $newProduct = $this->product_model->makeClone($this->input->post("productID"));
    echo json_encode($newProduct);
  }

  public function set()
  {
    $data = $this->input->post();
    $this->load->model("product_model");
    echo json_encode($this->product_model->set($data));
  }
  public function attachImg()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("product_model");
    $res = $this->product_model->attachImg($_id);
    echo json_encode($res);
  }

  public function view( $_id ){
    $data->dynJS = array('product/view', "product/product");
    $this->load->model("product_model");
    $data->product = $this->product_model->getHumanized( $_id );
    $data->view = 'product/view';
    $data->page_title = $data->product["name"];
    $this->page->load($data);
  }

  public function like()
  {
    $this->load->model('product_model');
    $likes = $this->product_model->like();
    echo json_encode($likes);
  }

  public function share()
  {
    $data = $this->input->post();
    $this->load->model("product_model");
    echo json_encode($this->product_model->share($data));
  }
}
/* End of file product.php */
/* Location: ./application/controllers/product.php */