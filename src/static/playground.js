
window.onerror = function(msg, url, line)
{
  if(typeof parent.showError === "function"){
    parent.showError(msg);
  }
  return false;
}

if(typeof parent.playgroundLoaded === "function")
{
  parent.playgroundLoaded();
}
