<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends My_Controller {

    public function __construct() {

        parent::__construct();

        $this->lang->load('budget', $this->session->userdata('language'));

    }

    public function index(){

        $this->view();

    }

    public function view( ) {

        $this->load->model("payment_model");

        $data = new StdClass();

        $data->paymentResumeHTML = $this->payment_model->getResumeHTML();

        $data->dynJS = array('budget/index', "product/product");

        $data->view = 'budget/index';

        $this->load->helper('date');

        $genertionTime = time();

        $data->genertionTime = time_date($genertionTime);

        $this->load->model("budget_model");

        $budget = $this->budget_model->getBudget();

        $data->timelife = time_date( ($budget["timelife"] * 86400) + $genertionTime);

        $data->page_title = lang('bdg_Title');

        $data->shareButtons = $this->load->view("tzadi/shareButtons", "", true);

        $this->page->load($data);

    }

    public function printing( ) {

        $this->load->model("payment_model");

        $data = new StdClass();

        $data->paymentResumeHTML = $this->payment_model->getResumeHTML();

        $data->dynJS = array('budget/printing', "product/product");

        $data->view = 'budget/printing';

        $this->load->helper('date');

        $genertionTime = time();

        $data->genertionTime = time_date($genertionTime);

        $this->load->model("budget_model");

        $budget = $this->budget_model->getBudget();

        $data->timelife = time_date( ($budget["timelife"] * 86400) + $genertionTime);

        $data->page_title = lang('bdg_Title');

        $data->shareButtons = $this->load->view("tzadi/shareButtons", "", true);

        $this->page->load($data);

    }

    public function budgetIframe(){

        $this->load->model("payment_model");

        $data = new StdClass();

        $data->paymentResumeHTML = $this->payment_model->getResumeHTML();

        $data->dynJS = array('budget/index', "product/product");

        $data->view = 'budget/budgetIframe';

        $this->load->helper('date');

        $genertionTime = time();

        $data->genertionTime = time_date($genertionTime);

        $this->load->model("budget_model");

        $budget = $this->budget_model->getBudget();

        $data->timelife = time_date( ($budget["timelife"] * 86400) + $genertionTime);

        $data->page_title = lang('bdg_Title');

        $data->shareButtons = $this->load->view("tzadi/shareButtons", "", true);

        $this->page->loadIframe($data);

    }

    public function conf(){

        $this->MYensureOwnProfile();

        $this->load->model("budget_model");

        if( $this->input->put("budgetConf") ){

            $budgetConf = json_decode($this->input->put("budgetConf"));

            $data = json_encode( $this->budget_model->setBudget( $budgetConf ) );

            $this->output->set_content_type('application/json');

            $this->output->set_output($data);

        } else {

            $data = new StdClass();

            $data->budget = $this->budget_model->getBudget();

            $data->dynJS = 'budget/conf';

            $data->view = 'budget/conf';

            $data->page_title = lang('bdg_Title');

            $this->page->load($data);

        }

    }

    public function share(){

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

    public function knowMore(){

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