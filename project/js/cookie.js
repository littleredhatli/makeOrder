var Cookies = {};
/**
* …Ë÷√Cookies
*/
function setCookie(name, value, time){   
        var nameString = name + '=' + encodeURI(value);   
        var expiryString = "";   
        if(time !== 0) {   
            var expdate = new Date();       
            if(time == null || isNaN(time)) time = 60*60*1000;
        expdate.setTime(expdate.getTime() +  time);
     expiryString = ' ;expires = '+ expdate.toGMTString();
 }
 var path = " ;path =/";
 document.cookie = nameString + expiryString + path;
}
/**
* ∂¡»°Cookies
*/
Cookies.get = function(name){
 var arg = name + "=";
 var alen = arg.length;
 var clen = document.cookie.length;
 var i = 0;
 var j = 0;
 while(i < clen){
  j = i + alen;
  if (document.cookie.substring(i, j) == arg)
  return Cookies.getCookieVal(j);
  i = document.cookie.indexOf(" ", i) + 1;
  if(i == 0)
  break;
 }
 return null;
};
/**
* «Â≥˝Cookies
*/
Cookies.clear = function(name) {
 if(Cookies.get(name)){
 var expdate = new Date();
 expdate.setTime(expdate.getTime() - (86400 * 1000 * 1));
 Cookies.set(name, "", expdate);
 }
};
Cookies.getCookieVal = function(offset){
 var endstr = document.cookie.indexOf(";", offset);
 if(endstr == -1){
  endstr = document.cookie.length;
 }
 return unescape(document.cookie.substring(offset, endstr));
};
function clearCookie(){ 
    var keys=document.cookie.match(/[^ =;]+(?=\=)/g); 
    if (keys) { 
        for (var i = keys.length; i--;) 
            document.cookie=keys[i]+'=0;expires=' + new Date( 0).toUTCString() 
        } 
} 

function clearCookie(name) {  
    setCookie(name, "", -1);  
}
