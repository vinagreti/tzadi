<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function save($data) {

    $this->load->model("mongo_model");
    $data["_id"] = $this->mongo_model->newID();
    $this->mongo_db->insert('contact', $data);

    if(!defined('IDENTITY')) {

      $message = "<p> Contato enviado por: " . $data["email"] . "</p>";
      $message .= "<p> Assunto: " . $data["subject"] . "</p>";
      $message .= "<p> Mensagem: " . $data["message"] . "</p>";
      $mail["message"] = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';
      $mail["subject"] = "Contato recebido - " . $data["email"];
      $mail["to"] =  $data["email"];
      $mail["bcc"] =  array("bruno@tzadi.com", "tzadiinc@gmail.com", "lucas@tzadi.com");
      $mail["kind"] = "contact";
      $this->load->model('mail_model');
      $this->mail_model->queue($mail);

    } else {

      $message = "<p> Contato enviado por: " . $data["email"] . "</p>";
      $message .= "<p> para " . IDENTITY . "</p>";
      $message .= "<p> Assunto: " . $data["subject"] . "</p>";
      $message .= "<p> Mensagem: " . $data["message"] . "</p>";
      $mail["message"] = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';
      $mail["subject"] = "Contato recebido - " . $data["email"];
      $mail["to"] =  $data["email"];
      $mail["bcc"] =  array($this->session->userdata("profileEmail"));
      $mail["kind"] = "contact";
      $this->load->model('mail_model');
      $this->mail_model->queue($mail);

    }

    return $data["_id"];

  }
}
