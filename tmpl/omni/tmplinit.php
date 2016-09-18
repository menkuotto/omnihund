<?php
namespace tmpl\omni;

class Tmplinit{
  static public function Res() 
  {
    \GOB::$paramT['html']['head']['cssfile'][]=\PATH::$rootDir.'/tmpl/omni/res/bootstrap_sajat1.min.css';
    \GOB::$paramT['html']['head']['cssfile'][]=\PATH::$rootDir.'/tmpl/omni/res/sajat.css';
    \GOB::$paramT['html']['head']['jsfile'][]=\PATH::$MOttoDir.'/vendor/jquery/jquery-1.9.1.min.js';
    \GOB::$paramT['html']['head']['jsfile'][]=\PATH::$MOttoDir.'/vendor/bootstrap/bootstrap.3.3.6.min.js';    
  
  }  
    
}
