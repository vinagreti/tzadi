<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function save($data) {

    $this->load->model("mongo_model");
    $data["_id"] = $this->mongo_model->newID();
    $this->load->helper('date');
    $this->mongo_db->insert('contact', $data);

    if(!defined('COMPANYNICK')) {
      $message = "<p> Contato enviado por: " . $data["email"] . "</p>";
      $message .= "<p> Assunto: " . $data["subject"] . "</p>";
      $message .= "<p> Mensagem: " . $data["message"] . "</p>";
      $message = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';
      $subject = "Contato recebido - " . $data["email"];
      $to = "tzadiinc@tzadi.com";
      $this->load->library('gmail');
      $this->gmail->send($to, utf8_decode($subject), utf8_decode($message));
    } else {
      $message = "<p> Contato enviado por: " . $data["email"] . "</p>";
      $message .= "<p> para " . COMPANYNICK . "</p>";
      $message .= "<p> Assunto: " . $data["subject"] . "</p>";
      $message .= "<p> Mensagem: " . $data["message"] . "</p>";
      $message = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';
      $subject = "Contato recebido - " . $data["email"];
      $to = "tzadiinc@tzadi.com";
      $this->load->library('gmail');
      $this->gmail->send($to, utf8_decode($subject), utf8_decode($message));
    }

    return $data["_id"];

  }
}
