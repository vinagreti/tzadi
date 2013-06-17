<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
  
  public function __construct() {
    parent::__construct();

    // ta logado
    if($this->session->userdata('userID')) {
      $companyBaseUrl = "http://".$this->session->userdata("companyNick").".".ENVIRONMENT;
      
      // se o subdominio não é o mesmo que o da sessão
      if(base_url() != $companyBaseUrl."/") {
        // redireciona para o subdominio correto
        redirect($companyBaseUrl.$_SERVER["PATH_INFO"]);
      }
    }
    // não ta logado
    else {
      // verifica se esta acessando a tzadi ou uma company 
      // e verifica se a company existe checando o nick
      if(defined('COMPANYNICK')) $this->MYcheckCompany();
    }
  }

  public function MYcheckCompany(){
      $this->load->model("company_model");
      $company = $this->company_model->getByNick(COMPANYNICK);

      // se a company existe
      if($company){
        // se a company acessada não a mesma acessada anteriormente
        if($this->session->userdata("companyNick") != COMPANYNICK){
          // reccarega as informações da company na session
          $this->session->set_userdata("companyName", $company->companyName);
          $this->session->set_userdata("companyNick", $company->companyNick);
        }
        return $company;
      }
      // se a company nao existe
      else {
        $this->session->set_flashdata('COMPANYNICK', COMPANYNICK);
        // redireciona para a tela de ecompany not found
        redirect('http://'.ENVIRONMENT.'/error/companyNotFound', 'refresh');
      }
  }
}
?>