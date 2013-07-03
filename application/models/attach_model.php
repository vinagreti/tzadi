<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attach_Model extends CI_Model {

  function insert($data)
  {
    $this->db->insert('attach', $data);
    return $this->db->insert_id();
  }

  function getName($attachHash) {
    $this->db->from('attach')
      ->where('attachHash', $attachHash)
      ->select("attachName");
    $attach = $this->db->get()->result();
    return $attach[0];
  }

  function getByClassID($class, $id) {
    $this->db->from('attach')
      ->where('attachObjClass', $class)
      ->where('attachObjID', $id);
    $attach = $this->db->get()->result();
    return $attach;
  }

  function drop($attachID) {
    $attach = $this->db->from("attach")->where("attachID", $attachID)->get()->result();
    $this->db->delete('attach', array('attachID' => $attachID)); 
    return $attach[0];
  }
}
