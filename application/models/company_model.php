<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getBySubdomain($subdomain)
  {

    $subdomain = strtolower($subdomain);

    $res = $this->mongo_db
      ->where('subdomain', $subdomain)
      ->get('company');

    if($res) return $res[0];
    else return false;
  }

  // creates a new product obj
  function add($data)
  {
    $this->load->model("mongo_model");
    $newUserID = $this->mongo_model->newID();
    $newCompanyID = $this->mongo_model->newID();

    $this->load->helper('date');

    $this->mongo_db->insert('user',
      array(
        "_id" => $newUserID
        , "company" => $newCompanyID
        ,"name" => strtolower($data["email"])
        , "email" => strtolower($data["email"])
        , "password" => md5($data["password"])
        , "permission" => array("supplier" => "1023", "product" => "1023")
      )
    );

    $this->mongo_db->insert('company',array("name" =>  $data["subdomain"], "_id" => $newCompanyID, "plan" => $data["plan"], "subdomain" => strtolower($data["subdomain"]), "owner" => $newUserID));

    return true;
  }

  function beInTouch($data)
  {

    if(isset($data["email"])) {

      $already = $this->mongo_db
        ->where('email', $data["email"])
        ->get('inTouch');

      if(isset($already[0])) {

        $error = lang("cpn_emailAlreadyInTouch");

      } else {

        $subject = $data["name"] . " " . lang("cpn_beInTouchSubject");

        $data["message"];
        
        $message = $this->load->view("company/beInTouchMail", $data, true);

        $to =  $data["email"];

        $cc =  "bruno@tzadi.com";

        $cc =  "tzadiinc@tzadi.com";

        $cc =  "lucas@tzadi.com";

        $this->load->library('gmail');

        $this->gmail->send($to, utf8_decode($subject), utf8_decode($message));
      
        $this->load->model("mongo_model");

        $this->mongo_db->insert('inTouch',
          array(
            "_id" => $this->mongo_model->newID()
            , "name" => $data["name"]
            , "email" => $data["email"]
            , "message" => array($data["message"])
          )
        );

        $error = false;

      }


    } else {

      $error = $this->load->view('company/beInTouchForm', "", true);

    }

    return $error;

  }
}