<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends My_Controller {

    public function __construct() {

        parent::__construct();

        $this->lang->load('payment', $this->session->userdata('language'));

    }

    public function conf(){

        $this->MYensureOwnProfile();

        $this->load->model("payment_model");

        if( $this->input->put("paymentMethods") ){

            $paymentMethods = json_decode($this->input->put("paymentMethods"));

            $data = json_encode( $this->payment_model->setConf( $paymentMethods ) );

            $this->output->set_content_type('application/json');

            $this->output->set_output($data);
            
        } else {

            $data = new StdClass();

            $data->dynJS = 'payment/conf';

            $data->view = 'payment/conf';

            $data->payment = $this->payment_model->getConf();

            $data->page_title = lang('agc_SettingsOf') . " " . $this->session->userdata("orgName");

            $this->page->load($data);

        }

    }

}

/* End of file term.php */
/* Location: ./application/controllers/term.php */