<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page {

  public function __construct() {

    $this->CI =& get_instance();

    $this->CI->load->library('user_agent');

    if ($this->CI->agent->browser() == 'Internet Explorer' && $this->CI->agent->version() < 10 && uri_string() != "error/incompatibleUserAgent")
        redirect(site_url("error/incompatibleUserAgent"));

  }

  public function load( $data ) {

    if( $this->CI->session->userdata("ownProfile") )
      $data->navbar = $this->CI->load->view($this->CI->session->userdata("profileKind")."/navbar_private", $data, true);

    else if( $this->CI->session->userdata("_id") ) {

      if( defined("IDENTITY") )
        $data->navbar = $this->CI->load->view($this->CI->session->userdata("profileKind")."/navbar_public_logged", $data, true);

      else
        $data->navbar = $this->CI->load->view("tzadi/navbar_public_logged", $data, true);

    }

    else {

      if( defined("IDENTITY") )
        $data->navbar = $this->CI->load->view($this->CI->session->userdata("profileKind")."/navbar_public", $data, true);

      else
        $data->navbar = $this->CI->load->view("tzadi/navbar_public", $data, true);

    }

    $data->the_head = isset($data->the_head) ? $data->the_head : "";

    $data->content = $this->CI->load->view($data->view, $data, true);

    $this->CI->parser->parse("templates/template", $data);

  }

}
/* End of file Permission.php */