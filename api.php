<?php
// Config
define('APIKEY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiI3NDYyYjhjMC1kZTFmLTAxMzQtZGRjYi0wMjQyYWMxMTAwMDgiLCJpc3MiOiJnYW1lbG9ja2VyIiwib3JnIjoia2FydGgyNTEyLWdtYWlsLWNvbSIsImFwcCI6Ijc0NjE0MWYwLWRlMWYtMDEzNC1kZGNhLTAyNDJhYzExMDAwOCIsInB1YiI6InNlbWMiLCJ0aXRsZSI6InZhaW5nbG9yeSIsInNjb3BlIjoiY29tbXVuaXR5IiwibGltaXQiOjEwfQ.wYEZUJtJ9gtS4g9AGg5zjrocRF7Fl6iCx3ie0XVVmf4');

// Curl Request
// Accepts a URI and sets a global variable $serverOutput with result.
function request($uri){
  global $serverOutput;

  $ch = curl_init($uri);
  curl_setopt_array($ch, array(
      CURLOPT_HTTPHEADER  => array("Authorization: Bearer " . APIKEY,
                                    'X-TITLE-ID: semc-vainglory',
                                    'Accept: application/vnd.api+json',
                                    "X-API-KEY: " . APIKEY),
      CURLOPT_RETURNTRANSFER  =>true,
      CURLOPT_SSL_VERIFYPEER    =>false,
      CURLOPT_VERBOSE     => 1
  ));
  $serverOutput = curl_exec($ch);
  curl_close($ch);
}
