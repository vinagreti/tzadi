<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org_Model extends CI_Model {

    function __construct()
    {
        $this->load->library("mongo_db");
    }

    function getByIdentity($identity)
    {

        $identity = strtolower($identity);

        $res = $this->mongo_db
        ->where('_id', $identity)
        ->get('org');

        if($res){

            if( ! isset($res[0]["about"]) ) $res[0]["about"] = "";

            return $res[0];

        }

        else return false;

    }

    public function add( $user ){

        $user["orgKind"] = "agency";

        return $this->mongo_db->insert('org', array(
            "_id" => $user["identity"]
            , "name" => $user["orgName"]
            , "img" => "http://".ENVIRONMENT."/assets/img/no_photo_640x480.png"
            , "kind" => $user["orgKind"]
            , "email" => $user["email"]
            ));

    }

    function getExchangeRate( )
    {

        $users = $this->mongo_db
            ->where( '_id', $this->session->userdata("myOrgID") )
            ->get("org");

        if( isset( $users[0]["exchangeRate"] ) )
            return $users[0]["exchangeRate"];

        else
            return false;

    }

    function setExchangeRate( $data )
    {

        $this->mongo_db
            ->where( '_id', $this->session->userdata("myOrgID") )
            ->set("exchangeRate" , $data )
            ->update("org");

        return array("url" => base_url().lang("rt_currency"));

    }

}