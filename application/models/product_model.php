<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll()
  {
    return $this->mongo_db
      ->where('owner', $this->session->userdata("_id"))
      ->order_by(array('name' => 'asc'))
      ->get('product');
  }

  function getByID( $_id )
  {
    $products = $this->mongo_db
      ->where('status', "active")
      ->where('_id', (int) $_id)
      ->get('product');

    if( isset($products[0]) )
      return $products[0];

    else
      return false;
  }

  function getPublic()
  {
    return $this->mongo_db
      ->where('owner', $this->session->userdata("profileID"))
      ->where('vitrine', "yes")
      ->where('status', "active")
      ->order_by(array('name' => 'asc'))
      ->get('product');
  }

  // creates a new product obj
  function add($data)
  {
    $this->load->model("mongo_model");
    $newID = $this->mongo_model->newID();

    $this->load->helper('date');
    $newProduct =  $this->mongo_db->insert(
      'product',array(
        "_id" => $newID
        ,"name" => $data->name
        ,"kind" => $data->kind
        ,"owner" => $this->session->userdata("_id")
        ,"creation" => now()
        ,"creator" => $this->session->userdata("_id")
        ,"supplier" => "0"
        ,"supplier_campus" => "0"
        ,"status" => "active"
        ,"like" => "0"
        ,"share" => "0"
        ,"vitrine" => "no"
      )
    );
    return $this->mongo_db
      ->where('_id', $newID)
      ->get('product');
  }

  function makeClone($_id){

    $res = $this->mongo_db
      ->where('_id', (int) $_id)
      ->get('product');

    $newProduct = $res[0];
    $this->load->model("mongo_model");
    $newProduct["_id"] = $this->mongo_model->newID();
    $newProduct["name"] = "(clone) - ".$newProduct["name"];
    unset($newProduct["img"]);

    $this->mongo_db->insert('product', $newProduct);

    return $newProduct;

  }

  function drop($_id){

    $products = $this->mongo_db->get('product');

    $packages = array();

    foreach($products as $product){

      if(isset($product["itens"])){

        foreach($product["itens"] as $item => $amount){

          if( (int)$item == (int)$_id ) $packages[$product["name"]] = $product["_id"];

        }

      }

    }

    if(count($packages) > 0) {

      $error = lang("pdt_cantDropUsedByPackage").":";

      foreach($packages as $name => $_id) $error .= '<br>- <a href="'.base_url().$_id.'" target="_blank">'.$name.'</a>';

    } else {

      $productCopy = $this->mongo_db
        ->where('_id', $_id)
        ->get('product');

      $deleted = $this->mongo_db->where('_id', $_id)->delete('product');

      if($deleted){

        if(isset($productCopy[0]["img"])) {

          $this->load->model("file_model");

          foreach( $productCopy[0]["img"] as $img_key => $img_id ) {

            $this->file_model->drop($img_id);

          }

        }

      }

      $error = false;

    }

    return $error;

  }

  function attachImg($_id)
  {
    $this->load->model("file_model");
    $newFile = $this->file_model->save($_id);
    $product = $this->mongo_db
      ->where('_id', $_id)
      ->get('product');
    if(isset($product[0]["img"])) {
      array_push($product[0]["img"], $newFile);
      $this->mongo_db
        ->where('_id', $_id)
        ->set("img", $product[0]["img"])
        ->update("product");
    } else {
      $this->mongo_db
        ->where('_id', $_id)
        ->set("img", array($newFile))
        ->update("product");
    }
    return $newFile;
  }

  function set($data)
  {
    $_id = (int) $data['_id'];
    unset($data['_id']);

    $error = false;

    if(isset($data["status"]) && $data["status"] == "inactive") {
      $products = $this->mongo_db
        ->where('kind', "package")
        ->get('product');

      foreach($products as $key => $product) {
        if(isset($product["itens"])){
          foreach($product["itens"] as $key2 => $value2){
            if($key2 == $_id) {
              if(!$error) $error = lang("pdt_cantInactiveUsedByPackage");
              $error .= '<br>- <a href="'.base_url()."product/view/".$product["_id"].'" target="_blank">'.$product["name"].'</a>';
            }
          }
        }
      }
    }
    
    if( ! $error ){
      if(count($data) > 0){
        $this->mongo_db
          ->where('_id', $_id)
          ->set($data)
          ->update('product');

        $error = false;
      }
      else $error = false;
    }

    return $error;


  }

  function like()
  {
    $_id = (int) $this->input->post("_id");
    
    $product = $this->mongo_db
      ->where('_id', $_id)
      ->get('product');

    $likes = (int) $product[0]["like"] + 1;

    $this->mongo_db
      ->where('_id', $_id)
      ->set("like", $likes)
      ->update('product');

    return $likes;
  }

  function getHumanized( $product_id ){

    $product = $this->mongo_db
      ->where('_id', (int) $product_id)
      ->get('product');

    if( $product ){

      $product = $product[0];

      if(!isset($product["currency"])) $product["currency"] = "USD";

      if( isset($product["price"]) && $product["price"] > 0 ) {

        $product["humanPrice"] = $product["currency"] . " " . $product["price"];

      }

      if(isset($product["courseEnrollmentFees"])) $product["courseEnrollmentFees"] = $product["currency"] . " " . $product["courseEnrollmentFees"];

      if(isset($product["courseAdministrativeFees"])) $product["courseAdministrativeFees"] = $product["currency"] . " " . $product["courseAdministrativeFees"];

      if(isset($product["courseBook"])) $product["courseBook"] = $product["currency"] . " " . $product["courseBook"];

      if(!isset($product["courseDurationScale"])) $product["courseDurationScale"] = "days";

      if(isset($product["courseDurationValue"])) $product["courseDuration"] = $product["courseDurationValue"] . " " . lang("pdt_" .$product["courseDurationScale"]);

      if(isset($product["courseKind"])) $product["courseKind"] = lang("pdt_".$product["courseKind"]);

      if(isset($product["coursePeriod"])) $product["coursePeriod"] = lang("pdt_".$product["coursePeriod"] . "Period");

      if(isset($product["courseModality"])) $product["courseModality"] = lang("pdt_".$product["courseModality"]);

      if(!isset($product["ensuranceDurationScale"])) $product["ensuranceDurationScale"] = "days";

      if(isset($product["ensuranceDurationValue"])) $product["ensuranceDuration"] = $product["ensuranceDurationValue"] . " " . lang("pdt_" .$product["ensuranceDurationScale"]);

      if(isset($product["accommodationKind"])) $product["accommodationKind"] = lang("pdt_" . $product["accommodationKind"]);

      if(isset($product["accommodationDurationScale"])) $product["accommodationDurationScale"] = "days";

      if(isset($product["accommodationDurationValue"])) $product["accommodationDuration"] = $product["accommodationDurationValue"]. " " . lang("pdt_" .$product["accommodationDurationScale"]);

      if(isset($product["accommodationFood"])) $product["accommodationFood"] = lang("pdt_" . $product["accommodationFood"]);

      if(isset($product["passTransportKind"])) $product["passTransportKind"] = lang("pdt_" . $product["passTransportKind"]);
      
      if(isset($product["workKind"])) $product["workKind"] = lang("pdt_" . $product["workKind"]);

      if(isset($product["img"])) $product["coverImg"] = base_url()."file/open/".$product["img"][0];

      else $product["coverImg"] = base_url()."assets/img/no_photo_160x120.png";

      if(isset($product["itens"])) {

        $itens = array();

        foreach($product["itens"] as $product_id => $amount){

          $productItem = $this->mongo_db
            ->where('_id', (int) $product_id)
            ->select("name")
            ->get('product');

          $productItem[0]["amount"] = $amount;

          array_push($itens, $productItem[0]);

        }

        $product["itens"] = $itens;

      }

      return $product;

    } else {

      return false;

    }

  }

  function share( $data )
  {

    $product = $this->getHumanized( $data["product_id"] );

    $this->load->model("file_model");

    $this->load->helper('email');

    $this->load->model('customer_model');

    $addresses = explode( ",", preg_replace('/\s+/', '', $data["addresses"] ) );

    foreach( $addresses as $key => $email ){

      if ( valid_email( $email ) ) {

        $customer_id = $this->customer_model->getOrCreate( $email );

        $address = $data["addresses"];

        $mailContent['subject'] = $data["name"] . " " . lang("pdt_shareIndicated") . ": " . $product["name"];

        $mail->message = $data["message"];
        
        $mail->product = $product;

        $mailContent["message"] = $this->load->view("product/shareMail", $mail, true);

        $mailContent["to"] = $email;

        if( isset( $product["img"][0] ) ) {

          $mailContent["attach"] = base_url().'file/open/'.$product["img"][0];

        } else {

          $mailContent["attach"] = base_url().'assets/img/no_photo_160x120.png';

        }

        $mailContent["bcc"] = $this->session->userdata("profileEmail");

        $mailContent["kind"] = "product/share";

        $this->load->model('mail_model');

        $mail_id = $this->mail_model->queue($mailContent);

        $action->kind = "product/share";

        if( $this->session->userdata("ownProfile") )
          $action->staff_id = $this->session->userdata("_id");

        else if( $this->session->userdata("_id") )
          $action->user_id = $this->session->userdata("_id");

        $action->mail_id = $mail_id;

        $this->customer_model->addTimeline( $customer_id, $action );

      }

    }

    return array( "success" => lang("pdt_shared") );

  }

  function knowMore( $data )
  {

    $product = $this->getHumanized( $data["product_id"] );

    $this->load->model("file_model");
    
    $this->load->helper('email');

    $this->load->model('customer_model');

    $email = preg_replace('/\s+/', '', $data["address"] );

    if ( valid_email( $email ) ) {

      $customer_id = $this->customer_model->getOrCreate( $email );

      $address = $data["address"];

      $mailContent['subject'] = $data["name"] . " " . lang("pdt_wantsToKnowMoreAbout") . ": " . $product["name"];

      $mail->questions = $data["questions"];
      
      $mail->product = $product;

      $mailContent["message"] = $this->load->view("product/knowMoreMail", $mail, true);

      $mailContent["to"] = $email;

      if( isset( $product["img"][0] ) ) {

        $mailContent["attach"] = base_url().'file/open/'.$product["img"][0];

      } else {

        $mailContent["attach"] = base_url().'assets/img/no_photo_160x120.png';

      }

      $mailContent["bcc"] = $this->session->userdata("profileEmail");

      $mailContent["kind"] = "product/knowMore";

      $this->load->model('mail_model');

      $mail_id = $this->mail_model->queue($mailContent);

      $action->kind = "product/knowMore";

      if( $this->session->userdata("ownProfile") )
        $action->staff_id = $this->session->userdata("_id");

      else if( $this->session->userdata("_id") )
        $action->user_id = $this->session->userdata("_id");

      $action->mail_id = $mail_id;

      $this->customer_model->addTimeline( $customer_id, $action );

      return array( "success" => lang("pdt_questionsSent") );

    } else {

      return array( "error" => lang("pdt_fillValidEmail") );

    }

  }

  function getBudgetResume()
  {

    $this->load->helper('cookie');

    $tzdBudget = json_decode( get_cookie( 'tzdBudget'.$this->session->userdata('profileID') ), true );

    $budget->itens = array();

    $budget->price = 0;

    foreach( $tzdBudget as $product_id => $amount ) {

      $product = $this->getBudgetItenHumanized( $product_id, $amount );

      if( $product ){

        $budget->price += $product["totalPrice"];

        $product["budgetAmount"] = $amount;

        array_push($budget->itens, $product );

      }
        

    }

    $tzdCurrency = json_decode( get_cookie( 'tzdCurrency' ), true );

    $budget->price = $tzdCurrency["base"] . " " . round($budget->price, 2);

    return $budget;

  }

  function getBudgetItenHumanized( $product_id, $amount ) {

    $product = $this->mongo_db
      ->where('_id', (int) $product_id)
      ->select(array("name", "price", "currency", "_id"))
      ->get('product');

    if( $product ){

      $product = $product[0];

      if( isset($product["price"]) && $product["price"] > 0 ) {

        $tzdCurrency = json_decode( get_cookie( 'tzdCurrency' ), true );

        $fullTotalPrice = $this->convertCurrency($product["price"], $product["currency"] );

        $product["totalPrice"] = round($fullTotalPrice, 2);

        $product["humanPrice"] = $tzdCurrency["base"] . " " . ( $product["totalPrice"] );

      } else {

        $product["totalPrice"] = 0;

        $product["humanPrice"] = 0;

      }

      return $product;

    }
      

    else
      return false;

  }

  function convertCurrency( $amount, $base ) {

    $tzdCurrency = json_decode( get_cookie( 'tzdCurrency' ), true );

    $euros = $amount / $tzdCurrency[ $base ];

    $total = $euros * $tzdCurrency[ $tzdCurrency["base"] ];

    return $total;

  }

}
