<?php

  require_once 'core/utils.inc.php';
  
  $libs = parse_ini_file('libs/list.ini', true);
  if($libs === false) die('no jQuery version available');

  include 'core/tpl/index.tpl.php';