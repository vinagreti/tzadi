<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attach {
  public function __construct() {
    $this->CI =& get_instance();
  }

  public function insert( $class, $id, $inputName ) {
    $this->CI->load->library("tzd_file");
    $fileHash = $this->CI->tzd_file->upload($inputName);

    if($fileHash){
      $data->attachObjClass = $class;
      $data->attachObjID = $id;
      $data->attachName = $_FILES[$inputName]["name"];
      $data->attachFile = $fileHash;

      $this->CI->load->model("attach_model");
      $data->attachID = $this->CI->attach_model->insert($data);
      
      $return = $data;
    } else {
      $return = "problem while uploading the file";
    }

    return $return;
  }

  public function getByClassID( $class, $id ) {
    $this->CI->load->model("attach_model");
    $attachs = $this->CI->attach_model->getByClassID($class, $id);
    return $attachs;
  }

  public function drop( $attachID ) {
    $this->CI->load->model("attach_model");
    $attach = $this->CI->attach_model->drop($attachID);
    $this->CI->load->library("tzd_file");
    $fileHash = $this->CI->tzd_file->drop($attach->attachFile);
  }
}
/* End of file Permission.php */