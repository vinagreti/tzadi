<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll()
  {
    return $this->mongo_db
      ->where('org_id', $this->session->userdata("myOrgID"))
      ->get('customer');
  }

  function getByID( $_id )
  {
    $customer = $this->mongo_db
      ->where('org_id', $this->session->userdata("myOrgID"))
      ->where('_id', (int) $_id )
      ->get('customer');

    if( isset( $customer[0]["img"] ) )
      $customer[0]["img"] = base_url()."file/open/".$customer[0]["img"];

    else
      $customer[0]["img"] = base_url()."assets/img/no_photo_160x120.png";


    return $customer[0];
  }

  function getTimelineByID( $customer_id )
  {

    $customer = $this->mongo_db
      ->where('_id', (int) $customer_id )
      ->where('org_id', (int) $this->session->userdata("myOrgID") )
      ->get('customer');

    if( ! $customer ){

      return array("error" => lang("ctm_customerNotFound") );

    } else {

      return $this->mongo_db
        ->order_by( array("date" => "desc") )
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
        ,"org_id" => $this->session->userdata("myOrgID")
        ,"creation" => now()
        ,"creator_id" => $this->session->userdata("_id")
        ,"status" => "active"
        ,"attachment" => array()
      )
    );

    $action->kind = "customer/add";

    $action->customer_id = $newID;

    $this->customer_model->addTimeline( $action );

    return $this->mongo_db
      ->where('_id', $newID)
      ->get('customer');
  }

  function set($data)
  {

    if( isset( $data['email'] ) ) {

      $data['email'] = strtolower($data['email']);

      $customer = $this->mongo_db
        ->where('email', $data['email'])
        ->get('customer');

    if( $customer[0] )
      return array("error" => lang("ctm_emailInUseBy") . " " . $customer[0]["name"]);
    
    } else {

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

    $email = strtolower( $email );

    $customer = $this->mongo_db
      ->where(array('email' => $email, "owner" => $this->session->userdata("org")))
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
          ,"org_id" => $this->session->userdata("myOrgID")
          ,"creation" => now()
          ,"creator" => "system"
          ,"status" => "active"
          ,"attachment" => array()
        )
      );

      $action->kind = "customer/getOrCreate";

      $action->customer_id = $newID;

      $this->customer_model->addTimeline( $action );

      return $newID;

    }

  }

  public function addTimeline( $action )
  {

    $this->load->model("mongo_model");

    $action->_id = $this->mongo_model->newID();

    if( ! isset($action->date) ){

      $this->load->helper('date');

      $action->date = now();

    }

    $this->mongo_db->insert('timeline', (array) $action);

  }

  public function getCustomerIdByMailId( $mail_id )
  {

    $customer = $this->mongo_db
      ->order_by( array("_id" => "asc") )
      ->where('mail_id', (int) $mail_id )
      ->get('timeline');

    return $customer[0]["customer_id"];

  }


  public function addEvent( $data ) {

    $this->load->model("mongo_model");

    $this->load->model("customer_model");

    $event->kind = $data["kind"];

    $event->title = $data["title"];

    $event->detail = $data["detail"];

    $event->date = strtotime( str_replace("/", "-", $data["date"]) );

    $event->customer_id = $this->customer_model->getOrCreate( $data["mail"] );

    $this->customer_model->addTimeline( $event );

    return array("success" => "evento adicionado");

  }

}
