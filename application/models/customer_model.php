<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll()
  {
    return $this->mongo_db
      ->where('owner', $this->session->userdata("_id"))
      ->get('customer');
  }

  function getBy( $_id )
  {
    $customer = $this->mongo_db
      ->where('owner', $this->session->userdata("_id"))
      ->where('_id', (int) $_id )
      ->get('customer');

    return $customer[0];
  }

  function getTimelineByID( $customer_id )
  {

    $customer = $this->mongo_db
      ->where('_id', (int) $customer_id )
      ->get('customer');

    if( ! $customer ){

      return array("error" => lang("ctm_customerNotFound") );

    } else if ( $customer[0]['owner'] != $this->session->userdata("_id") ) {

      return array("error" => lang("ctm_thisCustomerISNotYours") );

    } else {

      return $this->mongo_db
        ->where('customer_id', (int) $customer_id )
        ->get('timeline');

    }

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
        ,"owner" => $this->session->userdata("_id")
        ,"creation" => now()
        ,"creator" => $this->session->userdata("_id")
        ,"status" => "active"
        ,"attachment" => array()
      )
    );

    $action->kind = "customer/add";

    $this->customer_model->addTimeline( $newID, $action );

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

    $this->mongo_db->where('customer_id', (int) $_id)->delete('timeline');

    $this->load->model("file_model");
      foreach($customer[0]["attachment"] as $attachment) {
        $this->file_model->drop($attachment["_id"]);
      }
      if(isset($supplier[0]["img"])) $this->file_model->drop($supplier[0]["img"]);
    return $this->mongo_db->where('_id', $_id)->delete('customer');
  }


  public function getOrCreate( $email )
  {

    $customer = $this->mongo_db
      ->where('email', $email)
      ->get('customer');

    if( $customer ) {

      return $customer[0]["_id"];

    } else {

      $this->load->model("mongo_model");

      $newID = $this->mongo_model->newID();

      $this->load->helper('date');

      $this->mongo_db->insert(
        'customer',array(
          "_id" => $newID
          ,"name" => $email
          ,"email" => $email
          ,"owner" => $this->session->userdata("profileID")
          ,"creation" => now()
          ,"creator" => "system"
          ,"status" => "active"
          ,"attachment" => array()
        )
      );

        $action->kind = "customer/getOrCreate";

        $this->customer_model->addTimeline( $newID, $action );

      return $newID;

    }

  }

  public function addTimeline( $customer_id, $action )
  {

    $this->load->model("mongo_model");

    $this->load->helper('date');

    $action_id = $this->mongo_model->newID();

    $this->mongo_db
    ->insert('timeline', array( 
      "_id" => $action_id
      , "date" => now()
      , "customer_id" => $customer_id
      , "action" => $action
      )
    );

  }
}
