<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function save($_id)
  {
    $this->load->model("mongo_model");
    $newImgId = $this->mongo_model->newID();
    $_FILES["file"]["_id"] = $newImgId;
    $_FILES["file"]["object_id"] = $_id;
    $config['image_library'] = 'gd2';
    $config['source_image'] = $_FILES["file"]["tmp_name"];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']   = 320;
    $config['height'] = 240;

    $this->load->library('image_lib', $config); 

    if ( $this->image_lib->resize())
    {
      $_FILES["file"]["binary"] = new MongoBinData(file_get_contents($_FILES["file"]["tmp_name"] . "_thumb"), 2);
    } else {
      $_FILES["file"]["binary"] = new MongoBinData(file_get_contents($_FILES["file"]["tmp_name"]), 2);
    }

    unset($_FILES["file"]["tmp_name"]);
    $this->mongo_db->insert('file',$_FILES["file"]);
    return $newImgId;
  }

  function get($_id)
  {
    return $this->mongo_db
      ->where('_id', $_id)
      ->get('file');
  }

  function drop($_id){
    $deleted = $this->mongo_db
      ->where('_id', $_id)
      ->delete('file');
  }
}
