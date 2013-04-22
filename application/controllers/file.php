<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Controller {

  public function index()
  {
    echo "Bem vindo ao gerenciador de arquivos.";
  }

  public function download($attachHash){
    $this->load->model("attach_model");
    $attach = $this->attach_model->getName($attachHash);
    $fileExtension = end(explode(".", $attach->attachName));
    $data = file_get_contents('../uploads/'.$attachHash.".".$fileExtension); // Read the file's contents
    $this->load->helper('download');
    force_download($attach->attachName, $data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */