<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page {

  public function __construct() {

    $this->CI =& get_instance();

    $this->CI->load->library('user_agent');

    if ($this->CI->agent->browser() == 'Internet Explorer' && $this->CI->agent->version() < 10 && uri_string() != "error/incompatibleUserAgent")
        redirect(site_url("error/incompatibleUserAgent"));

  }

  public function load( $data ) {

    $userKind = $this->CI->session->userdata("userKind");

    if( ! defined('SUBDOMAIN') ) {

      switch ($userKind) {

        case "new" :

          $data->navbar = $this->CI->load->view("templates/tzadiNavbarLogged", $data, true);

          break;

        case "tzadi" :

          $data->navbar = $this->CI->load->view("templates/tzadiNavbar", $data, true);

          break;

        case "student" :

          $data->navbar = $this->CI->load->view("templates/tzadiNavbarLogged", $data, true);

          break;

        case "supplier" :

          $data->navbar = $this->CI->load->view("templates/tzadiNavbarLogged", $data, true);

          break;

      }

      $data->footer = $this->CI->load->view("templates/tzadiFooter", $data, true);

    } else {

      switch ($userKind) {

        case "agency" :

          $data->navbar = $this->CI->load->view("templates/agencyNavbar", $data, true);

          $data->footer = $this->CI->load->view("templates/agencyFooter", $data, true);

          break;

        default :

          if( $this->CI->session->userdata("userID") )
            $data->navbar = $this->CI->load->view("templates/agencyPublicNavbarLogged", $data, true);

          else
            $data->navbar = $this->CI->load->view("templates/agencyPublicNavbar", $data, true);

          $data->footer = $this->CI->load->view("templates/agencyFooter", $data, true);

          break;

      }

    }

    $data->content = $this->CI->load->view($data->view, $data, true);

    $this->CI->parser->parse("templates/template", $data);

  }

}
/* End of file Permission.php */