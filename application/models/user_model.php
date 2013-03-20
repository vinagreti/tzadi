<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

    function __construct() 
    { // Call the Model constructor

        parent::__construct();

    }
    
    function checkCredential($email, $password) {

        $password = md5($password);

        $user = $this->db->where('userEmail', $email);
        $user = $this->db->where('userPassword', $password);
        $user = $this->db->join('tzadiTaskProject p', 'p.projectID = u.userProject', 'left');
        $user = $this->db->get('tzadiUser u')->result();

        if(isset($user[0]))
        {
            $projects = $this->db->select(array(
                "projectTitle",
                "projectID"
                ));
            $projects = $this->db->order_by('projectTitle');
            $projects = $this->db->where('tzadiUser', $user[0]->userID);
            $projects = $this->db->join('tzadiTaskProject tp', 'tp.projectID = tup.tzadiProject', 'left');
            $projects = $this->db->get('tzadiUserProject tup')->result();

            $this->session->set_userdata('userID', $user[0]->userID);
            $this->session->set_userdata('userName', $user[0]->userName);
            $this->session->set_userdata('userEmail', $user[0]->userEmail);
            $this->session->set_userdata('userLevel', $user[0]->userLevel);
            $this->session->set_userdata('userProject', $user[0]->userProject);
            $this->session->set_userdata('userProjectName', $user[0]->projectTitle);
            $this->session->set_userdata('userProjects', $projects);
            return true;
        }
        
        else return false;
    }
}
