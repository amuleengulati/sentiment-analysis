<?php
session_start();
error_reporting(0);
if(!isset($_POST['username']))
{ 
echo "<script>window.location.href='index.php';";
echo "</script>";
}
else
{
include('db.php');
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$query="select * from user_details where username='$username' AND password='$pwd'";
$result=mysql_query($query);
if(mysql_num_rows($result)==1)
{
if($username=='admin' AND $pwd=='admin')
{
$query1="insert into login_details(username,password,date_time) values('$username','$pwd',now())";
$result1=mysql_query($query1) or die(mysql_error());
$_SESSION['username']=$username;
$query2="select * from user_details where username='$username' AND password='$pwd'";
$result=mysql_query($query2);
$row=mysql_fetch_assoc($result);
$email=$row['email'];
$dp=$row['dp'];
$id=$row['id'];
$_SESSION['email']=$email;
$_SESSION['dp']=$dp;
$_SESSION['pwd']=$pwd;
$_SESSION['user_id']=$id;
if(!isset($_POST['username']))
{
header('location:index.php');
}
else
{
header('location:admin_login.php');
}
}
else
{
$query1="insert into login_details(username,password,date_time) values('$username','$pwd',now())";
$result1=mysql_query($query1) or die(mysql_error());
$_SESSION['username']=$username;
header('location:user_login.php');
$query2="select * from user_details where username='$username' AND password='$pwd'";
$result=mysql_query($query2);
$row=mysql_fetch_assoc($result);
$email=$row['email'];
$dp=$row['dp'];
$id=$row['id'];
$_SESSION['email']=$email;
$_SESSION['dp']=$dp;
$_SESSION['pwd']=$pwd;
$_SESSION['user_id']=$id;
}
}
else
{
echo "<script>";
echo "alert('Your Username or Password is incorrect')
window.location.href='index.php';";
echo "</script>";
}
}
?>