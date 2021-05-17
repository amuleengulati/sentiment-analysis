<?php
include('db.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$dp=$_FILES['dp']['name'];
$path="profilepics/".basename($_FILES["dp"]["name"]);
move_uploaded_file($_FILES['dp']['tmp_name'],$path);


$sql="select * from user_details where username='".$username."'";

$result=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==1)
{
echo "<script>alert('Username already exists.');window.location.href='index.php';";
echo "</script>";
}
else if(mysql_num_rows($result)==0)
{
$sql="select * from user_details where email='".$email."'";

$result=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==1)
{
echo "<script>alert('You have already signed up.');window.location.href='index.php';";
echo "</script>";
}
else
{
$query1="insert into user_details(first_name,last_name,email,dob,username,password,dp) values('$fname','$lname','$email','$dob','$username','$pwd','$path')";

$result1=mysql_query($query1) or die(mysql_error());

echo "<script>alert('Registration successful. Please login to continue.');window.location.href='index.php';";
echo "</script>";
}
}

?>