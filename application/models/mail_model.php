<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_Model extends CI_Model {

  public function __construct() {

    $this->load->library("mongo_db");

    $this->smtp_host = 'ssl://smtp.googlemail.com';

    $this->imap_host = '{imap.gmail.com:993/imap/ssl}MESSAGE_NEW';

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

    $data["staff_id"] = $this->session->userdata("_id");

    $this->mongo_db->insert('mail', $data);

    return $data["_id"];

  }


  public function send( ) {

    $queued = $this->mongo_db
      ->where('status', "waiting")
      ->get('mail');

    $log = "";

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => $this->smtp_host,
      'smtp_port' => 465,
      'smtp_user' => $this->smtp_user,
      'smtp_pass' => $this->smtp_pass,
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

    $this->load->library('email', $config);

    $this->load->model("user_model");

    foreach($queued as $key => $data) {

      $this->email->clear(TRUE);

      $this->email->set_newline("\r\n");

      $staff = $this->user_model->getByID( $data["staff_id"] );

      $this->email->from($this->from, iconv("UTF-8", 'iso-8859-1', $staff["name"]) );

      $this->email->to($data["to"]);

      if( $data["kind"] == "repliedMessage" ) $tag = "";

      else $tag = " <msgid>".$data['_id']."</msgid>";

      $this->email->subject(utf8_decode($data["subject"]) . $tag);

      if(isset($data["cc"])) $this->email->cc($data["cc"]);

      if(isset($data["bcc"])) $this->email->bcc($data["bcc"]);

      if( isset($data["attach"]) ){

        $attachsTempPath = $this->getTempFiles($data["attach"]);

        foreach( $attachsTempPath as $key => $attach ){

          $this->email->attach( $attach, "inline" );

        }

      }


      $message = '<html><head><meta charset="utf-8"></head><body>'.nl2br($data["message"]).'</body></html>';

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

  public function getNew(){

    /* try to connect */
    $inbox = imap_open($this->imap_host,$this->smtp_user,$this->smtp_pass) or die('Cannot connect to Gmail: ' . imap_last_error());

    /* grab emails */
    $emails = imap_search($inbox,'ALL');

    /* if emails are returned, cycle through each... */
    if($emails) {
      
      /* begin output var */
      $output = '';
      
      /* put the newest emails on top */
      rsort($emails);

      /* for every email... */
      foreach($emails as $email_number) {

        $mail = array();

        /* get information specific to this email */
        $overview = imap_fetch_overview($inbox,$email_number,0);
        $mail["message"] = imap_fetchbody($inbox,$email_number,2);

        $regex = '#<msgid>(.*?)</msgid>#';

        preg_match($regex, $overview[0]->subject, $matches);
        $mail["mail_referer_id"] = $matches[1];

        mb_internal_encoding('UTF-8');
        $mail["subject"] = str_replace("_"," ", mb_decode_mimeheader($overview[0]->subject));

        // this regex handles more email address formats like a+b@google.com.sg, and the i makes it case insensitive
        $mail_pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';

        // preg_match_all returns an associative array
        preg_match($mail_pattern, $overview[0]->from, $froms);

        $mail["from"] = $froms[0];

        preg_match($mail_pattern, $overview[0]->to, $tos);

        $mail["to"] = $tos[0];

        $mail["queue_date"] =  time($overview[0]->date);

        $this->load->helper('date');

        $mail["sent_date"] =  now();

        $mail["kind"] = "replyReceived";

        $mail["status"] = "new";

        $this->add($mail);

      }

      imap_delete($inbox, "1:*");

    } 

    /* close the connection */
    imap_close($inbox);

    return true;

  }

  public function add($mail) {

    $this->load->model("mongo_model");

    $mail["_id"] = $this->mongo_model->newID();

    $this->mongo_db->insert('mail', $mail);

    $this->load->model("customer_model");

    $action->kind = "replyReceived";

    $action->mail_id = $mail["_id"];

    $action->mail_referer_id = $mail["mail_referer_id"];

    $action->customer_id = $this->customer_model->getCustomerIdByMailId( $mail["mail_referer_id"] );

    $this->customer_model->addTimeline( $action );

    return true;

  }

  public function write( $data ) {

    $this->load->model("mongo_model");

    $this->load->model("customer_model");

    $mail["_id"] = $this->mongo_model->newID();

    $mail["message"] = $data["message"];

    $mail["subject"] = $data["subject"];

    $mail["to"] =  $data["mail"];

    $mail["kind"] = "sentMessage";

    $action->mail_id = $this->queue($mail);

    $action->kind = "sentMessage";

    $action->customer_id = $this->customer_model->getOrCreate( $data["mail"] );

    $this->customer_model->addTimeline( $action );

    return array("success" => "mensagem enviada");

  }

  public function reply( $data ) {

    $mail = $this->read( $data["mail_id"] );

    $this->load->model("mongo_model");

    $this->load->model("customer_model");

    $mail["_id"] = $this->mongo_model->newID();

    $mail["message"] = $data["message"] . "<br></br><hr>\r\n".date( "d/m/Y h:m", time($mail["sent_date"]) )."\r\n". $mail["message"]."<hr>";

    $mail["subject"] = $mail["subject"];

    $mail["to"] =  $mail["from"];

    $mail["kind"] = "repliedMessage";

    $action->mail_id = $this->queue($mail);

    $action->mail_referer_id = $mail["mail_referer_id"];

    $action->kind = "repliedMessage";

    $action->customer_id = $this->customer_model->getOrCreate( $mail["from"] );

    $this->customer_model->addTimeline( $action );

    return array("success" => "mensagem enviada");

  }

}
