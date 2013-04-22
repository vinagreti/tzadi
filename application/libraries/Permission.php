<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission {

  function __construct() {
    $this->CI =& get_instance();
  }

  function check($methodID){

    if( $this->CI->session->userdata("userID") ) {
      $methodClass = $this->CI->router->class;
      $userClassMethods =  $this->CI->session->userdata( $methodClass.'Methods' );

      if( ! in_array( $methodID, $userClassMethods ) ) {
        $this->CI->session->set_flashdata('HTTP_REFERER', uri_string());
        redirect(base_url() . 'error/permission', 'refresh');    
      }

    } else {
      redirect(base_url() . 'error/permission', 'refresh');
    }

  }
}
/* End of file Permission.php */