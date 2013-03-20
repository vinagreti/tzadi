<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model extends CI_Model {

  function __construct() 
  { // Call the Model constructor

      parent::__construct();

  }
  
  function save($data) {
    $this->db->insert('tzadiContact', $data);
    $query = $this->db->insert_id();
    return $query;
  }
}
