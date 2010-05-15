<?php


/**
 *  Load data from safe by hash
 */ 
function safe_load($hash)
{
  $file_content = load_file(make_file_name($hash));
    
  if($file_content === false){
    return false;
  }
    
  $data = json_decode($file_content);
  
  if($data === false){
    return false;
  }
      
  return safe_normalize_data($data);
}

/**
 *  Store data to safe and return hash, OR FALSE
 */ 
function safe_store($data)
{
  $hash = safe_generate_hash($data);
  $json = json_encode($data); 
  
  if(save_file(make_file_name($hash), $json) !== false){
    return $hash;
  } else {
    return false;
  }
}

/**
 *  Generate hash from data
 */ 
function safe_generate_hash($data)
{
  return md5(implode($data));
}

/**
 *  Correct data (add missing items to historic data)
 */ 
function safe_normalize_data($data)
{
  if(empty($data->version)){
    $data->version = "jquery-1.2.6.min"; // add default lib. version for old codes
  }

  return $data;
}