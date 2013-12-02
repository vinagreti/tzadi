<?php

  function time_day( $time ){ return date('d', $time); }
  function time_month( $time ){ return date('m', $time); }
  function time_year( $time ){ return date('Y', $time); }
  function time_shortYear( $time ){ return date('y', $time); }
  function time_hour( $time ){ return date('H', $time); }
  function time_minute( $time ){ return date('i', $time); }
  function time_second( $time ){ return date('s', $time); }
  function time_date( $time ){ return date('d', $time) . "/" . date("m", $time) . "/" . date("Y", $time); }
  function time_shortDate( $time ){ return date('d', $time) . "/" . date("m", $time) . "/" . date("y", $time); }
  function time_time( $time ){ return date('h', $time) . ":" . date("i", $time) . ":" . date("s", $time); }
  function time_shortTime( $time ){ return date('h', $time) . ":" . date("i", $time); }