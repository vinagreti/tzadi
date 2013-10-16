<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends My_Controller {

  public function __construct() {
    parent::__construct();
  }

	public function index()
	{

		$this->load->model('migration_model');

		$this->migration_model->procede();

	}
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */