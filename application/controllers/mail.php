<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends My_Controller {

	public function send()
	{
		// este método tem que ser acionado por um cron, para que seja executado automaticamente
		// instala o pacote lynx: sudo apt-get install lynx
		// crie a pasta: /var/log/tzadi/
		// insira o cron (crontab -e): */1 * * * * lynx -dump http://tzadi.com/mail/send > /var/log/tzadi/mail.log
		$this->load->model('mail_model');

		echo $this->mail_model->send();

	}

	public function log()
	{

		$this->load->model('mail_model');

		foreach( $this->mail_model->log() as $key => $mail ){

			$mailData = "<hr>";

			$mailData .= "<strong>_id:</strong> " . $mail["_id"];

			$mailData .= "<br> <strong>kind:</strong> " . $mail["kind"];

			$mailData .= "<br> <strong>status:</strong> " . $mail["status"];

			$mailData .= "<br> <strong>to:</strong> " . $mail["to"];

			$mailData .= "<br> <strong>subject:</strong> " . $mail["subject"];

			$mailData .= "<br> <strong>Data criação:</strong> " . date("d-m-Y h:i:s ", $mail["queue_date"]);

			if(isset($mail["sent_date"])) $mailData .= "<br> <strong>Data do envio:</strong> " . date("d-m-Y h:i:s ", $mail["sent_date"]);

			$mailData .= "<hr>";

			echo utf8_decode($mailData);

		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */