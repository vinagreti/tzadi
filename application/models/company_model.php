<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Model extends CI_Model {

  function getByNick($companyNick) {
    $this->db->from('company')
      ->where('companyNick', $companyNick);
    $company = $this->db->get(0)->result();
    if($company){
      return $company[0];
    } else {
      return false;
    }
  }
}