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

    $_FILES["file"]["binary"] = new MongoBinData(file_get_contents($_FILES["file"]["tmp_name"]), 2);

    unset($_FILES["file"]["tmp_name"]);

    $this->mongo_db->insert('file',$_FILES["file"]);

    return $newImgId;
  }

  function get($_id)
  {
    $file = $this->mongo_db
      ->where('_id', $_id)
      ->get('file');

    return $file[0];
  }

  function drop($_id){
    $deleted = $this->mongo_db
      ->where('_id', $_id)
      ->delete('file');
  }

  public function saveTempFile( $url ){

    $this->load->library("tzd_string");

    $this->load->helper('file');

    $data = file_get_contents( $url );

    $size = getimagesize( $url );

    $extension = image_type_to_extension($size[2]);

    $tempFile = './assets/temp_files/'.end(explode("/", $url)).$extension;

    if ( ! write_file( $tempFile, $data ) )
      echo 'Unable to write the file';

    else
      return $tempFile;

  }

  public function dropTempFile( $path ){

    $this->load->helper('file');

    unlink( $path );

  }

}
