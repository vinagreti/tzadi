<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_Model extends CI_Model {

  public function __construct() {

    $this->load->library("mongo_db");

  }

  public function load( $mail_id ){

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

    $data["from"] = $mail_conf["from"];

    $data["collaborator_id"] = $this->session->userdata("_id");

    if( ! isset( $data["org_id"] ) ) $data["org_id"] = $this->session->userdata("org_id");

    $this->mongo_db->insert('mail', $data);

    return $data["_id"];

  }


  public function send( ) {

    include('../config/mail.conf.php');

    $queued = $this->mongo_db
      ->where('status', "waiting")
      ->get('mail');

    $log = "";

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => $mail_conf["smtp_host"],
      'smtp_port' => 465,
      'smtp_user' => $mail_conf["smtp_user"],
      'smtp_pass' => $mail_conf["smtp_pass"],
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

    $this->load->library('email', $config);

    $this->load->model("user_model");

    foreach($queued as $key => $data) {

      $this->email->clear(TRUE);

      $this->email->set_newline("\r\n");

      $staff = $this->user_model->getByID( $data["collaborator_id"] );

      $this->email->from($mail_conf["from"], iconv("UTF-8", 'iso-8859-1', $staff["name"]) );

      $this->email->to($data["to"]);

      if( $data["kind"] == "repliedMessage" ) $tag = "";

      else $tag = " <id>".$data['_id']."</m>";

      $this->email->subject(utf8_decode($data["subject"]) . $tag);

      if(isset($data["cc"])) $this->email->cc($data["cc"]);

      if(isset($data["bcc"])) $this->email->bcc($data["bcc"]);

      if( isset($data["attach"]) ){

        $attachsTempPath = $this->getTempFiles($data["attach"]);

        foreach( $attachsTempPath as $key => $attach ){

          $this->email->attach( $attach, "inline" );

        }

      }

      $message = $this->load->view( 'mail/template', $data, true );

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

    include('../config/mail.conf.php');

    /* try to connect */
    $inbox = imap_open($mail_conf["imap_host"],$mail_conf["smtp_user"],$mail_conf["smtp_pass"]) or die('Cannot connect to Gmail: ' . imap_last_error());

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

        $regex = '#<id>(.*?)</m>#';

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

        $this->saveAnswers( $mail );

      }

      imap_delete($inbox, "1:*");

      $res = "baixados";

    } else {

      $res = "sem emails na caixa";

    }

    /* close the connection */
    imap_close($inbox);

    return $res;

  }

  public function saveAnswers($mail) {

    $this->load->model("mongo_model");

    $mail_id = $this->mongo_model->newID();

    $mail["_id"] = $mail_id;

    $this->mongo_db->insert('mail', $mail);

    $this->load->model("customer_model");

    $event->kind = "replyReceived";

    $event->mail_id = $mail["_id"];

    $event->mail_subject = $mail["subject"];

    $event->mail_referer_id = $mail["mail_referer_id"];

    $customer = $this->customer_model->getCustomerByMailId( $mail["mail_referer_id"] );

    $event->customer_id = $customer["customer_id"];

    $event->org_id = $customer["org_id"];

    $event->branch_id = $customer["org_id"];

    $this->customer_model->addTimeline( $event );

    $this->messageWatchers($mail );

    return $mail_id;

  }

  public function messageWatchers( $mail ) {

    $referer_mail = $this->load(  $mail["mail_referer_id"] );

    $this->load->model("user_model");

    $collaborator = $this->user_model->getByID( $referer_mail["collaborator_id"] );

    $mailToSend["message"] = $mail["message"];

    $mailToSend["subject"] = $mail["subject"];

    $mailToSend["to"] =  $collaborator["email"];

    $mailToSend["kind"] = "mail/messageWatchers";

    $mailToSend["org_id"] = $referer_mail["org_id"];

    $mail_id = $this->queue($mailToSend);

    return $mail_id;

  }

  public function write( $data ) {

    $this->load->model("mongo_model");

    $this->load->model("customer_model");

    $mail["_id"] = $this->mongo_model->newID();

    $mail["message"] = $data["message"];

    $mail["subject"] = $data["subject"];

    $mail["to"] =  $data["mail"];

    $mail["kind"] = "sentMessage";

    $event->mail_id = $this->queue($mail);

    $event->mail_subject = $mail["subject"];

    $event->kind = "sentMessage";

    $event->customer_id = $this->customer_model->getOrCreate( $data["mail"] );

    $this->customer_model->addTimeline( $event );

    return array("success" => "mensagem enviada");

  }

  public function reply( $data ) {

    $mail = $this->load( $data["mail_id"] );

    $this->load->model("mongo_model");

    $this->load->model("customer_model");

    $mail["_id"] = $this->mongo_model->newID();

    $mail["message"] = $data["message"] . "<br></br><hr>\r\n".date( "d/m/Y h:m", time($mail["sent_date"]) )."\r\n". $mail["message"]."<hr>";

    $mail["subject"] = $mail["subject"];

    $mail["to"] =  $mail["from"];

    $mail["kind"] = "repliedMessage";

    $event->mail_id = $this->queue($mail);

    $event->mail_subject = $mail["subject"];

    $event->mail_referer_id = $mail["mail_referer_id"];

    $event->kind = "repliedMessage";

    $event->customer_id = $this->customer_model->getOrCreate( $mail["from"] );

    $this->customer_model->addTimeline( $event );

    return array("success" => "mensagem enviada");

  }

}
