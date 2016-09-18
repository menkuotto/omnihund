<?php
use lib\base\Base;
use lib\db\DB;
use lib\db\DBA;
//use mod\login\Login_S;

\GOB::$html=file_get_contents(\PATH::$rootDir.'/tmpl/omni/base.html',true);  
//echo \PATH::$rootDir.'/tmpl/omni/base.html';

if($_SESSION['userid']==0){
    \GOB::$html=file_get_contents(\PATH::$rootDir.'/tmpl/omni/nyito.html',true);
    //<h3>Ez az oldal annak jelenik meg aki még nem regisztrált, nem jelentkezett be. </h3>'; 
    include_once \PATH::$rootDir.'/tmpl/omni/omni.php';
    $content='';
}
else
{  
    \GOB::$html=file_get_contents(\PATH::$rootDir.'/tmpl/omni/base.html',true);
    include_once \PATH::$rootDir.'/tmpl/omni/omni.php';
if(isset($_GET['fajta']) && isset($_GET['valtozat'])){
    $sql="SELECT fajta,var FROM kenel WHERE userid='".$_SESSION['userid']."'";
    $userT= DB::assoc_sor($sql);
    if(empty( $userT)){
    $sql2="INSERT INTO kenel (userid,fajta,var) VALUES ('".$_SESSION['userid']."','".$_GET['fajta']."','".$_GET['valtozat']."')";
    DBA::parancs($sql2);
	$url =\lib\base\LINK::GETtorolT(['fajta','valtozat']);
     header("Location
         : $url"); /* ujratölt */
		exit();
    }       
}

 $mod=$_GET['mod'] ?? 'Alap';  
   $sql="SELECT fajta,var FROM kenel WHERE userid='".$_SESSION['userid']."'";
   $userT= DB::assoc_sor($sql);
    if(empty($userT) && $mod!='Fajtavalaszt'){
        
      $content=app\omni\mod\Fajtak::Fajtak();       
    }
    else{
		
	$fajta= \GOB::$userT['fajta']=$userT['fajta'] ?? '';
	$var= \GOB::$userT['var']=$userT['var'] ?? ''; 	
		if($mod==Fajtavalaszt)	
		{
		$content=app\omni\mod\Fajtavalaszt::Fajtavalaszt();	
		}
		else
		{
		$view=<<<view
 <div style="padding:20px;">
<h2>Eza az alap oldal</h2>
<h4>Akkor jelenik meg, ha olyan felhasználó jön aki már regisztrált is, és választott is fajtát.</h4>
<h2>Választott fajta: $fajta </h2>
<h2>Választott változat: $var </h2>
<h4>Lehetne itt például a webshop, vagy hírek, infók...</h4>
</div>
view;
   // eval('$content=\app\omni\mod\\'.$mod.'::'.$mod.'();') ; 
  //echo $view;
  $content=$view;	
			
		}
  
 
    }

   
} 
class omni_S
{
    static public function Res() 
    {
        
    $html= str_replace('<!--|content|-->',$content ,GOB::$html);
    }
}
//$login= \mod\login\Login_S::Res(); 
//$content=\app\omni\mod\Fajtak::csoportListaz();
//GOB::$html= str_replace('<!--|login|-->',$login ,GOB::$html);
GOB::$html= str_replace('<!--|content|-->',$content ,GOB::$html);







