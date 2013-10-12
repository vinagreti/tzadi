<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org extends My_Controller {

	public function __construct() {

		parent::__construct();

		$this->lang->load('contact', $this->session->userdata('language'));

	}

    public function getBranches(){

        $this->load->model("org_model");

        echo json_encode( $this->org_model->getBranches() );
        
    }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */