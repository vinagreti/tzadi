<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_Model extends CI_Model {

  public function __construct()
  {
    $this->load->library("mongo_db");
  }

  function shareProduct($data)
  {

    $this->lang->load('product', $this->session->userdata('app_language'));

    $addresses = isset($data["addresses"]);

    $this->load->model("product_model");

    $product = $this->product_model->getHumanized( $data["productID"] );

    if(isset($product["img"])) $product["img"] = base_url()."file/open/".$product["img"];

    else $product["img"] = base_url()."assets/img/no_photo_160x120.png";

    if($addresses) {

      $address = $data["addresses"];

      $subject = $data["name"] . " " . lang("mail_shareIndicated") . ": " . $product["name"];

      $mail->message = $data["message"];
      
      $mail->product = $product;

      $message = $this->load->view("product/mail", $mail, true);

      $to = $address;

      $this->load->library('gmail');

      $this->gmail->send($to, utf8_decode($subject), utf8_decode($message));

    } else {

      echo json_encode($this->load->view('mail/shareProduct', $product, true));

    }
  }
}