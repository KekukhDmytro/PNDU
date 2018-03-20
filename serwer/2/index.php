<?
header('Content-Type: text/html; charset=utf-8');
require_once('conf.php');

// SELECT * FROM `pndu_app` WHERE name LIKE "%'%"   вибрати всіх з апострофами
//  UPDATE pndu_app SET work_link = '1' WHERE name LIKE "%'%" 

 
//$zapyt = 'select name, deputies_link, workornot, work_link from pndu_app';
$zapyt = 'select name, deputies_link, workornot, profeshion from pndu_app';
$result = mysqli_query($con, $zapyt);
if ($result) 
 	{
	echo '<table  border=1>';
	
	
	echo "<tr><th>ПІБ</th><th>Посада</th><th>Лінк</th></tr>";
		
		
	while($row = mysqli_fetch_row($result)) 
		{
		if ($row[2] == 1) 
			{
			echo '<tr><td style="background-color:powderblue;">';
			}
		else 
			{
			echo '<tr><td style="background-color:red;">';
			}		
		echo $row[0];
		echo "</td><td>";
		echo $row[3];
		echo "</td><td><a href= '$row[1]' >";    
		echo $row[1];	  
		echo "</a></td></tr>";
		}
	echo '</table>';
	mysqli_free_result($result);
	}
else 
	{
	echo 'Bad zapyt';
	}
mysqli_close($con);
?>