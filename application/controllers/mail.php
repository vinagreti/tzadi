<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends My_Controller {

  public function __construct() {
    parent::__construct();
		$this->lang->load('mail', $this->session->userdata('language'));
  }

	public function read( $mail_id ){

	    $this->MYensureOwnProfile();

		$this->load->model("mail_model");

		$data->mail = $this->mail_model->read( $mail_id );

        $data->dynJS = array( 'mail/read', 'tzadi/tzadi-mail');

        $data->view = 'mail/read';

        $data->page_title = lang('mail_readTitle');

        $this->page->load($data);

	}

	public function send()
	{

		$this->load->model('mail_model');

		echo $this->mail_model->send();

	}

	public function log()
	{

		$this->load->model('mail_model');

		foreach( $this->mail_model->log() as $key => $mail ){

			$mailData = "<hr>";

			$mailData .= "<strong>_id:</strong> " . $mail["_id"];

			$mailData .= "<br> <strong>entrada:</strong> " . date("d-m-Y h:i:s ", $mail["queue_date"]);

			if(isset($mail["sent_date"])) $mailData .= "<br> <strong>saída:</strong> " . date("d-m-Y h:i:s ", $mail["sent_date"]);

			$mailData .= "<br> <strong>kind:</strong> " . $mail["kind"];

			$mailData .= "<br> <strong>status:</strong> " . $mail["status"];

			if(isset($mail["from"])) $mailData .= "<br> <strong>from:</strong> " . $mail["from"];

			$mailData .= "<br> <strong>to:</strong> " . $mail["to"];

			if(isset($mail["bcc"])) {

				if(is_string($mail["bcc"]))
					$mailData .= "<br> <strong>bcc:</strong> " . $mail["bcc"];

				if(is_array($mail["bcc"])) {

					$mailData .= "<br> <strong>bcc:</strong> ";

					foreach ($mail["bcc"] as $key => $bcc) {
						
						$mailData .= $bcc.", ";

					}

				}

			}

			$mailData .= "<br> <strong>subject:</strong> " . $mail["subject"];

			$mailData .= "<hr>";

			echo utf8_decode($mailData);

		}

	}

	public function getNew()
	{

		$this->load->model('mail_model');

		echo $this->mail_model->getNew();

	}

	public function write()
	{

		$data = $this->input->post();

		if( ! $data ){

			echo json_encode($this->load->view('mail/modalForm', $data, TRUE));

		} else {

			if( isset($data["mail"]) && isset($data["subject"]) && isset($data["message"]) ) {

				$this->load->model("mail_model");

				echo json_encode( $this->mail_model->write($data) );

			} else {

				echo json_encode( array("error" => "informe todos os dados para enviar o e-mail") );

			}

		}

	}

	public function reply()
	{

		$data = $this->input->post();

		if( isset( $data["message"] ) && $data["mail_id"] ){

			$this->load->model("mail_model");

			echo json_encode( $this->mail_model->reply( $data ) );

		} else if( isset( $data["mail_id"] ) ){

			$this->load->model("mail_model");

			$data["mail"] = $this->mail_model->read( $data["mail_id"] );

			echo json_encode($this->load->view('mail/modalReplyForm', $data, TRUE));

		} else if( isset( $data["message"] ) ){

			echo json_encode(array("error" => "informe o id do e-mail"));

		} else {

			echo json_encode(array("error" => "informe a mensagem"));

		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */