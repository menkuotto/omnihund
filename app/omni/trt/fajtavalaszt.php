<?php
namespace app\omni\mod;

Trait Fajtavalaszt
{
    private  $imagedir = 'app/omni/fajtak/';

    static public function Fajtavalaszt()
    {
        $fajta = $_GET['fajta'];
        $fajtaid = $_GET['fajtaid'];
        $imagepath = self::$imagedir.$fajta;
        $sql = "select * from fajtavar where fajtaid='" . $fajtaid . "'";
        $kepT = \lib\db\DB::assoc_tomb($sql);
        $kepek = '';
        $info = 'Rövid info a fajtaváltozatról';
        $confirm = 'Az ok gombra kattintva a fajta és színváltozat választása megtörténik.Később még módosítható!';
        foreach ($kepT as $kep) {
            $valtozat = $kep['nev'];
            $valtozatid = $kep['id'];
            $kep = $kep['kep'];
$view = <<<view

<div style="float:left;margin:5px;" >
<a href="index.php?app=omni&fajta=$fajta&valtozat=$valtozat&valtozatid=$valtozatid" 
 onclick="return confirm('$confirm');"
 title="$info" class="btn btn-default" style="color:grey; background-color:white;">
 <img class="ebkep" width="200" height="200"  src="$kep"></br><h4>$valtozat</h4></a>
      
 </div> 

view;
            
            $kepek .= $view;
        }
        
$html = <<<html

 $kepek 
 <div style="clear:both;" ></div> 
<h3>Bővebb info a fajtáról és változatairól:</h3> 

 <!--  <button type="button" onclick="window.location='index.php?app=omni&valaszt=$fajta';"class="btn btn-primary">Ezt váasztom</button>
   <button type="button" class="btn btn-default" data-dismiss="modal">Mégsem</button> -->  
  </br> </br>   

html;

       $this->ADT['view']=$html;
    }
}