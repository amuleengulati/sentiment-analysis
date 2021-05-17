<?php
include('db.php');
$movie=$_GET['movie'];
$query="select * from movie where movie='".$movie."'";
$res=mysql_query($query);
if(mysql_num_rows($res)==0)
{
$sql="insert into movies(movie) values('$movie')";

$result=mysql_query($sql);

$sql1="insert into movie(movie) values('$movie')";

$result1=mysql_query($sql);
if($result)
{
echo "<script>alert('Movie added successfully');window.location.href='admin_login.php';";
echo "</script>";
}
else
{
echo "<script>alert('An error was encountered. Try again later');window.location.href='admin_login.php';";
echo "</script>";
}
}
else
{
echo "<script>alert('Movie has already been added.');window.location.href='admin_login.php';";
echo "</script>";
}
?>