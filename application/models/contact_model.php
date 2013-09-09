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

      $message = "<p> Contato enviado por: " . $email . "</p>";
      $message .= "<p> para tzadi.com</p>";
      $message .= "<p> Assunto: " . $data["subject"] . "</p>";
      $message .= "<p> Mensagem: " . $data["message"] . "</p>";
      $mail["message"] = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';
      $mail["subject"] = "Contato recebido - " . $email;
      $mail["to"] =  $email;
      $mail["bcc"] =  array("bruno@tzadi.com", "tzadiinc@gmail.com", "lucas@tzadi.com");
      $mail["kind"] = "contact";
      $this->load->model('mail_model');
      $this->mail_model->queue($mail);

    } else {

      $email = $data["email"];

      $this->load->helper('email');

      if ( valid_email( $email ) ) {

        $this->load->model('customer_model');

        $customer_id = $this->customer_model->getOrCreate( $email );

        $message = "<p> Contato enviado por: " . $email . "</p>";

        $message .= "<p> Contato enviado para <a href='" . IDENTITY . ".tzadi.com'>".IDENTITY . ".tzadi.com</p>";

        $message .= "<p> Assunto: " . $data["subject"] . "</p>";

        $message .= "<p> Mensagem: " . $data["message"] . "</p>";

        $mail["message"] = '<html><head><meta charset="utf-8"></head><body>'.$message.'</body></html>';

        $mail["subject"] = "Contato enviado - " . $email;

        $mail["to"] =  $email;

        $mail["bcc"] =  array($this->session->userdata("profileEmail"));

        $mail["kind"] = "contact";

        $this->load->model('mail_model');

        $mail_id = $this->mail_model->queue($mail);

        $action->kind = "contact";

        $action->mail_id = $mail_id;

        $this->customer_model->addTimeline( $customer_id, $action );

        return array( "success" => lang("ct_sent") );

      } else {

        return array( "error" => lang("ct_insert_valid_mail") );

      }

    }

  }
}
