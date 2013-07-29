<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll()
  {
    return $this->mongo_db
      ->where('agency', $this->session->userdata("agencyID"))
      ->get('customer');
  }

  function add($name)
  {
    $this->load->model("mongo_model");
    $newID = $this->mongo_model->newID();

    $this->load->helper('date');
    $newProduct =  $this->mongo_db->insert(
      'customer',array(
        "_id" => $newID
        ,"name" => $name
        ,"agency" => $this->session->userdata("agencyID")
        ,"creation" => now()
        ,"creator" => $this->session->userdata("userID")
        ,"status" => "active"
        ,"attachment" => array()
      )
    );
    return $this->mongo_db
      ->where('_id', $newID)
      ->get('customer');
  }

  function set($data)
  {
    $_id = (int) $data['_id'];
    unset($data['_id']);
    $this->mongo_db
      ->where('_id', $_id)
      ->set($data)
      ->update('customer');

    $return = $this->mongo_db
      ->where('_id', $_id)
      ->get('customer');

    return $return[0];
  }

  function attach($_id)
  {
    $this->load->model("file_model");
    $newFile->_id = $this->file_model->save($_id);
    $objAttachment = $this->file_model->get($newFile->_id);
    $newFile->name = $objAttachment[0]["name"];

    $this->mongo_db
      ->where('_id', $_id)
      ->push("attachment", $newFile)
      ->update("customer");

    $res->newFile = $newFile;
    return $res;
  }

  function dropAttachment( $data ) {
    $customer = $this->mongo_db
      ->where('_id', (int) $data["customer_id"])
      ->get('customer');

    foreach($customer[0]["attachment"] as $index => $attachment) {
      if($attachment["_id"] == (int) $data["attachment_id"])
        unset($customer[0]["attachment"][$index]);
    }

    $this->mongo_db
      ->where('_id', (int) $data["customer_id"])
      ->set("attachment", $customer[0]["attachment"])
      ->update("customer");

    $this->load->model("file_model");
    $this->file_model->drop((int) $data["attachment_id"]);

    return true;
  }

  function changePhoto($_id)
  {
    $this->load->model("file_model");
    $newFile = $this->file_model->save($_id);

    $customer = $this->mongo_db
      ->where('_id', $_id)
      ->get('customer');

    if(isset($customer[0]["img"])) {
      $this->file_model->drop($customer[0]["img"]);
    }

    $this->mongo_db
      ->where('_id', $_id)
      ->set("img", $newFile)
      ->update("customer");

    return $newFile;
  }

  function drop($_id){
    
    $customer = $this->mongo_db
      ->where('_id', $_id)
      ->get('customer');

    $this->load->model("file_model");
      foreach($customer[0]["attachment"] as $attachment) {
        $this->file_model->drop($attachment["_id"]);
      }
      if(isset($supplier[0]["img"])) $this->file_model->drop($supplier[0]["img"]);
    return $this->mongo_db->where('_id', $_id)->delete('customer');
  }
}
