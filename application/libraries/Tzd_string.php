<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tzd_string {

  public function __construct() {

		setlocale(LC_ALL, 'en_US.UTF8');

	}

	function urlEncode($str) {
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_| -]+/", '-', $clean);

		return $clean;
	}

}