<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class PDF extends My_Controller {

  public function __construct() {
    parent::__construct();

		$this->lang->load('about', $this->session->userdata('language'));
  }

	public function index()
	{

    $html = '
    <html>
    <head></head>
    <style>
    h1 {color:#333; size:20px; margin-bottom:5px;}
    h3 {color:#222;}
    </style>
    <body>

    <h1>Falta desenvolver isso aqui no próprio PHP</h1>

    </body>
    </html>
    ';

    require_once(APPPATH."/libraries/dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('letter', 'landscape');
    $dompdf->render();
    $dompdf->stream("exemplo-01.pdf");

  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */