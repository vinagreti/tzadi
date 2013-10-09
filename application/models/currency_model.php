<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency_Model extends CI_Model {

  public function getAll() {

    $this->load->model("mongo_model");

    return $this->mongo_db->get('currency');

  }

  public function getToday( ) {

    $lastCurrency = $this->getLocal();

    if( $lastCurrency && $lastCurrency["day"] == date("Y-m-d") )
      return $lastCurrency;

    else {

      $xml = @simplexml_load_file('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

      if( ! $xml )
        $xml = simplexml_load_file('http://195.128.1.78/stats/eurofxref/eurofxref-daily.xml');

      $json = json_encode($xml);

      $array = json_decode($json,TRUE);

      $newCurrency["day"] = $array["Cube"]["Cube"]["@attributes"]["time"];

      if( $newCurrency["day"] == $lastCurrency["day"] ) {

        return $lastCurrency;

      } else {

        foreach( $array["Cube"]["Cube"]["Cube"] as $curr) {

          $newCurrency[ $curr["@attributes"]["currency"] ] = $curr["@attributes"]["rate"];

        }

        $this->load->model("mongo_model");

        $newCurrency["_id"] = $this->mongo_model->newID();

        $newCurrency["EUR"] = 1;

        ksort($newCurrency);

        $this->mongo_db->insert('currency', $newCurrency);

        return $newCurrency;

      }

    }

  }

  public function getLocal() {

    $this->load->model("mongo_model");

    $currency = $this->mongo_db
      ->order_by( array("_id" => "desc") )
      ->get('currency');

    if( $currency )
      return $currency[0];

    else
      return false;

  }

  public function getProfileCurrency(){

    $currency = $this->getToday();

    $exchangeRate = $this->session->userdata("orgExchangeRate");

    if( $exchangeRate ) {

      if( $exchangeRate["kind"] == "percent")
        $percent = $exchangeRate["value"];

      else
        $percent = 100 / ( $currency[ $exchangeRate["kind"] ] / $exchangeRate["value"] );

      foreach($currency as $key => $val){

        if( $key != "_id" && $key != "day" && $key != "EUR" )
          $currency[$key] = $val + ( $val * ( $percent / 100 ) );

      }

      return $currency;

    }

    return $currency;

  }
  
}
