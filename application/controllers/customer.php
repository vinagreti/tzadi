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

    $this->MYensureOwnProfile();
        
  }

  public function index() 
  {
    $data->dynJS = 'customer/manage';
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
    $data->customer = $this->customer_model->getByID( $_id );
    $data->dynJS = array('customer/view', 'tzadi/tzadi-mail', 'bootstrap/bootstrap-datetimepicker.min');
    $data->view = 'customer/view';
    $data->page_title = $data->customer["name"] ;
    $this->page->load($data);
  }

  public function getTimelineByID( ){

    $data = $this->input->post();

    if( $data["customer_id"] ){

      $this->load->model("customer_model");

      echo json_encode( $this->customer_model->getTimelineByID( $data["customer_id"] ) );

    } else {

      echo json_encode( array("error"=> lang("ctm_idNotSet") ) );

    }
  }

  public function addEvent()
  {

    $data = $this->input->post();

    if( ! $data ){

      $this->load->model("collaborator_model");

      $data->collaborators = $this->collaborator_model->getAll();

      echo json_encode($this->load->view('customer/addEventForm', $data, TRUE));

    } else {

      if( isset($data["_id"]) && isset($data["title"]) && isset($data["detail"]) && isset($data["resp_id"]) && isset($data["date"]) ) {

        $this->load->model("customer_model");

        echo json_encode( $this->customer_model->addEvent($data) );

      } else {

        echo json_encode( array("error" => "informe todos os dados para criar o evento") );

      }

    }

  }

}
/* End of file customer.php */
/* Location: ./application/controllers/customer.php */