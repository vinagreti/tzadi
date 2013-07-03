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
}