<?php
  
  require_once 'core/utils.inc.php';
  require_once 'core/safe.inc.php';
    
  if(!isset($_POST['html']) || !isset($_POST['js'])) die('ERROR');
  
  $html_code =  $_POST['html'];
  $js_code   =  $_POST['js'];
  $version   =  empty($_POST['version']) ? '' : trim($_POST['version']);

  $data = array( 'html' => $html_code, 
                 'js'   => $js_code );
                 
  if($version != '') $data['version'] = $version;
                 
  $hash = safe_store($data);
  
  if($hash === false){
    echo "ERROR";
  }else{
    echo $hash;
  }
  