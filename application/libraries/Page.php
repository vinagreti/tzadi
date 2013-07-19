<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page {
  public function __construct() {
    $this->CI =& get_instance();
  }

  public function load( $data ) {
    
    // Loads the language if is not
    if( ! $this->CI->session->userdata('app_language') )
      $this->CI->session->set_userdata('app_language', LANGUAGE);

    $this->CI->lang->load('template', $this->CI->session->userdata('app_language'));
    $this->CI->lang->load('route', $this->CI->session->userdata('app_language'));

    // load the view within the template
    $data->content = $this->CI->load->view($data->view, $data, true);
    if(defined('COMPANYSUBDOMAIN')){
      $data->companyName = $this->CI->session->userdata("companyName");
      $this->CI->parser->parse('templates/companyTemplate', $data);
    }
    else  $this->CI->parser->parse('templates/tzadiTemplate', $data);
  }
}
/* End of file Permission.php */