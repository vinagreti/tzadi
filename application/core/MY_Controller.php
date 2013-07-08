<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
  
  public function __construct() {
    parent::__construct();

    // ta logado
    if($this->session->userdata('userID')) {
      $companyBaseUrl = "http://".$this->session->userdata("companySubdomain").".".ENVIRONMENT;
      
      // se o subdominio não é o mesmo que o da sessão
      if(base_url() != $companyBaseUrl."/") {
        // redireciona para o subdominio correto
        redirect($companyBaseUrl.$_SERVER["PATH_INFO"]);
      }
    }
    // não ta logado
    else {
      // verifica se esta acessando a tzadi ou uma company 
      // e verifica se a company existe checando o subdomain
      if(defined('COMPANYSUBDOMAIN')) $this->MYcheckCompany();
    }
  }

  public function MYcheckCompany(){
    // verifica se os dados da company existem na sessao
    // verifica se a company acessada é diferente da acessada anteriormente
    if(!$this->session->userdata("companySubdomain") || $this->session->userdata("companySubdomain") != COMPANYSUBDOMAIN) {
      // busca os dados da nova company no banco
      $this->load->model("company_model");
      $company = $this->company_model->getBySubdomain(COMPANYSUBDOMAIN);
      // se a company existe
      if($company){
        // reccarega as informações da company na session
        $this->session->set_userdata("companyName", $company["name"]);
        $this->session->set_userdata("companySubdomain", $company["subdomain"]);
        $this->session->set_userdata("companyID", $company["_id"]);
      } else {
        $this->session->set_flashdata('COMPANYSUBDOMAIN', COMPANYSUBDOMAIN);
        // redireciona para a tela de ecompany not found
        redirect('http://'.ENVIRONMENT.'/error/companyNotFound', 'refresh');
      }
    }
  }
}
?>