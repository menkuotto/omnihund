<?php
namespace app\omni\trt;

trait Alap{
    
 public function Alap(){
        $task=$this->ADT['task'];
        
        if($_SESSION['userid']==0){   
          $this->ADT['TSK'][$task]['next']='nyito';  
        }
        else{
            
           if(isset(\GOB::$userT['fajtavar']))
           {
               $this->ADT['TSK'][$task]['next']='final';
               
           }
           else
           {
                $this->ADT['TSK'][$task]['next']='fajtavalaszt';
           }            
            
        }           
    }

}