<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency_Model extends CI_Model {

  function getAll() {

    $this->load->model("mongo_model");

    return $this->mongo_db->get('currency');

  }

  function getToday( ) {

      $xml = simplexml_load_file('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

      $json = json_encode($xml);

      $array = json_decode($json,TRUE);

      $currency = $this->getLocal();

      $currencyDay = $currency["day"];

      $xmlDay = $array["Cube"]["Cube"]["@attributes"]["time"];

      if( $currencyDay != $xmlDay ) {

        $currency["day"] = $array["Cube"]["Cube"]["@attributes"]["time"];

        foreach( $array["Cube"]["Cube"]["Cube"] as $curr) {

          $currency[ $curr["@attributes"]["currency"] ] = $curr["@attributes"]["rate"];

        }

        $this->load->model("mongo_model");

        $currency["_id"] = $this->mongo_model->newID();

        $currency["EUR"] = "1";

        $this->mongo_db->insert('currency', $currency);

        echo $currencyDay;

        echo $xmlDay;

      }

      return $currency;

  }

  function getLocal() {

    $this->load->model("mongo_model");

    $currency = $this->mongo_db
      ->get('currency');

    return $currency[sizeof($currency) - 1];

  }

}
