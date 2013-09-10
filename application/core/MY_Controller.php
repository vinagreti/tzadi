<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
  
  public function __construct() {
    parent::__construct();

    $this->defineIdentity();

    $this->handleSSL();

    $this->setUserKind();

    $this->setUserCurrencyBase();

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

        $this->session->set_userdata("profileEmail", $user["email"] );

        if( isset( $user["exchangeRate"] ) )
          $this->session->set_userdata("profileExchangeRate", $user["exchangeRate"]);

        else
          $this->session->set_userdata("profileExchangeRate", false);

      } else if( $this->router->method != "identityNotFound" ) {
        
        redirect('https://'.ENVIRONMENT.'/error/identityNotFound/?identity='.IDENTITY, 'refresh');

      }

    } else {

      $this->session->set_userdata("ownProfile", false);
      
    }

  }

  private function handleSSL(){

    if( ENVIRONMENT == "tzadi.com" ){

      if( defined('IDENTITY') && strpos(current_url(),'https') !== false ) {

        $section  = str_replace("/index.php", "", $_SERVER['REQUEST_URI']);

        redirect("http://".ENVIRONMENT.$section);

      }

      if ( ! defined('IDENTITY') && strpos(current_url(),'https') === false ) {

        $section  = str_replace("/index.php", "", $_SERVER['REQUEST_URI']);

        redirect("https://".ENVIRONMENT.$section);

      }

    } else if( strpos(current_url(),'https') !== false ){

      $section  = str_replace("/index.php", "", $_SERVER['REQUEST_URI']);

      redirect("http://".ENVIRONMENT.$section);

    }



  }

  private function setUserKind(){

    if( ! $this->session->userdata('kind') )
      $this->session->set_userdata("kind", "tzadi");

  }

  private function setUserCurrencyBase(){

    if( ! $this->session->userdata('currencyBase') )
      $this->session->set_userdata("currencyBase", "BRL");

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

    $expire = strtotime('tomorrow') - time() + 300;

    $this->load->model("currency_model");

    $currency = $this->currency_model->getProfileCurrency();

    $currency["base"] = $this->session->userdata("currencyBase");

    $cookie = array(
      'name'   => 'tzdCurrency'
      , 'value'  => json_encode( $currency )
      , 'expire' => $expire
    );

    $this->input->set_cookie($cookie);

  }

  private function detectLanguage(){

    if( ! $this->session->userdata('language') && isset( $_SERVER["HTTP_ACCEPT_LANGUAGE"] ) ) {

      $language = explode(';',$_SERVER["HTTP_ACCEPT_LANGUAGE"]);

      $language = explode('-', $language[0]);

      $language = explode(',', $language[0]);

      switch ($language[0]) {

        case 'pt':

          $this->session->set_userdata('language', "pt");

          break;

        case 'en':

          $this->session->set_userdata('language', "en");

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