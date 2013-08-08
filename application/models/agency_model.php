<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getBySubdomain($subdomain)
  {

    $subdomain = strtolower($subdomain);

    $res = $this->mongo_db
      ->where('subdomain', $subdomain)
      ->get('agency');

    if($res) return $res[0];

    else return false;

  }

  function add($data)
  {
    $this->load->model("mongo_model");
    
    $agencyID = $this->mongo_model->newID();

    $this->mongo_db->insert('agency',
      array(
        "name" =>  $data["name"]
        , "_id" => $agencyID
        , "subdomain" => strtolower($data["subdomain"])
        , "owner" => $this->session->userdata("_id")
      )
    );
   
    return $agencyID;

  }

}