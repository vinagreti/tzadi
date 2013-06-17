<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends My_Controller {

  public function download($_id){
    $this->load->model("file_model");
    $file = $this->file_model->get((int) $_id);
    $this->load->helper('file');
    $this->output
      ->set_content_type($file[0]["type"])
      ->set_output($file[0]["binary"]->bin);
    $this->load->helper('download');
    force_download($file[0]["name"], $file[0]["binary"]->bin);
  }

  public function open($_id){
    $this->load->model("file_model");
    $file = $this->file_model->get((int) $_id);
    $this->load->helper('file');
    $this->output
      ->set_content_type($file[0]["type"])
      ->set_output($file[0]["binary"]->bin);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */