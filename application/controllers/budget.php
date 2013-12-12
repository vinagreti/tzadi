<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends My_Controller {

    public function __construct() {

        parent::__construct();

        $this->lang->load('budget', $this->session->userdata('language'));

    }

    public function index()
    {

        $this->load->model("org_model");

        $this->lang->load('org', $this->session->userdata('language'));

        $data->agency = $this->org_model->getByID( $this->session->userdata("org") );

        $data->paymentResumeHTML = $this->load->view("org/paymentResume", $data->agency["payment"], true);

        $data->dynJS = array('product/budget', "product/product");

        $data->view = 'product/budget';

        $this->load->helper('date');

        $genertionTime = time();

        $data->genertionTime = time_date($genertionTime);

        $data->timelife = time_date( ($data->agency["budget"]["timelife"] * 86400) + $genertionTime);

        $data->page_title = lang('pdt_budgetTitle');

        $data->shareButtons = $this->load->view("tzadi/shareButtons", "", true);

        $this->page->load($data);

    }

    public function budgetIframe()
    {

        $this->load->model("org_model");

        $this->lang->load('org', $this->session->userdata('language'));

        $data->agency = $this->org_model->getByID( $this->session->userdata("org") );

        $data->paymentResumeHTML = $this->load->view("org/paymentResume", $data->agency["payment"], true);

        $data->dynJS = array('product/budget', "product/product");

        $data->view = 'product/budgetIframe';

        $this->load->helper('date');

        $genertionTime = time();

        $data->genertionTime = time_date($genertionTime);

        $data->timelife = time_date( ($data->agency["budget"]["timelife"] * 86400) + $genertionTime);

        $data->page_title = lang('pdt_budgetTitle');

        $data->shareButtons = $this->load->view("tzadi/shareButtons", "", true);

        $this->page->loadIframe($data);

    }

    public function conf(){

        $this->MYensureOwnProfile();

        if( $this->input->put("budgetConf") ){

            $this->load->model("org_model");

            $budgetConf = json_decode($this->input->put("budgetConf"));

            $data = json_encode( $this->org_model->setBudget( $budgetConf ) );

            $this->output->set_content_type('application/json');

            $this->output->set_output($data);

        } else {

            $this->load->model("org_model");

            $agency = $this->org_model->getByID( $this->session->userdata("org") );

            $data->budget = $agency["budget"];

            $data->dynJS = 'budget/conf';

            $data->view = 'budget/conf';

            $data->page_title = lang('org_budgetTitle');

            $this->page->load($data);

        }

    }

  public function share()
  {
    
    $data = $this->input->post();

    $this->load->model("product_model");

    if( isset( $data["addresses"] ) ) {

      echo json_encode($this->product_model->shareBudget($data));

    } else {

      $budget = $this->product_model->getBudgetResume();

      $shareBudgetForm = $this->load->view('product/shareForm', $budget, true);

      echo json_encode($shareBudgetForm);

    }

    
  }

  public function knowMore()
  {

    $data = $this->input->post();

    $this->load->model("product_model");

    if( isset( $data["address"] ) ) {

      echo json_encode($this->product_model->knowMoreBudget($data));

    } else {

      $budget = $this->product_model->getBudgetResume();

      $knowMoreBudgetForm = $this->load->view('budget/knowMoreForm', $budget, true);

      echo json_encode($knowMoreBudgetForm);

    }

  }

}

/* End of file Budget.php */
/* Location: ./application/controllers/Budget.php */