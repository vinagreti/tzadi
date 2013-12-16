<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_Model extends CI_Model {

    public function getConf( $org = false ){

        if( ! $org ){

            $org = $this->session->userdata("org");

        }

        $this->load->model("org_model");

        $agency = $this->org_model->getByID( $org );

        return $agency["payment"];

    }

    public function getResumeHTML( $org = false ){

        $this->lang->load('payment', $this->session->userdata('language'));

        return $this->load->view("payment/resume", $this->getConf(), true);

    }

    public function setConf( $newData ){

        if( isset( $newData->boleto ) ) $payment["boleto"] = ( $newData->boleto <= 1 ) ? $newData->boleto : false;
        if( isset( $newData->creditcard ) ) $payment["creditcard"] = ( $newData->creditcard <= 1 ) ? $newData->creditcard : false;
        if( isset( $newData->giftcard ) ) $payment["giftcard"] = ( $newData->giftcard <= 1 ) ? $newData->giftcard : false;
        if( isset( $newData->debitcard ) ) $payment["debitcard"] = ( $newData->debitcard <= 1 ) ? $newData->debitcard : false;
        if( isset( $newData->deposit ) ) $payment["deposit"] = ( $newData->deposit <= 1 ) ? $newData->deposit : false;
        if( isset( $newData->cash ) ) $payment["cash"] = ( $newData->cash <= 1 ) ? $newData->cash : false;
        if( isset( $newData->pagseguro ) ) $payment["pagseguro"] = ( $newData->pagseguro <= 1 ) ? $newData->pagseguro : false;
        if( isset( $newData->paypal ) ) $payment["paypal"] = ( $newData->paypal <= 1 ) ? $newData->paypal : false;
        if( isset( $newData->installmentsBoleto ) ) $payment["installmentsBoleto"] = ( $newData->installmentsBoleto <= 1 ) ? $newData->installmentsBoleto : false;
        if( isset( $newData->booklet ) ) $payment["booklet"] = ( $newData->booklet <= 1 ) ? $newData->booklet : false;
        if( isset( $newData->installmentsCreditcard ) ) $payment["installmentsCreditcard"] = ( $newData->installmentsCreditcard <= 1 ) ? $newData->installmentsCreditcard : false;
        if( isset( $newData->ccAmericanExpress ) ) $payment["ccAmericanExpress"] = ( $newData->ccAmericanExpress <= 1 ) ? $newData->ccAmericanExpress : false;
        if( isset( $newData->ccAura ) ) $payment["ccAura"] = ( $newData->ccAura <= 1 ) ? $newData->ccAura : false;
        if( isset( $newData->ccBNDES ) ) $payment["ccBNDES"] = ( $newData->ccBNDES <= 1 ) ? $newData->ccBNDES : false;
        if( isset( $newData->ccDinersClub ) ) $payment["ccDinersClub"] = ( $newData->ccDinersClub <= 1 ) ? $newData->ccDinersClub : false;
        if( isset( $newData->ccElo ) ) $payment["ccElo"] = ( $newData->ccElo <= 1 ) ? $newData->ccElo : false;
        if( isset( $newData->ccHipercard ) ) $payment["ccHipercard"] = ( $newData->ccHipercard <= 1 ) ? $newData->ccHipercard : false;
        if( isset( $newData->ccMastercard ) ) $payment["ccMastercard"] = ( $newData->ccMastercard <= 1 ) ? $newData->ccMastercard : false;
        if( isset( $newData->ccSorocred ) ) $payment["ccSorocred"] = ( $newData->ccSorocred <= 1 ) ? $newData->ccSorocred : false;
        if( isset( $newData->ccVisa ) ) $payment["ccVisa"] = ( $newData->ccVisa <= 1 ) ? $newData->ccVisa : false;
        if( isset( $newData->installmentsWithNoInterests ) ) $payment["installmentsWithNoInterests"] = ( $newData->installmentsWithNoInterests > 0 ) ? $newData->installmentsWithNoInterests : 1;
        if( isset( $newData->installmentsWithInterests ) ) $payment["installmentsWithInterests"] = ( $newData->installmentsWithInterests > 0 ) ? $newData->installmentsWithInterests : 1;
        if( isset( $newData->interests ) ) $payment["interests"] = ( $newData->interests >= 0 ) ? $newData->interests : 0;

        $edited = $this->mongo_db
            ->where( '_id', $this->session->userdata("org") )
            ->set("payment", $payment)
            ->update("org");

        if( $edited ){

            return array("status" => "success", "message" => lang("org_saved"));

        }

        else
            return array("status" => "error", "message" => lang("org_notSaved"));

    }
    
}