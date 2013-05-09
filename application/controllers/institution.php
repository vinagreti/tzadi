<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institution extends My_Controller {

  var $institutionID; // institution unique ID
  var $campus; // campus unique ID
  var $institutionName; // institution name

  public function __construct() { 
    parent::__construct();
    $this->lang->load('institution', $this->session->userdata('app_language'));
  }

  public function index() // 1 - permission binary level number
  {
    $this->permission->check(1);
    $data->class = 'institution';
    $data->view = 'institution/index';
    $data->page_title = lang('inst_listTitle');
    $this->page->load($data);
  }

  public function getAll() // 2 - permission binary level number
  {
    $this->permission->check(2);
    $this->load->model('institution_model');
    $data->institutions = $this->institution_model->getAll();
    echo json_encode($data);
  }

  public function getByID() // 4 - permission binary level number
  {
    $this->permission->check(4);
    $institutionID = $this->input->get("institutionID");
    $this->load->model('institution_model');
    $institution = $data->institutions = $this->institution_model->getByID($institutionID);
    echo json_encode($institution[0]);
  }

  public function insert() // 8 - permission binary level number
  {
    $this->permission->check(8);
    $data = $this->input->post();
    $this->load->model('institution_model');
    $newinstitution = $this->institution_model->insert($data);
    echo json_encode($newinstitution[0]);
  }

  public function update() // 16 - permission binary level number
  {
    $this->permission->check(16);
    $data = $this->input->post();
    $this->load->model('institution_model');
    $institution = $this->institution_model->update($data);
    echo json_encode($institution[0]);
  }

  public function campusUpdate() // 16 - permission binary level number
  {
    $this->permission->check(16);
    $data = $this->input->post();
    $this->load->model('institution_model');
    $campus = $this->institution_model->campusUpdate($data);
    echo json_encode($campus[0]);
  }

  public function drop() // 32 - permission binary level number
  {
    $this->permission->check(32);
    $data = $this->input->post();
    $this->load->model('institution_model');
    $response = $this->institution_model->drop($data);
    echo json_encode($response);
  }


  public function dropCampus() // 32 - permission binary level number
  {
    $this->permission->check(32);
    $campusID = $this->input->post("campusID");
    $this->load->model('institution_model');
    $response = $this->institution_model->dropCampus($campusID);
    echo json_encode($response);
  }

  public function attach() // 64 - permission binary level number
  {
    $this->permission->check(64);
    $id = $this->input->post("id");
    $class = $this->router->class;
    $this->load->library("attach");
    $return = $this->attach->insert($class, $id);
    echo json_encode($return);
  }

  public function dropAttach() // 64 - permission binary level number
  {
    $this->permission->check(64);
    $attachID = $this->input->post("attachID");
    $this->load->library("attach");
    $return = $this->attach->dropAttach($attachID);
    echo json_encode($return);
  }

  public function getAttachs( ) // 128 - permission binary level number
  {
    $this->permission->check(128);
    $class = $this->router->class;
    $data = $this->input->post();
    $institutionID = $data['institutionID'];
    $this->load->library("attach");
    $attachs = $this->attach->getByClassID($class, $institutionID);
    echo json_encode($attachs);
  }

  public function createCampus(){
    $this->permission->check(128);

    $institutionID = $this->input->post("institutionID");
    $this->load->model('institution_model');
    $campus = $this->institution_model->createCampus($institutionID);
    echo json_encode( $campus );
  }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */