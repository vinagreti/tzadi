<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
  
  public function __construct() {
    parent::__construct();

    $this->defineIdentity();

    $this->handleSSL();

    $this->setUserKind();

    $this->detectUnfinishedSignup();

    $this->detectLanguage();

    $this->loadGlobalLanguageFiles();

    $this->loadCurrency();

  }

  private function defineIdentity(){

    $subdomain = rtrim(strstr($_SERVER["HTTP_HOST"], ENVIRONMENT, true), '.');

    if( $subdomain ) {

      define('IDENTITY', $subdomain);

      $this->load->model("user_model");
      
      $user = $this->user_model->getByIdentity(IDENTITY);

      if($user){

        if( $user["_id"] == $this->session->userdata("_id") )
          $this->session->set_userdata("ownProfile", true);

        else
          $this->session->set_userdata("ownProfile", false);

        $this->session->set_userdata("profileIdentity", IDENTITY);

        $this->session->set_userdata("profileID", $user["_id"]);

        $this->session->set_userdata("profileName", $user["name"]);

        $this->session->set_userdata("profileImg", $user["img"]);

        $this->session->set_userdata("profileKind", $user["kind"] );
       
      } else if( $this->router->method != "identityNotFound" ) {
        
        $this->session->set_flashdata('IDENTITY', IDENTITY);

        if( defined("IDENTITY") )
          redirect('http://'.$this->session->userdata("identity").".".ENVIRONMENT.'/error/identityNotFound', 'refresh');

        else
          redirect('http://'.ENVIRONMENT.'/error/identityNotFound', 'refresh');

      }

    } else {

      $this->session->set_userdata("ownProfile", false);
      
    }

  }

  private function handleSSL(){

    if( ENVIRONMENT == "tzadi.com" ){

      if( defined('IDENTITY') && strpos(current_url(),'https') !== false ) {

        $url  = str_replace("https", "http", current_url());

        $url  = str_replace("/index.php", "", $url);

        redirect($url);

      }

      if ( ! defined('IDENTITY') && strpos(current_url(),'https') === false ) {

        $url  = str_replace("http", "https", current_url());

        $url  = str_replace("/index.php", "", $url);

        redirect($url);

      }

    } else if( strpos(current_url(),'https') !== false ){

      $url  = str_replace("https", "http", current_url());

      $url  = str_replace("/index.php", "", $url);

      redirect($url);

    }



  }

  private function setUserKind(){

    if( ! $this->session->userdata('kind') )
      $this->session->set_userdata("kind", "tzadi");

  }

  private function detectUnfinishedSignup(){

    if( $this->session->userdata('kind') == "new") {

      $publicMethods = array("finishSignup"
          , "logout"
          , "changeLang"
          , "changeImg"
          , "open"
          , "resetDatabase"
          );

      if( ! in_array(  $this->router->method, $publicMethods ) )
        redirect(base_url()."user/finishSignup");

    }

  }

  private function loadCurrency(){

    $this->load->helper('cookie');

    $currency = $this->input->cookie("tzdCurrency");

    if( ! $currency ) {

      $expire = strtotime('tomorrow') - time() + 300;

      $this->load->model("currency_model");

      $currency = $this->currency_model->getToday();

      $currency["base"] = "BRL";

      $cookie = array(
        'name'   => 'tzdCurrency'
        , 'value'  => json_encode( $currency )
        , 'expire' => $expire
      );

      $this->input->set_cookie($cookie);

    }

  }

  private function detectLanguage(){

    if( ! $this->session->userdata('language') ) {

      $language = explode(';',$_SERVER["HTTP_ACCEPT_LANGUAGE"]);

      $language = explode('-', $language[0]);

      $language = explode(',', $language[0]);

      switch ($language[0]) {

        case 'pt':

          $this->session->set_userdata('language', "pt");

          break;

        default:

          $this->session->set_userdata('language', "pt");

          break;

      }

    }

  }

  private function loadGlobalLanguageFiles(){

    $this->lang->load('template', $this->session->userdata('language'));

    $this->lang->load('route', $this->session->userdata('language'));

  }

}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */