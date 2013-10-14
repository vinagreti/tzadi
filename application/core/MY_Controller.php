<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
  
  public function __construct() {
    parent::__construct();

    $this->defineOrganization();

    $this->handleSSL();

    $this->setUserKind();

    $this->setUserCurrencyBase();

    $this->detectUnfinishedSignup();

    $this->detectLanguage();

    $this->loadGlobalLanguageFiles();

    $this->loadCurrency();

  }

  private function defineOrganization(){

    $subdomain = rtrim(strstr($_SERVER["HTTP_HOST"], ENVIRONMENT, true), '.');

    if( $subdomain == "www" )
      redirect('https://'.ENVIRONMENT, 'refresh');

    if( $subdomain ) {

      define('ORG_ID', $subdomain);

      $this->load->model("org_model");
      
      $org = $this->org_model->getByID(ORG_ID);

      if($org){

        print_r($org);

        break;

        if( $org["_id"] == $this->session->userdata("org_id") )
          $this->session->set_userdata("myOrg", true);

        else
          $this->session->set_userdata("myOrg", false);

        $this->session->set_userdata("org", $org["_id"]);

        $this->session->set_userdata("orgName", $org["name"]);

        $this->session->set_userdata("orgImg", $org["img"]);

        $this->session->set_userdata("orgKind", $org["kind"] );

        $this->session->set_userdata("orgEmail", $org["email"] );

        if( isset( $org["exchangeRate"] ) )
          $this->session->set_userdata("orgExchangeRate", $org["exchangeRate"]);

        else
          $this->session->set_userdata("orgExchangeRate", false);

      } else if( $this->router->method != "identityNotFound" ) {
        
        redirect('https://'.ENVIRONMENT.'/error/identityNotFound/?identity='.ORG_ID, 'refresh');

      }

    } else {

      $this->session->set_userdata("myOrg", false);
      
    }

  }

  private function handleSSL(){

    if( ENVIRONMENT == "tzadi.com" ){

      if( defined('ORG_ID') && strpos(current_url(),'https') !== false ) {

        $section  = str_replace("/index.php", "", $_SERVER['REQUEST_URI']);

        redirect("http://".ENVIRONMENT.$section);

      }

      if ( ! defined('ORG_ID') && strpos(current_url(),'https') === false ) {

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

    if( $this->session->userdata('status') == "new") {

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

  public function MYensureOwnProfile(){

    if( ! $this->session->userdata("myOrg") ){

      $reffer  = str_replace("/index.php", "", current_url());

      $this->session->set_userdata('lastPage', $reffer);

      redirect("http://".ENVIRONMENT."/".lang("rt_login"));

    }
    
  }

  public function MYensureLogged(){

    if( ! $this->session->userdata("_id") ){

      $reffer  = str_replace("/index.php", "", current_url());

      $this->session->set_userdata('lastPage', $reffer);

      redirect("http://".ENVIRONMENT."/".lang("rt_login"));

    }
    
  }

}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */