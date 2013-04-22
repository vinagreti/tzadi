<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_Model extends CI_Model {

  function getAllByClass( $attachObjClass, $attachObjID ) {
    $this->db->from('attach')
      ->where('attachObjClass', $attachObjClass)
      ->where('attachObjID', $attachObjID);
    $attach = $this->db->get()->result();
    return $attach;
  }

  function insert($data)
  {
    $this->db->insert('attach', $data);
    $id = $this->db->insert_id();

    $data->hash = md5($id);
    $this->db->where('attachID', $id);
    $this->db->update('attach', $data);
    
    return $id;
  }

  function getName($hash) {
    $this->db->from('attach')
      ->where('hash', $hash)
      ->select("attachName");
    $attach = $this->db->get()->result();
    return $attach[0];
  }

  function drop($attachID) {
    $this->db->delete('attach', array('attachID' => $attachID)); 
  }
}
