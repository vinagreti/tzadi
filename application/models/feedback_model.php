<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function send($data) {

    $this->load->model("mongo_model");
    
    $data["_id"] = $this->mongo_model->newID();
    
    $this->mongo_db->insert('feedback', $data);
    
    $message = "<p> Feedback enviado por: " . $data["email"] . "</p>";
    
    $message .= "<p> Assunto: " . $data["subject"] . "</p>";
    
    $message .= "<p> Mensagem: " . $data["message"] . "</p>";
    
    $mail["message"] = $message;
    
    $mail["subject"] = "Feedback recebido - " . $data["email"];
    
    $mail["to"] =  $data["email"];
    
    $mail["bcc"] =  array("bruno@tzadi.com", "tzadiinc@gmail.com", "lucas@tzadi.com");
    
    $mail["kind"] = "feedback";
    
    $this->load->model('mail_model');
    
    $mail["org_id"] = ( $this->session->userdata("org") ) ? $this->session->userdata("org") : 0;
    
    $this->mail_model->queue($mail);
    
    return array("success" => "mensagem enviada");

  }
}
