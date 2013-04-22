<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campus extends CI_Controller {

  var $campusID; // campus unique ID
  var $institutionID; // institution unique ID
  var $campusName; // campus name
  var $campusAddress; // campus address
  var $campusPhone; // campus phone number
  var $campusMobile; // campus mobile number 
  var $campusCep; // postal code
  var $campusCity; // campus city
  var $campusState; // campus city state
  var $campusCountry; // campus country
  var $campusDetails; // campus details
  var $campusContactName; // campus contact Name
  var $campusContactEmail; // campus contact email
  var $campusContactPhone; // campus contact phone
  var $campusContactMobile; // campus contact mobile
  var $campusStatus; // campus status active inactiue

  public function __construct() { 
    parent::__construct();
    $this->lang->load('campus', $this->session->userdata('app_language'));
  }

  public function index() // 1 - permission binary level number
  {
    $this->permission->check(1);
    $data->class = 'campus';
    $data->view = 'campus/index';
    $data->title = lang('inst_listTitle');
    $this->page->load($data);
  }

  public function getAll() // 2 - permission binary level number
  {
    $this->permission->check(2);
    $this->load->model('campus_model');
    $data->campuss = $this->campus_model->getAll();
    echo json_encode($data);
  }

  public function getByID() // 4 - permission binary level number
  {
    $this->permission->check(4);
    $campusID = $this->input->get("campusID");
    $this->load->model('campus_model');
    $campus = $data->campuss = $this->campus_model->getByID($campusID);
    echo json_encode($campus[0]);
  }

  public function insert() // 8 - permission binary level number
  {
    $this->permission->check(8);
    $data = $this->input->post();
    $this->load->model('campus_model');
    $newcampus = $this->campus_model->insert($data);
    echo json_encode($newcampus[0]);
  }

  public function update() // 16 - permission binary level number
  {
    $this->permission->check(16);
    $data = $this->input->post();
    $this->load->model('campus_model');
    $campus = $this->campus_model->update($data);
    echo json_encode($campus[0]);
  }

  public function drop() // 32 - permission binary level number
  {
    $this->permission->check(32);
    $data = $this->input->post();
    $this->load->model('campus_model');
    $response = $this->campus_model->drop($data);
    echo json_encode($response);
  }

  public function attach() // 64 - permission binary level number
  {
    $this->permission->check(64);
    $id = $this->input->post("id");
    $class = $this->router->class;
    $this->load->library("attach");
    $return = $this->attach->save($class, $id);
    echo json_encode($return);
  }

  public function getAttachs( ) // 128 - permission binary level number
  {
    $this->permission->check(128);
    $class = $this->router->class;
    $data = $this->input->post();
    $id = $data['id'];
    $this->load->library("attach");
    $attachs = $this->attach->getByClassID($class, $id);
    echo json_encode($attachs);
  }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */