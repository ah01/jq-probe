<?php

$lang = array();
$current_lang = 'cs';

require_once 'core/translation.php';

function L($name){
  global $lang, $current_lang;
  return $lang[$current_lang][$name];
}
