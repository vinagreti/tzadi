<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_Model extends CI_Model {

  public function __construct() {

    $this->load->library("mongo_db");

    if (ENVIRONMENT ==  'tzadi.com') {

      $this->smtp_user = 'contact@tzadi.com';

      $this->smtp_pass = 'Contact2010ireland';

      $this->from = 'contact@tzadi.com';

    } else {

      $this->smtp_user = 'contactstaging@tzadi.com';

      $this->smtp_pass = 'contactstaging';

      $this->from = 'contactstaging@tzadi.com';

    }

  }

  public function read( $mail_id ){

    $mail = $this->mongo_db
      ->where( "_id", (int) $mail_id )
      ->get('mail');

    return $mail[0];

  }

  public function queue($data) {

    $this->load->model("mongo_model");

    $data["_id"] = $this->mongo_model->newID();

    $data["status"] = "waiting";

    $data["queue_date"] = time();

    $data["from"] = $this->from;

    $this->mongo_db->insert('mail', $data);

    return $data["_id"];

  }


  public function send() {

    $queued = $this->mongo_db
      ->where('status', "waiting")
      ->get('mail');

    $log = "";

    foreach($queued as $key => $data) {

      $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => $this->smtp_user,
        'smtp_pass' => $this->smtp_pass,
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
      );

      $this->load->library('email', $config);

      $this->email->set_newline("\r\n");

      $this->email->from($this->from);

      $this->email->to($data["to"]);

      $this->email->subject(utf8_decode($data["subject"]));

      if(isset($data["cc"])) $this->email->cc($data["cc"]);

      if(isset($data["bcc"])) $this->email->bcc($data["bcc"]);

      if( isset($data["attach"]) ){

        $attachsTempPath = $this->getTempFiles($data["attach"]);

        foreach( $attachsTempPath as $key => $attach ){

          $this->email->attach( $attach, "inline" );

        }

      }


      $message = '<html><head><meta charset="utf-8"></head><body>'.$data["message"].'</body></html>';

      $this->email->message(utf8_decode($message));

      if($this->email->send()) {

        $this->mongo_db
          ->where('_id', $data["_id"])
          ->set("status", "sent")
          ->set("sent_date", time())
          ->update('mail');

        $log .= $data["_id"] . " sent </br>";

        if( isset($data["attach"]) )
          $this->dropTempFiles( $attachsTempPath );

      } else {

        if(!isset($data["error"])) $data["error"] = array();

        array_push($data["error"], $this->email->print_debugger());

        $this->mongo_db
          ->where('_id', $data["_id"])
          ->set("error", $data["error"])
          ->set("sent_date", time())
          ->update('mail');

        $log .= $this->email->print_debugger();

        $log .= "</br>";
      }

    }

    return $log;

  }

  public function log() {

    return $this->mongo_db
      ->order_by( array("_id" => "desc") )
      ->get('mail');

  }

  private function getTempFiles( $attachs ) {

    $attachsTempPath = array();

    $this->load->model("file_model");

    if( is_array( $attachs ) ){

      foreach( $attachs as $key => $url ){

        $tempPath = $this->file_model->saveTempFile( $url );

        array_push($attachsTempPath, $tempPath);

      }

    } else {

      $attachsTempPath[0] = $this->file_model->saveTempFile( $attachs );

    }

    return $attachsTempPath;

  }

  private function dropTempFiles( $attachsTempPath ) {

    foreach( $attachsTempPath as $key => $path ){

      echo $this->file_model->dropTempFile( $path );

    }

    return true;

  }

}
