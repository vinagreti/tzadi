<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_Model extends CI_Model {

  function write( $data )
  {

    if( isset( $data["title"] ) && isset( $data["text"] ) ) {

      $this->load->library("tzd_string");

      $url = $this->tzd_string->urlEncode( $data["title"] );

      $urlExist = $this->getByUrl( $url );

      if( $urlExist ) $url .= "-".time();

      $this->load->model("mongo_model");

      $_id = $this->mongo_model->newID();

      $this->load->helper('date');

      $this->mongo_db->insert('blog',
        array(
          "_id" => $_id
          , "title" => $data["title"]
          , "subtitle" => $data["subtitle"]
          , "text" => $data["text"]
          , "date" => now()
          , "url" => $url
          , "author" => $this->session->userdata("_id")
        )
      );

      $res = array("url" => base_url()."blog/".lang("rt_edit")."/".$url);

    } else {

      $res = array("error" => "Por favor, informe o título e o texto do artigo.");

    }

    return $res;
    
  }

  function news()
  {

    $news = $this->mongo_db
      ->select(array("title", "date", "subtitle", "url"))
      ->where("author", $this->session->userdata("_id"))
      ->order_by(array('date'=>'desc'))
      ->get('blog');

    if( $news )
      return $news;

    else
      return false;

  }

  function getLast()
  {

    $post = $this->mongo_db
      ->where("author", $this->session->userdata("_id"))
      ->limit(1)
      ->order_by(array('date'=>'desc'))
      ->get('blog');

    if( $post ){

      $user = $this->mongo_db
        ->where(array(
          "_id" => $post[0]["author"]
          )
        )
        ->get('user');

      $post[0]["author"] = $user[0];

      return $post[0];
    
    } else
      return false;

  }

  function getByUrl( $url ){

      $post = $this->mongo_db
        ->where(
          array(
            "url" => $url
            , "author" => $this->session->userdata("_id")
          )
        )
        ->get('blog');

      if($post) {

        $user = $this->mongo_db
          ->where(array(
            "_id" => $post[0]["author"]
            )
          )
          ->get('user');

        $post[0]["author"] = $user[0];

        return $post[0];

      } else
        return false;

  }

  function update( $data )
  {

    if( isset( $data["title"] ) && isset( $data["text"] ) ) {

      $this->load->library("tzd_string");

      $oldUrl = $data["url"];

      $data["url"] = $this->tzd_string->urlEncode( $data["title"] );

      $post = $this->mongo_db
        ->where( array( 
          "url" => $oldUrl
          , "author" => $this->session->userdata("_id") ) )
        ->set($data)
        ->update("blog");

      if( $post )
        $res = array("url" => base_url()."blog/".lang("rt_edit")."/".$data["url"]);

      else
        $res = array("error" => "Este artigo não é seu ou não exite.");

    } else {

      $res = array("error" => "Por favor, informe o título e o texto do artigo.");

    }

    return $res;

  }

  function drop( $data )
  {

    $own = $post = $this->mongo_db
      ->where( array( 
          "url" => $data["url"]
          , "author" => $this->session->userdata("_id") ) )
      ->get('blog');

    if( $own ) {

      $this->mongo_db
        ->where( array( 
          "url" => $data["url"]
          , "author" => $this->session->userdata("_id") ) )
        ->delete('blog');
        
      return array("url" => base_url()."blog/".lang("rt_posts"));
    }

    else
      return array("error" => "Este artigo não é seu ou não exite.");

  }

}
