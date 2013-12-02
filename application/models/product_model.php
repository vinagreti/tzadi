<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model {

  function __construct()
  {
    $this->load->library("mongo_db");
  }

  function getAll()
  {
    return $this->mongo_db
      ->where('org_id', $this->session->userdata("org_id"))
      ->order_by(array('name' => 'asc'))
      ->get('product');
  }

  function getByID( $_id )
  {
    $products = $this->getHumanized( $_id );

    if( isset($products) )
      return $products;

    else
      return false;
  }

  function getPublic()
  {
    return $this->mongo_db
      ->where('org_id', $this->session->userdata("org"))
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
        ,"org_id" => $this->session->userdata("org_id")
        ,"org_branch" => $this->session->userdata("org_branch")
        ,"creation" => now()
        ,"creator" => $this->session->userdata("_id")
        ,"supplier" => "0"
        ,"supplier_campus" => "0"
        ,"status" => "active"
        ,"like" => "0"
        ,"share" => "0"
        ,"vitrine" => "no"
        ,"price" => 0
        ,"purchase" => 0
        ,"currency" => $this->session->userdata("currencyBase")
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

      $currencyBase = $this->session->userdata("currencyBase");

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

      if( ! isset($product["accommodationDurationScale"]) ) $product["accommodationDurationScale"] = "days";

      if(isset($product["accommodationDurationValue"])) $product["accommodationDuration"] = $product["accommodationDurationValue"]. " " . lang("pdt_" .$product["accommodationDurationScale"]);

      if(isset($product["accommodationFood"])) $product["accommodationFood"] = lang("pdt_" . $product["accommodationFood"]);

      if(isset($product["passTransportKind"])) $product["passTransportKind"] = lang("pdt_" . $product["passTransportKind"] . "TransportKind");
      
      if(isset($product["workKind"])) $product["workKind"] = lang("pdt_" . $product["workKind"]);

      if(isset($product["img"])) $product["coverImg"] = base_url()."file/open/".$product["img"][0];

      else $product["coverImg"] = base_url()."assets/img/no_photo_160x120.png";

      if(isset($product["itens"])) {

        $itens = array();

        $product["price"] = 0;

        $product["currency"] = $currencyBase;

        foreach($product["itens"] as $product_id => $amount){

          $productItem = $this->mongo_db
            ->where('_id', (int) $product_id)
            ->select("name")
            ->get('product');

          $productItem[0]["amount"] = $amount;

          $product["price"] += $this->convertCurrencyTo( $productItem[0]["price"] * $amount, $productItem[0]["currency"], $currencyBase );

          $product["price"] -= $this->convertCurrencyTo( $productItem[0]["discount"] * $amount, $productItem[0]["discountCurrency"], $currencyBase );

          array_push($itens, $productItem[0]);

        }

        $product["itens"] = $itens;

      }

      $product["price"] = number_format( $product["price"], 2, '.', '');

      $product["currency"] = isset($product["currency"]) ? $product["currency"] : $currencyBase;

      $product["discount"] = isset($product["discount"]) ? $product["discount"] : 0;

      $product["discountCurrency"] = isset($product["discountCurrency"]) ? $product["discountCurrency"] : $currencyBase;

      $product["humanPrice"] = $product["currency"] . " " . $product["price"];

      $discountConverted = $this->convertCurrencyTo( $product["discount"], $product["discountCurrency"], $product["currency"] );

      $priceWithDiscount = $product["price"] - $discountConverted;

      $product["priceWithDiscount"] = $product["currency"] . " " . number_format( $priceWithDiscount, 2, '.', '');

      $product["priceFinal"] = $priceWithDiscount;

      $product["priceConverted"] = $currencyBase . " " . number_format( $this->convertCurrency( $priceWithDiscount, $product["currency"] ), 2, '.', '');

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

        $mailContent["bcc"] = $this->session->userdata("orgEmail");

        $mailContent["kind"] = "product/share";

        $this->load->model('mail_model');

        $mail_id = $this->mail_model->queue($mailContent);

        $event->kind = "product/share";

        if( $this->session->userdata("myOrg") )
          $event->collaborator_id = $this->session->userdata("_id");

        else if( $this->session->userdata("_id") )
          $event->user_id = $this->session->userdata("_id");

        $event->mail_id = $mail_id;

        $event->mail_subject = $mailContent["subject"];

        $event->customer_id = $customer_id;

        if( $this->session->userdata("myOrg") )
          $event->creator_id = $this->session->userdata("_id");

        else
          $event->creator_id = "customer";

        $this->customer_model->addTimeline( $event );

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

      $mailContent["bcc"] = $this->session->userdata("orgEmail");

      $mailContent["kind"] = "product/knowMore";

      $this->load->model('mail_model');

      $mail_id = $this->mail_model->queue($mailContent);

      $event->kind = "product/knowMore";

      if( $this->session->userdata("myOrg") )
        $event->collaborator_id = $this->session->userdata("_id");

      else if( $this->session->userdata("_id") )
        $event->user_id = $this->session->userdata("_id");

      $event->mail_id = $mail_id;

      $event->mail_subject = $mailContent['subject'];

      $event->customer_id = $customer_id;

      if( $this->session->userdata("myOrg") )
        $event->creator_id = $this->session->userdata("_id");

      else
        $event->creator_id = "customer";

      $this->customer_model->addTimeline( $event );

      return array( "success" => lang("pdt_questionsSent") );

    } else {

      return array( "error" => lang("pdt_fillValidEmail") );

    }

  }

  function getBudgetResume()
  {

    $this->load->helper('cookie');

    $tzdBudget = json_decode( get_cookie( 'tzd_budget_'.$this->session->userdata('org') ), true );

    $budget->itens = array();

    $budget->price = 0;

    foreach( $tzdBudget as $product_id => $amount ) {

      $product = $this->getHumanized( $product_id, $amount );

      if( $product ){

        $budget->price += $this->convertCurrency( $product["priceFinal"], $product["currency"] );

        $product["budgetAmount"] = $amount;

        array_push($budget->itens, $product );

      }
        

    }

    $budget->price = $this->session->userdata("currencyBase") . " " . number_format($budget->price, 2, '.', '');

    $this->load->helper('date');
    $this->lang->load('org', $this->session->userdata('language'));
    $genertionTime = time();
    $budget->genertionTime = time_date($genertionTime);
    $budget->timelife = time_date( ($this->session->userdata("orgBudgetTimelife") * 86400) + $genertionTime);

    return $budget;

  }

  function convertCurrency( $amount, $base ) {

    $tzd_currency = json_decode( get_cookie( 'tzd_currency' ), true );

    $euros = $amount / $tzd_currency[ $base ];

    $total = $euros * $tzd_currency[ $this->session->userdata("currencyBase") ];

    return $total;

  }

  function convertCurrencyTo( $amount, $base, $to ) {

    $tzd_currency = json_decode( get_cookie( 'tzd_currency' ), true );

    $euros = $amount / $tzd_currency[ $base ];

    $total = $euros * $tzd_currency[ $to ];

    return $total;

  }

  function shareBudget( $data )
  {

    $budget = $this->getBudgetResume();

    $this->load->model("file_model");

    $this->load->helper('email');

    $this->load->model('customer_model');

    $addresses = explode( ",", preg_replace('/\s+/', '', $data["addresses"] ) );

    foreach( $addresses as $key => $email ){

      if ( valid_email( $email ) ) {

        $customer_id = $this->customer_model->getOrCreate( $email );

        $address = $data["addresses"];

        $mailContent['subject'] = $data["name"] . " " . lang("pdt_sharedABudgetWithYou");

        $mail->message = $data["message"];
        
        $mail->budget = $budget;

        $mailContent["message"] = $this->load->view("product/shareBudgetMail", $mail, true);

        $mailContent["to"] = $email;

        $mailContent["bcc"] = $this->session->userdata("orgEmail");

        $mailContent["kind"] = "product/shareBudget";

        $this->load->model('mail_model');

        $mail_id = $this->mail_model->queue($mailContent);

        $event->kind = "product/shareBudget";

        if( $this->session->userdata("myOrg") )
          $event->collaborator_id = $this->session->userdata("_id");

        else if( $this->session->userdata("_id") )
          $event->user_id = $this->session->userdata("_id");

        $event->mail_id = $mail_id;

        $event->mail_subject = $mailContent['subject'];

        $event->customer_id = $customer_id;

        if( $this->session->userdata("myOrg") )
          $event->creator_id = $this->session->userdata("_id");

        else
          $event->creator_id = "customer";

        $this->customer_model->addTimeline( $event );

      }

    }

    return array( "success" => lang("pdt_shared") );

  }

  function knowMoreBudget( $data )
  {

    $budget = $this->getBudgetResume();

    $this->load->model("file_model");

    $this->load->helper('email');

    $this->load->model('customer_model');

    $email = $data["address"];

    if ( valid_email( $email ) ) {

      $customer_id = $this->customer_model->getOrCreate( $email );

      $mailContent['subject'] = $data["name"] . " " . lang("pdt_wnatsToKnowMoreInfoAboutABudget");

      $mail->questions = $data["questions"];
      
      $mail->budget = $budget;

      $mailContent["message"] = $this->load->view("product/knowMoreBudgetMail", $mail, true);

      $mailContent["to"] = $email;

      $mailContent["bcc"] = $this->session->userdata("orgEmail");

      $mailContent["kind"] = "product/knowMoreBudget";

      $this->load->model('mail_model');

      $mail_id = $this->mail_model->queue($mailContent);

      $event->kind = "product/knowMoreBudget";

      if( $this->session->userdata("myOrg") )
        $event->collaborator_id = $this->session->userdata("_id");

      else if( $this->session->userdata("_id") )
        $event->user_id = $this->session->userdata("_id");

      $event->mail_id = $mail_id;

      $event->mail_subject = $mailContent['subject'];

      $event->customer_id = $customer_id;

      if( $this->session->userdata("myOrg") )
        $event->creator_id = $this->session->userdata("_id");

      else
        $event->creator_id = "customer";

      $this->customer_model->addTimeline( $event );

      return array( "success" => lang("pdt_questionsSent") );

    } else {

      return array( "error" => lang("pdt_fillValidEmail") );

    }

  }

}