<?php
namespace tmpl\omni;

class ViewInit
{
static public  function Res($html) {
  
    $html=\PATH::$rootDir.DS.'tmpl'.DS.'omni'.DS.$html; 

 return file_get_contents($html,true);
  }  
    
}



/*
\GOB::$paramT['head']['js']['goref']= <<<js
function goref() {
    var x = document.referrer;
	window.location = x;	
}
js
;
*/