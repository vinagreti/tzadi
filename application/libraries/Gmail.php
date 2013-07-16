<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gmail {

  public function __construct() {
    $this->CI =& get_instance();

    if (ENVIRONMENT ==  'production') {
      $this->smtp_user = 'task@tzadi.com';
      $this->smtp_pass = 'Task2010ireland';
      $this->from = 'contact@tzadi.com';
    } else {
      $this->smtp_user = 'taskstaging@tzadi.com';
      $this->smtp_pass = 'TaskS2010ireland';
      $this->from = 'contactstaging@tzadi.com';
    }

  }

  public function send($data) {

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

    $this->CI->load->library('email', $config);
    $this->CI->email->set_newline("\r\n");
    $this->CI->email->from($this->from);
    $this->CI->email->to($data->to);
    $this->CI->email->subject(utf8_decode($data->subject));
    if(isset($data->cc)) $this->CI->email->cc($data->cc);
    if(isset($data->bcc)) $this->CI->email->bcc($data->bcc);
    $message = '<html><head><meta charset="utf-8"></head><body>'.$data->message.'</body></html>';
    $this->CI->email->message(utf8_decode($message));

    if($this->CI->email->send()) return true;
    else return show_error($this->CI->email->print_debugger());
  }

}
/* End of file Gmail.php */