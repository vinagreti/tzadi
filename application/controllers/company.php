<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends My_Controller {

  public function __construct() {
    parent::__construct();
    $this->lang->load('company', $this->session->userdata('language'));
  }

  public function beInTouch()
  {
    $data = $this->input->post();
    $this->load->model("company_model");
    echo json_encode($this->company_model->beInTouch($data));
  }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */