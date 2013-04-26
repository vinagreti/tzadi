<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
  
  public function __construct() {
    parent::__construct();
    if($this->session->userdata('userID')) {
      $companyBaseUrl = "http://".$this->session->userdata('companyNick').".".ENVIRONMENT;
      if(base_url() != $companyBaseUrl."/") {
        redirect($companyBaseUrl.$_SERVER["PATH_INFO"]);
      }
    }
  }

  public function MYcheckCompany(){
      $this->load->model("company_model");
      $company = $this->company_model->getByNick(COMPANYNICK);

      if($company){
        return $company;
      }
      else {
        $this->session->set_flashdata('COMPANYNICK', COMPANYNICK);
        redirect('http://'.ENVIRONMENT.'/error/companyNotFound', 'refresh');
      }
  }
}
?>