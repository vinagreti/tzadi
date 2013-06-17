<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll()
  {
    return $this->mongo_db
      ->where('company', $this->session->userdata("companyID"))
      ->order_by(array('name' => 'asc'))
      ->get('product');
  }

  // creates a new product obj
  function add($data)
  {
    $this->load->model("mongo_model");
    $newID = $this->mongo_model->newID();

    $this->load->helper('date');
    $newProduct =  $this->mongo_db->insert(
      'product',array(
        "_id" => $newID
        ,"name" => $data->name
        ,"kind" => $data->kind
        ,"company" => $this->session->userdata("companyID")
        ,"creation" => now()
        ,"creator" => $this->session->userdata("userID")
        ,"supplier" => "0"
        ,"supplier_campus" => "0"
        ,"purchase" => "0"
        ,"status" => "active"
      )
    );
    return $this->mongo_db
      ->where('_id', $newID)
      ->get('product');
  }

  function drop($_id){

    $product = $this->mongo_db
      ->where('_id', $_id)
      ->get('product');

    // drop the obj in the database
    $deleted = $this->mongo_db->where('_id', $_id)->delete('product');
    if($deleted){
      if(isset($product[0]["img"])) {
        $this->load->model("file_model");
        $this->file_model->drop($product[0]["img"]);
      }
    }

    return $deleted;
  }

  function changePhoto($_id)
  {
    $this->load->model("file_model");
    $newFile = $this->file_model->save($_id);

    $product = $this->mongo_db
      ->where('_id', $_id)
      ->get('product');

    if(isset($product[0]["img"])) {
      $this->file_model->drop($product[0]["img"]);
    }

    $this->mongo_db
      ->where('_id', $_id)
      ->set("img", $newFile)
      ->update("product");

    return $newFile;
  }

  function set($data)
  {
    $_id = (int) $data['_id'];
    unset($data['_id']);
    $this->mongo_db
      ->where('_id', $_id)
      ->set($data)
      ->update('product');

    $return = $this->mongo_db
      ->where('_id', $_id)
      ->get('product');

    return $return[0];
  }
}
