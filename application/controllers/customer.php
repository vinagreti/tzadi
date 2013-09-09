<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends My_Controller {

  var $customerID; 
  var $customerName;
  var $customerEmail;
  var $customerActive;
  var $customerDateBirthday;

  public function __construct() { 
    parent::__construct();
    $this->lang->load('customer', $this->session->userdata('language'));
  }

  public function index() 
  {
    $data->dynJS = 'customer/customer';
    $data->view = 'customer/index';
    $data->page_title = lang('ctm_listTitle');
    $this->page->load($data);
  }

  public function getAll(){
    $this->load->model("customer_model");
    $customers = $this->customer_model->getAll();
    echo json_encode($customers);
  }

  public function add()
  {
    $this->load->model("customer_model");
    $name = $this->input->post("name");
    if(!$name) $name = lang('ctm_newCustomer');
    $newCustomer = $this->customer_model->add($name);
    echo json_encode($newCustomer[0]);
  }

  public function changeImg()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("customer_model");
    $res = $this->customer_model->changePhoto($_id);
    echo json_encode($res);
  }

  public function attach()
  {
    $_id = (int) $this->input->post('_id');
    $this->load->model("customer_model");
    $res = $this->customer_model->attach($_id);
    echo json_encode($res);
  }

  public function dropAttachment()
  {
    $data = $this->input->post();
    $this->load->model("customer_model");
    $res = $this->customer_model->dropAttachment($data);
    echo json_encode($res);
  }

  public function set()
  {
    $data = $this->input->post();
    $this->load->model("customer_model");
    $res = $this->customer_model->set($data);
    echo json_encode($res);
  }

  public function drop() // 1 - permission binary level number
  {
    $_id = (int) $this->input->post("_id");
    $this->load->model("customer_model");
    $res = $this->customer_model->drop($_id);
    echo json_encode($res);
  }

  public function view( $_id ){
    $this->load->model("customer_model");
    $data->customer = $this->customer_model->getBy( $_id );
    $data->customer["timeline"] = $this->customer_model->getTimelineByID( $_id );

    $data->dynJS = 'customer/view';
    $data->view = 'customer/view';
    $data->page_title = lang('ctm_viewTitle');
    $this->page->load($data);
  }

}
/* End of file customer.php */
/* Location: ./application/controllers/customer.php */