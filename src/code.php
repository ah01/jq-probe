<?php

  require_once 'core/utils.inc.php';
  require_once 'core/safe.inc.php';
  
  header("Content-type: application/json; charset=utf-8");

  if(!empty($_GET['code'])){
    
    $hash = substr($_GET['code'], 0, 50);
    
    $data = safe_load($hash); 
    
    if($data === false){
      $data == array("ERROR" => "no code");
    }
    
    echo json_encode($data);
  }
