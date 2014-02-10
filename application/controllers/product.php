<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends My_Controller {

  public function __construct() { 
    parent::__construct();
    $this->lang->load('product', $this->session->userdata('language'));
  }

  public function index()
  {
    $this->load->model("payment_model");
    $data = new StdClass();
    $data->paymentResumeHTML = $this->payment_model->getResumeHTML();
    $data->dynJS = 'product/vitrine';
    $data->view = 'product/vitrine';
    $data->page_title = "Vitrine";
    $this->page->load($data);
  }

  public function vitrineIframe()
  {
    $this->load->model("payment_model");
    $data = new StdClass();
    $data->paymentResumeHTML = $this->payment_model->getResumeHTML();
    $data->dynJS = 'product/vitrine';
    $data->view = 'product/vitrineIframe';
    $data->page_title = "Vitrine";
    $this->page->loadIframe($data);
  }
  
  public function manage()
  {

    $this->MYensureOwnProfile();
    $data = new StdClass();
    $this->lang->load('currency', $this->session->userdata('language'));
    $data->dynJS = 'product/manage';
    $data->view = 'product/manage';
    $data->page_title = lang('pdt_listTitle');
    $this->page->load($data);
  }

  public function getAll(){

    $this->MYensureOwnProfile();

    $this->load->model("product_model");

    $data = json_encode($this->product_model->getAll());

    $this->output->set_content_type('application/json');

    $this->output->set_output($data);

  }

  public function getPublic()
  {

    $this->load->model('product_model'); 

    $data = json_encode($this->product_model->getPublic());

    $this->output->set_content_type('application/json');

    $this->output->set_output($data);

  }

  public function getByID(){

    $productID = $this->input->post("productID");

    $this->load->model("product_model");

    $data = json_encode($this->product_model->getByID( $productID ) );
    
    $this->output->set_content_type('application/json');

    $this->output->set_output($data);

  }

  public function drop()
  {

    $this->MYensureOwnProfile();

    $_id = (int) $this->input->post('_id');
    if(!isset($_id)) echo json_encode(lang("pdt_idNotSent"));
    else {
      $this->load->model("product_model");
      echo json_encode($this->product_model->drop($_id));
    }
  }
  public function add()
  {

    $this->MYensureOwnProfile();

    $this->load->model("product_model");
    $data = new StdClass();
    $data->name = $this->input->post("name");
    $data->kind = $this->input->post("kind");
    if(!$data->name) $data->name = lang('pdt_newProduct');
    $newProduct = $this->product_model->add($data);
    echo json_encode($newProduct[0]);
  }

  public function makeClone()
  {

    $this->MYensureOwnProfile();

    $this->load->model("product_model");
    $newProduct = $this->product_model->makeClone($this->input->post("productID"));
    echo json_encode($newProduct);
  }

  public function set()
  {

    $this->MYensureOwnProfile();

    $data = $this->input->post();
    $this->load->model("product_model");
    echo json_encode($this->product_model->set($data));
  }
  public function attachImg()
  {

    $this->MYensureOwnProfile();
    
    $_id = (int) $this->input->post('_id');
    $this->load->model("product_model");
    $res = $this->product_model->attachImg($_id);
    echo json_encode($res);
  }

  public function view( $_id ){
    $this->load->model("product_model");
    $data = new StdClass();
    $data->product = $this->product_model->getHumanized( $_id );

    if( $data->product ){

      $data->dynJS = array('product/view', "product/product");
      $data->view = 'product/view';
      $data->page_title = $data->product["name"];

    } else {

      $data->view = 'product/notFound';
      $data->page_title = lang("pdt_NotFound");

    }

    $this->load->model("payment_model");
    $data->paymentResumeHTML = $this->payment_model->getResumeHTML();
    $data->the_head = "<link rel='image_src' href=" . $data->product['coverImg'] . " />";
    $data->the_head .= "<meta property='og:image' content='" . $data->product["coverImg"] . "' />";
    $data->the_head .= "<meta property='og:url' content='" . str_replace("/index.php", "", current_url()) . "' />";
    $data->the_head .= "<meta property='og:title' content='" . $data->product["name"] . "' />";
    if(isset($data->product["detail"])) $data->the_head .= "<meta property='og:description' content='" . $data->product["detail"] . "' />";

    $data->shareButtons = $this->load->view("tzadi/shareButtons", "", true);

    $this->page->load($data);


  }

  public function viewIframe( $_id ){
    $this->load->model("product_model");
    $data = new StdClass();
    $data->product = $this->product_model->getHumanized( $_id );

    if( $data->product ){

      $data->dynJS = array('product/view', "product/product");
      $data->view = 'product/viewIframe';
      $data->page_title = $data->product["name"];

    } else {

      $data->view = 'product/notFound';
      $data->page_title = lang("pdt_NotFound");

    }

    $this->load->model("payment_model");
    $data->paymentResumeHTML = $this->payment_model->getResumeHTML();
    $data->the_head = "<link rel='image_src' href=" . $data->product['coverImg'] . " />";
    $data->the_head .= "<meta property='og:image' content='" . $data->product["coverImg"] . "' />";
    $data->the_head .= "<meta property='og:url' content='" . str_replace("/index.php", "", current_url()) . "' />";
    $data->the_head .= "<meta property='og:title' content='" . $data->product["name"] . "' />";
    if(isset($data->product["detail"])) $data->the_head .= "<meta property='og:description' content='" . $data->product["detail"] . "' />";

    $data->shareButtons = $this->load->view("tzadi/shareButtons", "", true);

    $this->page->loadIframe($data);


  }

  public function like()
  {
    $this->load->model('product_model');
    $likes = $this->product_model->like();
    echo json_encode($likes);
  }

  public function share()
  {

    $data = $this->input->post();

    $this->load->model("product_model");

    if( isset( $data["addresses"] ) ) {

      echo json_encode($this->product_model->share($data));

    } else {

      $shareForm = $this->load->view('product/shareForm', $this->product_model->getHumanized( $data["product_id"] ), true);

      echo json_encode($shareForm);

    }

    
  }

  public function knowMore()
  {

    $data = $this->input->post();

    $this->load->model("product_model");

    if( isset( $data["address"] ) ) {

      echo json_encode($this->product_model->knowMore($data));

    } else {

      $shareForm = $this->load->view('product/knowMoreForm', $this->product_model->getHumanized( $data["product_id"] ), true);

      echo json_encode($shareForm);

    }

  }

}
/* End of file product.php */
/* Location: ./application/controllers/product.php */