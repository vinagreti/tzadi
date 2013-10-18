<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_Model extends CI_Model {
  
  public function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll() {
    return $this->mongo_db
      ->where('org_id', $this->session->userdata("org_id"))
      ->get('supplier');
  }

  function getAllActive() {
    return $this->mongo_db
      ->where(array(
          'org_id' => $this->session->userdata("org_id")
          ,'status' => "active"
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
        ,"org_id" => $this->session->userdata("org_id")
        ,"org_branch" => $this->session->userdata("org_branch")
        ,"creation" => now()
        ,"creator_id" => $this->session->userdata("_id")
        ,"campi" => array(array("_id" => $campus_id,"name" => lang('splr_Headquarter')))
        ,"status" => "active"
        ,"headquarter" => $campus_id
        ,"attachment" => array()
      )
    );
    return $this->mongo_db
      ->where('_id', $supplier_id)
      ->get('supplier');
  }

  function makeClone($_id){

    $res = $this->mongo_db
      ->where('_id', (int) $_id)
      ->get('supplier');

    $newSupplier = $res[0];
    $this->load->model("mongo_model");
    $newSupplier["_id"] = $this->mongo_model->newID();
    $newSupplier["name"] = "(clone) - ".$newSupplier["name"];

    $this->mongo_db->insert('supplier', $newSupplier);

    return $newSupplier;

  }

  function drop($_id){

    $withinProduct = $this->mongo_db
      ->where(array(
          'supplier' => strval($_id)
        ))
      ->get('product');
    
    if( sizeof($withinProduct) > 0 ) {
      $error = lang("splr_cantDropUsedByProducts");
      foreach($withinProduct as $product) $error .= '<br>- <a href="'.base_url()."product/view/".$product["_id"].'" target="_blank">'.$product["name"].'</a>';

      return $error;
    }
    else{
      $supplier = $this->mongo_db
        ->where(array(
            '_id' =>$_id
          ))
        ->get('supplier');

      $this->load->model("file_model");
      foreach($supplier[0]["attachment"] as $attachment) {
        $this->file_model->drop($attachment["_id"]);
      }
      if(isset($supplier[0]["img"])) $this->file_model->drop($supplier[0]["img"]);
      return $this->mongo_db->where('_id', $_id)->delete('supplier');
    }

  }

  // creates a new product obj
  function addCampus($data)
  {
    $this->load->model("mongo_model");
    $campus->_id = $this->mongo_model->newID();
    $campus->name = $data->name;

    $this->mongo_db
      ->where('_id', $data->supplier)
      ->push("campi", $campus)
      ->update("supplier");

    return $campus;
  }

  function update($data)
  {
    $supplier_id = (int) $data['supplier_id'];
    unset($data['supplier_id']);
    $campus_id = (int) $data['campus_id'];
    unset($data['campus_id']);

    $supplier = $this->mongo_db
      ->where('_id', $supplier_id)
      ->get('supplier');
    $supplier = $supplier[0];
    unset($supplier["_id"]);

    foreach($supplier["campi"] as $index => $campus) {
      if($campus["_id"] == $campus_id) {
        if(isset($data["newData"]["campusName"])) $supplier["campi"][$index]["name"] = $data["newData"]["campusName"];
        if(isset($data["newData"]["address"])) $supplier["campi"][$index]["address"] = $data["newData"]["address"];
        if(isset($data["newData"]["cep"])) $supplier["campi"][$index]["cep"] = $data["newData"]["cep"];
        if(isset($data["newData"]["city"])) $supplier["campi"][$index]["city"] = $data["newData"]["city"];
        if(isset($data["newData"]["state"])) $supplier["campi"][$index]["state"] = $data["newData"]["state"];
        if(isset($data["newData"]["country"])) $supplier["campi"][$index]["country"] = $data["newData"]["country"];
        if(isset($data["newData"]["email"])) $supplier["campi"][$index]["email"] = $data["newData"]["email"];
        if(isset($data["newData"]["phone"])) $supplier["campi"][$index]["phone"] = $data["newData"]["phone"];
        if(isset($data["newData"]["mobile"])) $supplier["campi"][$index]["mobile"] = $data["newData"]["mobile"];
        if(isset($data["newData"]["details"])) $supplier["campi"][$index]["details"] = $data["newData"]["details"];
      }
    }

    if(isset($data["newData"]["name"])) $supplier["name"] = $data["newData"]["name"];

    $this->mongo_db
      ->where('_id', (int) $supplier_id)
      ->set($supplier)
      ->update("supplier");

    return $supplier;
  }

  function activate( $data ) {
    if($data["status"] == "inactive") {
      $withinProduct = $this->mongo_db
        ->where(array(
            'supplier' => $data['_id']
          ))
        ->get('product');

      if( sizeof($withinProduct) > 0 ) {
        $error = lang("splr_cantInactivateUsedByProducts");
        foreach($withinProduct as $product) $error .= '<br>- <a href="'.base_url()."product/view/".$product["_id"].'" target="_blank">'.$product["name"].'</a>';
      }
    }

    if(isset($error)) return $error;
    else {
      return $this->mongo_db
        ->where('_id', (int) $data['_id'])
        ->set("status", $data["status"])
        ->update("supplier");
    }
  }

  function changeImg($_id)
  {
    $this->load->model("file_model");
    $newFile = $this->file_model->save($_id);

    $supplier = $this->mongo_db
      ->where('_id', $_id)
      ->get('supplier');

    if(isset($supplier[0]["img"])) {
      $this->file_model->drop($supplier[0]["img"]);
    }

    $this->mongo_db
      ->where('_id', $_id)
      ->set("img", $newFile)
      ->update("supplier");

    $res->imgID = $newFile;
    return $res;
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
      ->update("supplier");

    $res->newFile = $newFile;
    return $res;
  }

  function dropAttachment( $data ) {
    $supplier = $this->mongo_db
      ->where('_id', (int) $data["supplier_id"])
      ->get('supplier');

    foreach($supplier[0]["attachment"] as $index => $attachment) {
      if($attachment["_id"] == (int) $data["attachment_id"])
        unset($supplier[0]["attachment"][$index]);
    }

    $this->mongo_db
      ->where('_id', (int) $data["supplier_id"])
      ->set("attachment", $supplier[0]["attachment"])
      ->update("supplier");

    $this->load->model("file_model");
    $this->file_model->drop((int) $data["attachment_id"]);

    return true;
  }

  function dropCampus($data){

    $supplier = $this->mongo_db
      ->where('_id', (int) $data["supplier_id"])
      ->get('supplier');

    $withinProduct = $this->mongo_db
      ->where(array(
          'supplier_campus' => strval($data["campus_id"])
        ))
      ->get('product');
    
    if( sizeof($withinProduct) > 0 ) {
      $error = lang("splr_cantDropCampusUsedByProducts");
      foreach($withinProduct as $product) $error .= '<br>- <a href="'.base_url()."product/view/".$product["_id"].'" target="_blank">'.$product["name"].'</a>';

      return $error;
    }
    elseif( strval($supplier[0]["headquarter"]) == strval($data["campus_id"]) ) {
      $error = lang("splr_cantDropCampusHeadquarter");
      return $error;
    }
    else {


      foreach($supplier[0]["campi"] as $index => $campus) {
        if($campus["_id"] == (int) $data["campus_id"])
          unset($supplier[0]["campi"][$index]);
      }

      return $this->mongo_db
        ->where('_id', (int) $data["supplier_id"])
        ->set("campi", $supplier[0]["campi"])
        ->update("supplier");
    }
  }
}