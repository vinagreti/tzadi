<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function save($data) {

    $this->load->model("mongo_model");

    $data["_id"] = $this->mongo_model->newID();

    $data["org_id"] = $this->session->userdata("org");

    $this->mongo_db->insert('contact', $data);

    if(!defined('ORG_ID')) {

      $message = "<p> ".lang('ct_contactSentBy').": " . $email . "</p>";

      $message .= "<p> ".lang('ct_forTzadiCom')."</p>";

      $message .= "<p> ".lang('ct_Subject').": " . $data["subject"] . "</p>";

      $message .= "<p> ".lang('ct_Message').": " . $data["message"] . "</p>";

      $mail["message"] = $message;

      $mail["subject"] = "".lang('ct_contactReceived')." - " . $email;

      $mail["to"] =  $email;

      $mail["bcc"] =  array("bruno@tzadi.com", "tzadiinc@gmail.com", "lucas@tzadi.com");

      $mail["kind"] = "contact";

      $this->load->model('mail_model');

      $mail["org_id"] = 0;

      $this->mail_model->queue($mail);

    } else {

      $email = $data["email"];

      $this->load->helper('email');

      if ( valid_email( $email ) ) {

        $this->load->model('customer_model');

        $customer_id = $this->customer_model->getOrCreate( $email );

        $name = substr($email, 0, strpos($email, "@"));

        $message = "<p>".lang('ct_contactSentBy').": <a href=".base_url().lang("rt_customer")."/".$customer_id.">" . $name . "</a></p>";

        $message .= "<p>".lang('ct_contactSentFor')." <a href='" . ORG_ID . ".tzadi.com'>".ORG_ID . ".tzadi.com</a></p>";

        $message .= "<p>".lang('ct_Subject').": " . $data["subject"] . "</p>";

        $message .= "<p>".lang('ct_Message').": " . $data["message"] . "</p>";

        $mail["message"] = $message;

        $mail["subject"] = "".lang('ct_contactReceived')." - " . $name;

        $mail["to"] =  $email;

        $mail["bcc"] =  array($this->session->userdata("orgEmail"));

        $mail["kind"] = "contact";

        $this->load->model('mail_model');

        $mail["org_id"] = $this->session->userdata("org");

        $mail_id = $this->mail_model->queue($mail);

        $event->kind = "contact";

        $event->mail_id = $mail_id;

        $event->mail_subject = $mail["subject"];

        $event->customer_id = $customer_id;

        $event->creator_id = "customer";

        $this->customer_model->addTimeline( $event );

        return array( "success" => lang("ct_sent") );

      } else {

        return array( "error" => lang("ct_insert_valid_mail") );

      }

    }

  }
}
