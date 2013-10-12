<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collaborator_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll( $company = "" ) {

    $collaborators = $this->mongo_db
      ->order_by( array("name" => "asc") )
      ->where('org_id', $this->session->userdata("org_id"))
      ->get('user');

    if($collaborators)
        return array("success" => true, "collaborators" => $collaborators);

    else
        return array("error" => "org_id da sessão do usuário nao corresponde a nenhuma organização");


  }

  public function add( $data ){

    $this->load->model("mongo_model");

    $data["email"] = strtolower( $data["email"] );

    $data["_id"] = $this->mongo_model->newID();

    $data["about"] = "";

    $data["img"] = assets_url("img/no_photo_640x480.png");

    $data["creator_id"] = $this->session->userdata("_id");

    $data["org_id"] = $this->session->userdata("org_id");

    $data["org_kind"] = $this->session->userdata("org_kind");

    $data["register"] = time();

    $data["status"] = "active";

    $data["password"] = md5( "bradesco" );

    $res = $this->mongo_db->where('email', $data["email"])->get('user');

    if( ! $res ) {

      $this->mongo_db->insert('user', $data);

      return array(
        "success" => "Criado com sucesso"
        , "collaborator" => $this->mongo_db->where( 'email' , $data["email"] )->get('user')
      );

    } else {

      return array("error" => $data["email"] . " ja está em uso - traduzir");

    }

  }

}
