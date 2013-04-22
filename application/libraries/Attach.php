<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attach {
  public function __construct() {
    $this->CI =& get_instance();
  }

  public function insert( $class, $id ) {
    $data->attachObjClass = $class;
    $data->attachObjID = $id;
    $data->attachName = $_FILES["userfile"]["name"];
    $data->attachType = $_FILES["userfile"]["type"];

    $this->CI->load->model("attach_model");
    $id = $this->CI->attach_model->insert($data);
    $attachID = md5($id);

    if( $attachID ){
      $agencyID = $this->CI->session->userdata('agencyID');

      $config['upload_path'] = '../uploads/';
      $config['allowed_types'] = 'jpg|jpeg|doc|docx|pdf|xls|xlsx|pdf|ppt|pptx|ai|cdr|png|htm|html|txt|xml|xps|bmp|gif|tif|tiff|msg|psd|swf|mp3|zip|rar|sql';
      $config['max_size'] = '2048';
      $config['file_name'] = $attachID;

      $this->CI->load->library('upload', $config);

      if ( ! $this->CI->upload->do_upload())
      {
        $this->CI->attach_model->drop($id);
        $return->error = $this->CI->upload->display_errors();
      } else {
        $return->attachID = $id;
        $return->attachHash = md5($id);
      }

      return $return;
      
    } else {
      $return->error = "problemas ao inserir o anexo no banco";
      return $return;
    }
  }

  public function getByClassID( $class, $id ) {
    $this->CI->load->model("attach_model");
    $attachs = $this->CI->attach_model->getByClassID($class, $id);
    return $attachs;
  }

  public function dropAttach( $attachID ) {
    $this->CI->load->model("attach_model");
    $attach = $this->CI->attach_model->drop($attachID);
    $fileExtension = end(explode(".", $attach->attachName));
    unlink('../uploads/'.$attach->attachHash.".".$fileExtension);
    return '../uploads/'.$attach->attachHash.".".$fileExtension;
    //$this->CI->load->helper('file');
    //if(delete_files('../uploads/'.$attach->attachHash.".".$fileExtension));
  }
}
/* End of file Permission.php */