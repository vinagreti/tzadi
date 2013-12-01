<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org_Model extends CI_Model {

    function __construct()
    {
        $this->load->library("mongo_db");
    }

    function getBranches( ) {

        $org = $this->mongo_db
            ->where('_id', $this->session->orgdata("org_id"))
            ->get('org');

        if($org)
            return array("success" => true, "branches" => $org[0]["branch"]);

        else
            return array("error" => "org_id da sessão do usuário nao corresponde a nenhuma organização");

    }

    function getByID($org_id)
    {

        $reservedIdentities = array("www"
            , "staging"
            , "intranet"
            , "blog"
            , "database"
            , "driver"
            , "task"
            , "developer"
            , "official"
            , "oficial"
            , "home"
            , "inicio"
            , "tzadi"
            );

        if( in_array( strtolower($org_id), $reservedIdentities ) )
            return "reserved identity";

        $org_id = strtolower($org_id);

        $res = $this->mongo_db
        ->where('_id', $org_id)
        ->get('org');

        if($res){

            if( ! isset($res[0]["about"]) ) $res[0]["about"] = "";

            if( ! isset($res[0]["theme"]) ) $res[0]["theme"] = "aqua";

            return $res[0];

        }

        else return false;

    }

    public function add( $org ){

        $this->load->model("mongo_model");

        $branch = array( array( "_id" => $this->mongo_model->newID(), "name" => $org["name"]) );

        $this->mongo_db->insert('org', array(
            "_id" => strtolower($org["_id"])
            , "name" => $org["name"]
            , "img" => assets_url("img/no_photo_640x480.png")
            , "kind" => "agency"
            , "email" => $org["email"]
            , "branch" => $branch
            ));

        
        $org = $this->mongo_db->where('_id', strtolower($org["_id"]))->get('org');

        return $org[0];

    }

    function getExchangeRate( )
    {

        $users = $this->mongo_db
            ->where( '_id', $this->session->userdata("org_id") )
            ->get("org");

        if( isset( $users[0]["exchangeRate"] ) )
            return $users[0]["exchangeRate"];

        else
            return false;

    }

    function setExchangeRate( $data )
    {

        $this->mongo_db
            ->where( '_id', $this->session->userdata("org_id") )
            ->set("exchangeRate" , $data )
            ->update("org");

        return array("url" => base_url().lang("rt_currency"));

    }

    public function set( $data ){

        if( isset( $data["name"] ) )
        $orgData["name"] = $data["name"];

        if( isset( $data["about"] ) )
        $orgData["about"] = $data["about"];

        $edited = $this->mongo_db
            ->where( '_id', $this->session->userdata("org") )
            ->set($orgData)
            ->update("org");

        if( $orgData["name"] ) {

            $res->success = lang("agc_saved");

            $this->session->set_userdata('orgName', $orgData["name"]);

        }

        else
            $res->success = lang("agc_errorWhenSaving");

        return $res;

    }

    public function setPayment( $data ){

        $newData = json_decode($data["paymentMethods"]);

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

            $this->session->set_userdata("orgPayment", $payment);

            return array("status" => "success", "message" => lang("org_saved"));

        }

        else
            return array("status" => "error", "message" => lang("org_notSaved"));

    }

  function changeImg(){

    $_id = $this->session->userdata("org");

    $this->load->model("file_model");

    $newFile = tzd_url() . "file/open/" . $this->file_model->save( $_id );

    $this->session->set_userdata('orgImg', $newFile);

    $org = $this->mongo_db
      ->where('_id', $_id)
      ->get('org');

    if( isset( $org[0]["img"] ) ) {

        $imgIdPos = strrpos($org[0]["img"], "file/open/");

        $img = substr( $org[0]["img"], $imgIdPos+10,  strlen($org[0]["img"]) );

        if( is_numeric( $img ) )
            $this->file_model->drop( (int) $img );

    }

    $this->mongo_db
      ->where('_id', $_id)
      ->set("img", $newFile)
      ->update("org");

    $res->img = $newFile;

    return $res;

  }

  function changeTheme( $data ){

    $this->mongo_db
      ->where('_id', $this->session->userdata('org'))
      ->set("theme", $data["theme"])
      ->update("org");

    return array("success" => true);

  }

}