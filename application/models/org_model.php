<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Org_Model extends CI_Model {

    function __construct()
    {
        $this->load->library("mongo_db");
    }

    function getBranches( ) {

        $org = $this->mongo_db
            ->where('_id', $this->session->userdata("org_id"))
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

}