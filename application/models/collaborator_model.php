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

    $data["_id"] = $this->mongo_model->newID();
    $data["about"] = "";
    $data["img"] = assets_url("img/no_photo_640x480.png");
    $data["org_branch"] = 6;
    $data["org_id"] = $this->session->userdata("org_id");
    $data["org_kind"] = $this->session->userdata("org_kind");
    $data["org_resp"] = "seller";
    $data["register"] = time();
    $data["password"] = md5( $data["password"] );

    $res = $this->mongo_db
      ->where(array(
        'org_id' => $data["org_id"]
        , 'email' => $data["email"]
        ))
      ->get('user');

    if( ! $res ) {

      $this->mongo_db->insert('user', $data);

      return array(
        "success" => "Criado com sucesso"
        , "collaborator" => $this->mongo_db->where( 'email' , $data["email"] )->get('user')
      );

    } else {

      return array("error", $data["email"] . " ja está em uso - traduzir");

    }

  }

}
