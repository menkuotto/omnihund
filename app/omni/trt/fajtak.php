<?php
namespace app\omni\mod;

trait Fajtak{
public static  $imagedir='app/omni/fajtak/';   
static public function Fajtak(){ 

$html=\lib\base\File::getContent('tmpl/omni/view/fajta.html');  

	$sql="select * from fajta where pub='0'";
		
        $fajtaT=\lib\db\DB::assoc_tomb($sql);
        foreach ($fajtaT as $fajta){
         $image=$fajta['kep'] ;
		 $id=$fajta['id'] ;
         $nev=$fajta['nev'] ;
         $title=$fajta['intro'] ;
$view=<<<view
<div style="float:left;margin:5px;" >
 <a href="index.php?app=omni&mod=Fajtavalaszt&fajta=$nev&fajtaid=$id"
 data-remote="false" data-tg="tooltip" data-toggle="modal" data-target="#myModal" 
 title="$title" class="btn btn-default" style="color:grey; background-color:white;">
 <img class="ebkep" width="200" height="200"  src="$image"></br><h4>$nev</h4></a>
      
 </div>    
view;

$html.=$view;
        }
        
$this->ADT['view']= $html.'<div style="clear:both;" ></div> ';  
    }
}