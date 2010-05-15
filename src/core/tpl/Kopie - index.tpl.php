<?php 

  header("Content-type: text/html; charset=utf-8");

?>
<!doctype html public "-//W3C//DTD HTML 4.01//EN">
<html lang="cs"><head>
  
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="author" content="Adam Hořčica (ah01), notepad.jslab.net">
  
  <link rel="stylesheet" href="static/style.css" type="text/css">
  
  <title>jQuery zkoušečka</title>
  
  <script src="static/jquery-1.2.6.min.js" type="text/javascript"></script>
  <script type="text/javascript"><?php echo "var LIB_VERSIONS = " . json_encode($libs) . ";"; ?></script>  
  <script src="static/main.js" type="text/javascript"></script>
  
</head><body>

  <div id="frame">
    
    <!-- HEADER -->
    
    <div id="header">
      <h1><em>jQuery</em> <sup>zkoušečka</sup></h1>
      
      <div id="menu">
        <a href="#help" id="help_btn">Nápověda</a>
      </div>
    </div>
    
    <!-- HELP -->
    
    <div id="help" class="box">
    
      <h2 class="roundTop">Nápověda</h2>
      
      <div class="content roundBottom">
        <p class="intro">
          <em>Vyzkoušejte si <a href="http://jquery.com">jQuery</a> na kousku HTML kódu!</em>
        </p>
            
        <h3>Trvalý odkaz</h3>
        
        <p>
          Po <em>spuštění</em> se změní automaticky adresa stránky. Tu můžete vzít a poslat třeba kamarádovi. On po jejím otevření uvidí přesně to vo Vy. 
        </p>
      </div>
    </div>
    
    <!-- CONTENT -->
        
    <div id="body">
      
      <!-- CODE INPUT -->
      
      <div id="code" class="box">
        
        <h2 class="roundTop loading">Kód <span>[<a href=".">reset</a>]</span></h2>
        
        <div class="content roundBottom">
          
          <h3>HTML kód:</h3>
          <div class="textarea">
            <textarea id="html_code" rows="3"></textarea>
          </div>
          
          <h3>JavaScript:</h3>
          <div class="textarea">
            <textarea id="js_code" rows="5"></textarea>
          </div>
  
          <div id="settings">
            <label id="version">Verze jQuery:</label>
            <select id="lib_version"></select>
          </div>
          
          <div id="buttons">
            <input type="button" id="run" value="Spustit!">
          </div>
          
        </div>
      </div>

      <!-- RESULT -->
      
      <div id="result" class="box">
      
        <h2 class="roundTop">Výsledek <span><a href="javascript:;" id="max" target="_blank">[max]</a></span></h2>
        
        <div class="content roundBottom">
          
          <div id="error_msg">
            <div id="error_text"><strong>Chyba:</strong></div>
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
      <p>&copy; <a href="http://notepad.jslab.net">Adam Hořčica</a>, 2008 – 2010
    </div>
    
  </div>
<!--
  <script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
  <script type="text/javascript">
    var pageTracker = _gat._getTracker("UA-1556984-8");
    pageTracker._trackPageview();
  </script>
-->
</body></html>