<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getBySubdomain($subdomain)
  {

    $subdomain = strtolower($subdomain);

    $res = $this->mongo_db
      ->where('subdomain', $subdomain)
      ->get('company');

    if($res) return $res[0];
    else return false;
  }

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
        ,"name" => strtolower($data["email"])
        , "email" => strtolower($data["email"])
        , "password" => md5($data["password"])
        , "permission" => array("supplier" => "1023", "product" => "1023")
      )
    );

    $this->mongo_db->insert('company',array("name" =>  $data["subdomain"], "_id" => $newCompanyID, "plan" => $data["plan"], "subdomain" => strtolower($data["subdomain"]), "owner" => $newUserID));

   
    return true;

  }

}