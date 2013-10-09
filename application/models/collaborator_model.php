<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collaborator_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll( $company = "" ) {

    $res = $this->mongo_db
      ->where('org', $this->session->userdata("org"))
      ->get('user');

    if($res) return $res;
    else return false;

  }
}
