<?php

  require_once 'core/utils.inc.php';
  require_once 'core/safe.inc.php';

  $html_code = "";
  $js_code = "";
  $lib_version = "";
  
  if(!empty($_GET['code']))
  {
    $hash = substr($_GET['code'], 0, 50);
    
    $data = safe_load($hash); 
    
    if($data === false) die("no data");
        
    $html_code    = $data->html;
    $js_code      = $data->js;
    $lib_version  = $data->version;
    
  }  
  
  include 'core/tpl/iframe.tpl.php';
