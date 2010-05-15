<?php 
  
  header("Content-type: text/html; charset=utf-8");

?>
<!doctype html public "-//W3C//DTD HTML 4.01//EN">
<html lang="cs"><head>
  
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="author" content="Adam Horcica (ah01), notepad.jslab.net">
  
  <link rel="stylesheet" href="static/style.css" type="text/css">
  
  <title><?=L('page_title')?></title>
  
  <script src="static/jquery-1.2.6.min.js" type="text/javascript"></script>
  <script type="text/javascript"><?php echo "var LIB_VERSIONS = " . json_encode($libs) . ";";?></script> 
  <script src="static/main.js" type="text/javascript"></script>
  
</head><body>

  <div id="frame">
    
    <!-- HEADER -->
    
    <div id="header">
      <h1><em>jQuery</em> <sup><?=L('probe')?></sup></h1>
      
      <div id="menu">
        <a href="#help" id="help_btn"><?=L('help')?></a>
      </div>
    </div>
    
    <!-- HELP -->
    
    <div id="help" class="box">
    
      <h2 class="roundTop"><?=L('help')?></h2>
      
      <div class="content roundBottom">
      
        <?php include dirname(__FILE__) . "/help." . $current_lang . ".html"; ?>
              
      </div>
    </div>
    
    <!-- CONTENT -->
        
    <div id="body">
      
      <!-- CODE INPUT -->
      
      <div id="code" class="box">
        
        <h2 class="roundTop loading"><?=L('code_title')?> <span><a href=".">[<?=L('reset')?>]</a></span></h2>
        
        <div class="content roundBottom">
          
          <h3><?=L('html_code')?>:</h3>
          <div class="textarea">
            <textarea id="html_code" rows="3"></textarea>
          </div>
          
          <h3><?=L('js_code')?>:</h3>
          <div class="textarea">
            <textarea id="js_code" rows="5"></textarea>
          </div>
  
          <div id="settings">
            <label id="version"><?=L('version')?>:</label>
            <select id="lib_version"></select>
          </div>
          
          <div id="buttons">
            <input type="button" id="run" value="<?=L('run_btn')?>">
          </div>
          
        </div>
      </div>

      <!-- RESULT -->
      
      <div id="result" class="box">
      
        <h2 class="roundTop"><?=L('result_title')?> <span><a href="javascript:;" id="max" target="_blank">[max]</a></span></h2>
        
        <div class="content roundBottom">
          
          <div id="error_msg">
            <div id="error_text"><strong><?=L('error')?>:</strong><span></span></div>
            <div id="error_clear"></div>
          </div>
          
          <div id="iframe_outer">
            <iframe id="res_frame" src="playground.php" border="0"></iframe>
          </div>
          
        </div>
        
      </div>
      
    </div> 
    
    <!-- END CONTENT -->     
    
    <div id="footer">
      
    </div>
    
  </div>

  <script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
  <script type="text/javascript">
    var pageTracker = _gat._getTracker("UA-1556984-8");
    pageTracker._trackPageview();
  </script>

</body></html>