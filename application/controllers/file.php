<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends My_Controller {

  public function __construct() { 
    parent::__construct();
  }

  public function download($_id){
    $this->load->model("file_model");
    $file = $this->file_model->get((int) $_id);
    $this->load->helper('file');
    $this->output
      ->set_content_type($file["type"])
      ->set_output($file["binary"]->bin);
    $this->load->helper('download');
    force_download($file["name"], $file["binary"]->bin);
  }

  public function open($_id){
    $this->load->model("file_model");
    $file = $this->file_model->get((int) $_id);


    echo $file["binary"];
    echo "<br>".$file["type"];


    $this->load->helper('file');
    //$this->output
      //->set_content_type($file["type"])
      //->set_output($file["binary"]->bin);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */