<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

    function __construct() 
    { // Call the Model constructor

        parent::__construct();

    }
    
    function checkCredential($email, $password) {

        $password = md5($password);

        $this->db->where('userEmail', $email)
            ->where('userPassword', $password)
            ->join('agencyUser au', 'au.userID = u.userID', 'left')
            ->join('agency a', 'a.agencyID = au.agencyID', 'left');
        $user = $this->db->get('user u')->result();

        if(isset($user[0]))
        {
            $agencyOwner = false;
            if($user[0]->agencyOwner == $user[0]->userID) $agencyOwner = true;
            
            $this->session->set_userdata('userID', $user[0]->userID);
            $this->session->set_userdata('userName', $user[0]->userName);
            $this->session->set_userdata('userEmail', $user[0]->userEmail);
            $this->session->set_userdata('agencyID', $user[0]->agencyID);
            $this->session->set_userdata('agencyOwner', $agencyOwner);
            $this->session->set_userdata('institutionMethods', $this->levelToMethods($user[0]->institutionLevel));

            return true;
        }
        
        else return false;
    }

  private function levelToMethods( $num ) {

    $permited = str_split( strrev( decbin( $num ) ) );
    $i = 1;
    $classMethods = array();
    foreach ($permited as $key => $value) {
      if( $value == 1) array_push($classMethods, $i);
      $i = $i+$i;
    }
    return $classMethods;
  }
}
