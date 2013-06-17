<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mongo_Model extends CI_Model {

  public function __construct()
  {
    $this->load->library("mongo_db");
  }

  function newID()
  {
    $last = $this->mongo_db->get('counter');
    $lastID = $last[0]['id'];
    $newID = $lastID+1;
    $this->mongo_db->update ('counter', array ('id' => $newID));
    return $newID;
  }
}
