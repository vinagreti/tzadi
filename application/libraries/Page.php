<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page {
  public function __construct() {
    $this->CI =& get_instance();
  }

  public function load( $data ) {
    
    $app_language = $this->CI->session->userdata('app_language');
    if(isset($app_language)) {
      $this->CI->lang->load('template', $app_language);
    } else {
      $this->CI->lang->load('template', LANGUAGE);
    }

    $content = $this->CI->load->view($data->view, "", true);
    $data = array(
      'class' => $data->class,
      'page_title' => $data->title,
      'content' => $content
      );
    $this->CI->parser->parse('template', $data);
  }
}
/* End of file Permission.php */