// jQuery Tester

$(function(){
  
  $("textarea").AutoLines();
  
  // start test of code
  $("#run").click(runCode);
  
  // show / hide help
  $("#help_btn").click(function(){
    $("#help").slideToggle("fast");
    return false;
  });
  
  // list of jQuery versions
  if(typeof LIB_VERSIONS !== "undefined"){
    var select = $("#lib_version");
    $.each(LIB_VERSIONS.list, function(version, name){
      
      $("<option value='" + version + "'>" + name + "</option>")
        .attr("selected", (LIB_VERSIONS['default'] == version ? "selected" : ""))
        .appendTo(select);
        
    });
  }
  
  // load code from adress 
  if (location.hash && location.hash.length > 1) {
    loadEnviroment();    
  }else{
    // default code
    $("#html_code").val('<div id="ahoj">Ahoj!</div>');
    $("#js_code").val('$(document).ready(function(){\n  \n});');
  }

  $(window).bind( 'hashchange', function(){
    if(_hash_lock_ === false){ // fire only for external change    
      loadEnviroment();
    }
  });
  
  // localization
  window['RUN_BTN'] = $("#run").val();

});


// load code from hash and run it.
function loadEnviroment(){
    var hash = location.hash.substr(1);
    if(hash.length > 0){
      loadCode(hash);
      setPlaygroundAdress("playground.php?code=" + hash); // load result page
      GA_Track("/zkousecka/load-code/" + hash);
    }
}

// run code from text in editors
function runCode(){
  
  var html    = $("#html_code").val(),
      js      = $("#js_code").val(),
      version = $("#lib_version").val();
  
  $("#error_msg").hide();
  $("#run").attr("disabled","disabled").val("...");
  
  // send code to server
  $.post("save.php", {'js': js, 'html': html, 'version': version}, function(data){
    
    if(data == "ERROR"){
      alert("Server error.");
    }else{
      setPlaygroundAdress("playground.php?code=" + data);
      $("#max").attr("href", "playground.php?code=" + data).show();
      
      setHashSafely("#" + data);
      GA_Track("/zkousecka/run-code/" + data);
    }
    
  });    
}

// load code to editors from server
function loadCode(hash){

  $.get("code.php", {"code": hash}, function(data){
      
    if(!data['ERROR']){
      $("#html_code").val(data.html).RefreshLines();
      $("#js_code").val(data.js).RefreshLines();
      if(data.version){
        $("#lib_version").select(data.version);
      }
    }else{
      setHashSafely("#"); // invalide address
    }
    
  }, "json");
}

function playgroundLoaded(){
  $("#run").attr("disabled","").val(RUN_BTN);
}

// show error (from playground)
function showError(text){
  $("#error_text span").html(text);
  $("#error_msg").slideDown("normal");
}


// change iframe address without change history
function setPlaygroundAdress(url){
  document.getElementById("res_frame").contentDocument.location.replace(url);
}

var _hash_lock_ = false;

// change location.hash without fire "hashchange" event
function setHashSafely(hash){
  _hash_lock_ = true;
  location.hash = hash;
  setTimeout(function(){
    _hash_lock_ = false;
  }, 250);
}

/* --- jQuery -----------------------------------------------------------------*/

// jQuery plugin for auto-height (lines) of textarea
(function(){
  
  var MAX_LINES = 20;
  
  // count number of lines on text
  function lines(text)
  {
    var pos = 0, count = 0;
    while((pos = text.indexOf("\n", pos) + 1) > 0){
      count ++;
    }
    return count;
  }
  
  // update rows of textarea 
  function test(textarea)
  {
    $(textarea).attr("rows", Math.min(lines($(textarea).val()) + ((jQuery.browser.msie) ? 3 : 2), MAX_LINES));
  }
  
  function insertText(textarea, text)
  {
     if (document.selection) { // IE
        sel = document.selection.createRange();
        sel.text = text;
      }
      else if (textarea.selectionStart || textarea.selectionStart == '0') { //MOZILLA/NETSCAPE support
        // insert text
        var startPos = textarea.selectionStart;
        var endPos = textarea.selectionEnd;
        textarea.value = textarea.value.substring(0, startPos) + text + textarea.value.substring(endPos);
        // place cursor
        textarea.selectionEnd = textarea.selectionStart = startPos + text.length;
      } else {
        //textarea.value += text;
      }
  }
  
  function getTextIndent(textarea)
  {
    var text = "";
    
    if (document.selection) { // IE
      // TODO - for IE
    }
    else if (textarea.selectionStart || textarea.selectionStart == '0') { //MOZILLA/NETSCAPE support
      var startPos = textarea.selectionStart;
      text = textarea.value.substring(0, startPos);
    }
  
    var reg = /\n( *).*\n$/m;
    var a = text.match(reg);
    
    if(a && a[1] && a[1].length > 0){
      return a[1];
    } else {
      return "";
    }
    
  }
  
  // init. plugin on textarea
  jQuery.fn.AutoLines = function()
  {  
    this.keyup(function (e) {
      if(e.which == 13 || e.which == 8 || e.which == 46){
        test(this);
      }
      
      if(e.which == 13){
        insertText(this, getTextIndent(this));
      }
      
    });
    
    this.keydown(function (e) {
      // Tab key replacement
      if(e.which == 9){
        insertText(this, "  ");
        return false;
      } 
    });
  };
  
  // update rows on textarea
  jQuery.fn.RefreshLines = function()
  {
    test(this);
  }

})();

jQuery.fn.select = function(value)
{
  this.find("option").each(function(){
    if(this.value === value){
      this.selected = true;
    }
  });  
};

// GA Tracking code
function GA_Track(address){
//    pageTracker._trackPageview(address);
}



/*
 * jQuery hashchange event - v1.0 - 1/9/2010
 * http://benalman.com/projects/jquery-hashchange-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function($,b){var g=b.location,h,i=$.event.special,d="hashchange",f=$.browser,c=f.msie&&f.version<8,e="on"+d in b&&!c;function a(j){j=j||g.href;return j.replace(/^[^#]*#?(.*)$/,"$1")}$[d+"Delay"]=100;i[d]=$.extend(i[d],{setup:function(){if(e){return false}h.start()},teardown:function(){if(e){return false}h.stop()}});h=(function(){var k={},o,j,l,n;function m(){l=n=function(p){return p};if(c){j=$('<iframe src="javascript:0"/>').hide().appendTo("body")[0].contentWindow;n=function(){return a(j.document.location.href)};l=function(r,p){if(r!==p){var q=j.document;q.open().close();q.location.hash="#"+r}};l(a())}}k.start=function(){if(o){return}var q=a();l||m();(function p(){var s=a(),r=n(q);if(s!==q){l(q=s,r);$(b).trigger(d)}else{if(r!==q){g.href=g.href.replace(/#.*/,"")+"#"+r}}o=setTimeout(p,$[d+"Delay"])})()};k.stop=function(){if(!j){o&&clearTimeout(o);o=0}};return k})()})(jQuery,this);