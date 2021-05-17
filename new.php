<script src="jquery.js"></script>
<?php
include('db.php');
$text = $_GET['N'];
$movie= $_GET['M'];
$list=(explode(",",$text));
$file = fopen("test.csv","w");
fputcsv($file,explode(',',$text));
fclose($file);
ini_set('max_execution_time', 1200);
error_reporting(E_ALL); 
ini_set('display_errors', 1);
exec("python eval1.py", $output);
$query="insert into movie_reviews(movie_name,response) values ('".$_GET['M']."','".$output[0]."')";
$result=mysql_query($query) or die(mysql_error());
$sql="delete from movies where movie='".$movie."'";
$res=mysql_query($sql) or die(mysql_error());
if($output[0]=="Negative")
{
	echo "<script>";
	echo "alert('We regret your NEGATIVE response.')
	window.location.href='user_login.php';";
	echo "</script>"; }
else if($output[0]=="Positive")
	{
	echo "<script>";
	echo "alert('Thank you for the POSITIVE response.')
	window.location.href='user_login.php';";
	echo "</script>";
	}
?>
