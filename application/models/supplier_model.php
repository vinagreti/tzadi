<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_Model extends CI_Model {
  
  public function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAllActive() {
    return $this->mongo_db
      ->where(array(
          'company' => $this->session->userdata("companyID")
          ,'status' => "1"
        ))
      ->get('supplier');
  }

  // creates a new product obj
  function add($data)
  {
    $this->load->helper('date');
    $this->load->model("mongo_model");
    $supplier_id = $this->mongo_model->newID();
    $campus_id = $this->mongo_model->newID();

    $newSupplier =  $this->mongo_db->insert(
      'supplier',array(
        "_id" => $supplier_id
        ,"name" => $data->name
        ,"kind" => "other"
        ,"company" => $this->session->userdata("companyID")
        ,"creation" => now()
        ,"creator" => $this->session->userdata("userID")
        ,"campi" => array(array("_id" => $campus_id,"name" => lang('splr_Headquarter')))
        ,"status" => "1"
        ,"headquarter" => $campus_id
      )
    );
    return $this->mongo_db
      ->where('_id', $supplier_id)
      ->get('supplier');
  }

  // creates a new product obj
  function addCampi($data)
  {
    $this->load->helper('date');
    $this->load->model("mongo_model");
    $campus_id = $this->mongo_model->newID();

    $newSupplier =  $this->mongo_db
      ->where('_id', $data->supplier)
      ->push("campi", array("_id" => $campus_id, "name" => $data->name))
      ->update("supplier");

    return $campus_id;
  }
}