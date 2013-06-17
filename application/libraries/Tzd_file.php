<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tzd_file {
  public function __construct() {
    $this->CI =& get_instance();
  }

  public function upload(){
    $this->CI->load->helper('date');
    $this->CI->load->model("mongo_model");
    $_FILES["file"]["_id"] = $this->CI->mongo_model->newID();
    unset($_FILES["file"]["tmp_name"]);

    return $this->CI->mongo_db->insert('file',array($_FILES));
  }

  public function download($attachHash){
    $this->CI->load->model("attach_model");
    $attach = $this->CI->attach_model->getName($attachHash);
    $fileExtension = end(explode(".", $attach->attachName));
    $data = file_get_contents('../uploads/files/'.$attachHash.".".$fileExtension); // Read the file's contents
    $this->CI->load->helper('download');
    force_download($attach->attachName, $data);
  }

  public function open($file){
    $fileData = file_get_contents('../uploads/'.$file);
    echo $fileData;
  }

  public function drop( $fileHash ) {
    $this->CI->load->model("file_model");
    $file = $this->CI->file_model->getFileNameByHash($fileHash);
    unlink('../uploads/'.$file);
    $this->CI->file_model->drop($fileHash);
  }
}