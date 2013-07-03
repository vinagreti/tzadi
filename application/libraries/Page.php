<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page {
  public function __construct() {
    $this->CI =& get_instance();
  }

  public function load( $data ) {
    
    // Check the language and load the template language file
    $app_language = $this->CI->session->userdata('app_language');
    if(isset($app_language)) {
      $this->CI->lang->load('template', $app_language);
    } else {
      $this->CI->lang->load('template', LANGUAGE);
    }

    // load the view within the template
    $data->content = $this->CI->load->view($data->view, $data, true);
    if(defined('COMPANYNICK')){
      $data->companyName = $this->CI->session->userdata("companyName");
      $this->CI->parser->parse('templates/companyTemplate', $data);
    }
    else  $this->CI->parser->parse('templates/tzadiTemplate', $data);
  }
}
/* End of file Permission.php */