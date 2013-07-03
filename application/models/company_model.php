<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getByNick($nick)
  {
    $res = $this->mongo_db
      ->where('nick', $nick)
      ->get('company');

    if($res) return $res[0];
    else return false;
  }

  // creates a new product obj
  function add($data)
  {
    $this->load->model("mongo_model");
    $newUserID = $this->mongo_model->newID();
    $newCompanyID = $this->mongo_model->newID();

    $this->load->helper('date');

    $this->mongo_db->insert('user',
      array(
        "_id" => $newUserID
        , "company" => $newCompanyID
        ,"name" => $data["email"]
        , "email" => $data["email"]
        , "password" => md5($data["password"])
        , "permission" => array("supplier" => "1023", "product" => "1023")
      )
    );

    $this->mongo_db->insert('company',array("name" =>  $data["subdomain"], "_id" => $newCompanyID, "plan" => $data["plan"], "nick" => $data["subdomain"], "owner" => $newUserID));

    return true;
  }
}