<?
header('Content-Type: text/html; charset=utf-8');
 require_once('conf.php');
 
 $a = stripslashes("Ке'кух"); 
 
 $s = stripslashes("Дмитро"); 
 
 $d = addslashes("Петр'ович"); 
 
 $l = "@$a&nbsp;$s&nbsp;$d@u";   
 
 echo  $l; 
 
$zapyt = 'select name, deputies_link, workornot, work_link, id from pndu_app';
$result = mysqli_query($con, $zapyt);

 
   while($row = mysqli_fetch_row($result)) {	  
   if (($row[3] != 0) && ($row[2] == 1))
{
echo $row[0]; 

$f = (explode(" ",$row[0]));
 
$g =  "@$f[0]&nbsp;$f[1]&nbsp;$f[2]@u"  ;  
 
 echo $g ; 

$file = file_get_contents($row[1]); 
$fileEndEnd = mb_convert_encoding($file, 'HTML-ENTITIES', "UTF-8");
//if ((preg_match('~Кекух~u',$file)) && (preg_match('~Дмитро~u',$file)) && (preg_match('~Петрович~u',$file)))
if (preg_match($g ,$file)) 
{
echo "Вхождение найдено"; 

   //  $sql1 = "UPDATE pndu_app SET work_link = '0' WHERE name = '$row[0]' ";
	 $sql1 = "UPDATE pndu_app SET work_link = '0' WHERE id = '$row[4]' ";
	 mysqli_query($con, $sql1); 

 } 
 else{ 
 
    // $sql2 = "UPDATE pndu_app SET workornot = '0' WHERE name = '$row[0]' ";
	 $sql2 = "UPDATE pndu_app SET workornot = '0' WHERE id = '$row[4]' ";
	 mysqli_query($con, $sql2); 
	 
	// $sql3 = "UPDATE pndu_app SET work_link = '0' WHERE name = '$row[0]' ";
	 $sql3 = "UPDATE pndu_app SET work_link = '0' WHERE id = '$row[4]' ";
	 mysqli_query($con, $sql3); 
 
  echo "Вхождение не найдено"; 
  }
  print $file;


  
  
}
	
   }
   
   
  
   
 //  "UPDATE pndu_app SET work_link = '$row[2]' WHERE name = '$row[0]' AND id = '1'";
 // ~Кекух&nbsp;Дмитро&nbsp;Петрович~u
 
  

?>