<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency_Model extends CI_Model {

  public function getAll() {

    $this->load->model("mongo_model");

    return $this->mongo_db->get('currency');

  }

  public function getToday( ) {

    $currency = $this->getLocal();

    if( $currency && $currency["day"] == date("Y-m-d") )
      return $currency;

    else {

      $xml = @simplexml_load_file('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

      if( ! $xml )
        $xml = simplexml_load_file('http://195.128.1.78/stats/eurofxref/eurofxref-daily.xml');

      $json = json_encode($xml);

      $array = json_decode($json,TRUE);

      $xmlDay = $array["Cube"]["Cube"]["@attributes"]["time"];

      $currency["day"] = $array["Cube"]["Cube"]["@attributes"]["time"];

      foreach( $array["Cube"]["Cube"]["Cube"] as $curr) {

        $currency[ $curr["@attributes"]["currency"] ] = $curr["@attributes"]["rate"];

      }

      $this->load->model("mongo_model");

      $currency["_id"] = $this->mongo_model->newID();

      $currency["EUR"] = 1;

      ksort($currency);

      $this->mongo_db->insert('currency', $currency);

      return $currency;

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

}
