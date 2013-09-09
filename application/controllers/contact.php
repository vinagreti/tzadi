<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends My_Controller {

  public function __construct() {
    parent::__construct();
	$this->lang->load('contact', $this->session->userdata('language'));
  }

	public function index()
	{
		$data = $this->input->post();

		if(!$data){

	        $data->dynJS = 'tzadi/contact';

	        $data->view = 'tzadi/contact';

	        $data->page_title = lang('ct_page_title');

	        $this->page->load($data); 

		} else {

			$this->load->model('contact_model');

			echo json_encode( $this->contact_model->save($data) );

		}
	}
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */