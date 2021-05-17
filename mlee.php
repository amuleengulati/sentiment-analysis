<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body
{
background: linear-gradient(132deg,#ec5216,#1665c1); 
background-size: 400% 400%;
animation: BackgroundGradient 20s ease infinite;
}
@keyframes BackgroundGradient {
0%{background-position: 0% 50%;}
50% {background-position: 100% 50%;}
100% {background-position: 0% 50%;}

}

#a
{
position:absolute;
top:350px;
left:400px;
margin-left:100px;
}
#N
{
height:25px;
width:300px;
padding:10px;
border 1px solid black;
border-radius:18px;
display:inline-block;
}
#text2
{
height:45px;
width:70px;
border 1px solid black;
border-radius:18px;
display:inline-block;
}
</style>


</head>

<body>
<center><img src='image.jpg' style="border-radius:150px"></center>
<div id="a">
<center><form  action="new.php" method="GET">
<select id="M" name="M">
<option>Padmavati</option>
<option>Ram Leela</option>
</select>
<font size="+1.5"><b>INSERT :<input id="N" type="text" name ="N" />
<input id="text2" type="submit" name ="submit"  value="SUBMIT"/></b></font>
</form>
</center></div>

</body>
</html>
