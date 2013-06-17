<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institution_Model extends CI_Model {

  function getAll() {
    $this->db->from('institution i')
      ->where('i.institutionCompanyID', $this->session->userdata('companyID'))
      ->where("i.institutionStatus !=", "dropped")
      ->join("campus c", "c.institutionID = i.institutionID")
      ->join("institutionKind ik", "ik.institutionKindID = i.institutionKind")  //bring kind
      ->where("c.campusStatus !=", "dropped");
    $query = $this->db->get()->result();
    return $query;
  }

  function getAllActive() {
    $this->db->from('institution i')
      ->where('i.institutionCompanyID', $this->session->userdata('companyID'))
      ->where("i.institutionStatus", "active")
      ->join("campus c", "c.institutionID = i.institutionID")
      ->join("institutionKind ik", "ik.institutionKindID = i.institutionKind")  //bring kind
      ->where("c.campusStatus !=", "dropped");
    $query = $this->db->get()->result();
    return $query;
  }

  function getByInstitutionID($institutionID) {

    $this->db->from('institution i')
      ->where('i.institutionCompanyID', $this->session->userdata('companyID'))
      ->where("i.institutionID", $institutionID)
      ->join("campus c", "c.institutionID = i.institutionID");
    return $this->db->get()->result();
  }

  function getByCampusID($campusID) {

    $this->db->from('institution i')
      ->where('i.institutionCompanyID', $this->session->userdata('companyID'))
      ->where("campusID", $campusID)
      ->join("campus c", "c.institutionID = i.institutionID");
    return $this->db->get()->result();
  }

  function insert($data) {
    $data['institutionCompanyID'] = $this->session->userdata('companyID');
    $this->db->insert('institution', $data);
    $institutionID = $this->db->insert_id();


    $data1['institutionID'] = $institutionID;
    $data1['campusName'] = lang("inst_Headquarters");
    $data1['campusHeadquarter'] = 1;
    $this->db->insert('campus', $data1);
    $campusID = $this->db->insert_id();

    return $this->getByCampusID($campusID);
  }

  function update($data) {
    $this->db->where('institutionCompanyID', $this->session->userdata('companyID'))
      ->where('institutionID', $data["institutionID"]);
    $query = $this->db->update('institution', $data);  

    return $this->getByInstitutionID($data["institutionID"]);
  }

  function campusUpdate($data) {
    $institutionData["institutionID"] = $data["institutionID"];
    $institutionData["institutionName"] = $data["institutionName"];
    $institutionData["institutionKind"] = $data["institutionKind"];
    $this->update($institutionData);

    unset($data["institutionID"]);
    unset($data["institutionName"]);
    unset($data["institutionKind"]);
    $this->db->where('campusID', $data["campusID"]);
    $query = $this->db->update('campus', $data);  

    return $this->getByCampusID($data["campusID"]);
  }

  function drop($data) {
    $data['institutionStatus'] = "dropped";
    $this->db->where('institutionID', $data['institutionID'])
      ->where('institutionCompanyID', $this->session->userdata('companyID'));
    $query = $this->db->update('institution', $data);
    
    return $this->getByInstitutionID($data['institutionID']);
  }

  function attach($data) {
    $this->load->library("attach");
    $this->attach->insert($data);
    return $this->attach->insert($data);
  }

  function createCampus($institutionID){
    $data1['institutionID'] = $institutionID;
    $data1['campusName'] = lang("inst_untitled");
    $this->db->insert('campus', $data1);
    $campusID = $this->db->insert_id();
    $campus = $this->getByCampusID($campusID);

    return $campus[0];   
  }

  function dropCampus($campusID) {
    $this->db->where('campusID', $campusID);
    return $this->db->delete('campus');
  }
}
