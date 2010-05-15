<?php

  include 'core/lang.inc.php';

  function make_file_name($hash)
  {
    return 'safe/' . $hash . '.code';
  }


  function save_file($name, $content)
  {
    $return = false;
    
    if(file_exists($name)){
      $return = true;
    } else {
      $return = file_put_contents($name, $content);
    }
    
    return $return !== false;
  }
  
  
  function load_file($name)
  {
    $return = false;
    
    if(file_exists($name)){
      $return = file_get_contents($name);
    }
    
    return $return; 
  }
  
  
  function get_lib_url($lib)
  {
    return "libs/" . $lib . ".js";
  }
  