<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
  
  public function __construct() {
    parent::__construct();

    $this->handleSSL();

    $this->setUserKind();

    $this->detectUnfinishedSignup();

    $this->ensureRigthSubdomain();

    $this->detectLanguage();

    $this->loadGlobalLanguageFiles();

    $this->loadCurrency();

    $this->loadCompanyInfo();

  }

  private function handleSSL(){

    $sslMethods = array("signup"
      , "login"
      , "facebookAuthenticate"
      , "linkedinAuthenticate"
      , "googleAuthenticate"
      );

    if( ENVIRONMENT == "tzadi.com" ) {

      if( in_array($this->router->method, $sslMethods) && strpos(current_url(),'https') === false ){

        $url  = str_replace("http", "https", current_url());

        $url  = str_replace("/index.php", "", $url);

        if(defined('SUBDOMAIN')) $url  = str_replace( SUBDOMAIN.".", "", $url);

        redirect($url);
        
      } else if( ! in_array($this->router->method, $sslMethods) && strpos(current_url(),'https') !== false ){

        $url  = str_replace("https", "http", current_url());

        $url  = str_replace("/index.php", "", $url);

        if(defined('SUBDOMAIN')) $url  = str_replace( SUBDOMAIN.".", "", $url);

        redirect($url);

      }
    } else if( strpos(current_url(),'https') !== false ) {

      $url  = str_replace("https", "http", current_url());

      $url  = str_replace("/index.php", "", $url);

      redirect($url);

    } 

    if( in_array($this->router->method, $sslMethods) && defined('SUBDOMAIN') ){

      $url  = str_replace( SUBDOMAIN.".", "",  current_url());

      $url  = str_replace("/index.php", "", $url);

      redirect($url);

    }

  }

  private function setUserKind(){

    if( ! $this->session->userdata('userKind') )
      $this->session->set_userdata("userKind", "tzadi");

  }

  private function detectUnfinishedSignup(){

    if( $this->session->userdata('userKind') == "new") {

      if($this->router->method != "finishSignup" && $this->router->method != "logout" && $this->router->method != "changeLang")
        redirect(base_url()."user/finishSignup");

    }

  }

  private function ensureRigthSubdomain(){

    if($this->session->userdata('userKind') == "agency") {

      $agencySubdomain = "http://".$this->session->userdata("agencySubdomain").".".ENVIRONMENT;
      
      if(base_url() != $agencySubdomain."/")
        redirect($agencySubdomain.$_SERVER["PATH_INFO"]);

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

  private function loadCompanyInfo(){

    if(defined('SUBDOMAIN')) {

      if(!$this->session->userdata("agencySubdomain") || $this->session->userdata("agencySubdomain") != SUBDOMAIN) {
        
        $this->load->model("agency_model");
        
        $agency = $this->agency_model->getBySubdomain(SUBDOMAIN);

        if($agency){

          $this->session->set_userdata("agencyName", $agency["name"]);
          
          $this->session->set_userdata("agencySubdomain", $agency["subdomain"]);
          
          $this->session->set_userdata("agencyID", $agency["_id"]);
        
        } else {
          
          $this->session->set_flashdata('SUBDOMAIN', SUBDOMAIN);
          
          redirect('http://'.ENVIRONMENT.'/error/agencyNotFound', 'refresh');

        }

      }

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

          $this->session->set_userdata('language', "en");

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