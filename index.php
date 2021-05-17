<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Movie Reviews</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classy User Ui Kit Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css1/monthly.css">	<!-- Calender-CSS -->
<link rel="stylesheet" href="css1/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<script src="jquery.js"></script>
<script src="script.js"></script>
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Philosopher:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">
<!-- //online-fonts -->

</head>
<body>
	<h1 class="agile-head">WELCOME TO MOVIE REVIEWER</h1>
	<div class="agile-wi">
		<!-- logIn Form -->
		<div class="signin-form">
			<form id="signin" action="login.php" method="POST">
				<h3>Login Now</h3>
				<p>User Name </p>
				<input type="text" name="username" id="username" placeholder="" required=""/>
				<p>Password</p>
				<input type="password" name="pwd" id="pwd" placeholder="" required=""/>	 
				<br><br><br><br>
				<div class="clear"> </div>
				<input type="submit" name="submit" value="Login">
				<br><br>
			</form>
		</div>       
		<!-- //logIn Form -->
		
		<!-- Profile-form -->
			<div class="top-grids">
				<div class="profile-agile">
					<h2>REVIEW MOVIES</h2>
					<div class="profile-w3">
						<img src="images1/bgp.jpg" alt="">
					</div>
					<div class="w3layouts"> 
						<img src="images1/pro.jpg" alt=" " />
						<h3>Moview Reviewer</h3>
						<label class="line"></label>
						<p>where every review counts. </p>
					</div>
					<div class="agileits-w3layouts">
						<div class="w3l">
							<h4><?php
							include('db.php');
							$query="select count(*) AS count from user_details" ;
							$result=mysql_query($query) or die(mysql_error());
							$row=mysql_fetch_assoc($result);
							echo($row['count']);
							?></h4>
							<h5>Users</h5>
						</div>
						<div class="w3-agile">
							<h4><?php
							include('db.php');
							$query="select count(*) AS count from movie_reviews" ;
							$result=mysql_query($query) or die(mysql_error());
							$row=mysql_fetch_assoc($result);
							echo($row['count']);
							?></h4>
							<h5>Reviews</h5>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<!-- //Profile-form -->
		<!-- calendar -->
		<div class="top-grids-3">
			<div class="w3l-calendar-left w3-agile-width">
			   <div class="signup-form">
				<h3>SIGN UP</h3>
				
				<p>First Name </p>
				<input type="text" name="username" id="username" placeholder="" required=""/>

<p>Last Name:</p><input type="text" name="lname" placeholder="">


<br><br><br><br>
<input type="submit" value="Sign Up" id="s" name="submit">

</div>
</div>
<div class="c"></div>
<div class="popup1">
<input type="button" value="X" style="float:right" id="close1">
<center><p id="p2">Start reviewing on Movie Reviewer</p><br><br><br>
<form method="post" action="userdetails.php" enctype="multipart/form-data">
<table><tr><td>
First Name:</td><td><input type="text" name="fname" placeholder="" required style="padding:5px"></td></tr>
<tr><td>Last Name:</td><td><input type="text" name="lname" placeholder="" required style="padding:5px"></td></tr>
<tr><td>Email:</td><td><input type="email" name="email" placeholder="" required style="padding:5px"></td></tr>
<tr><td>Birthdate:</td>
<td><input type="date" name="dob" required style="padding:5px"></td></tr>
<tr><td>Select your Username:</td>
<td><input type="text" name="username" placeholder="" required style="padding:5px"></td></tr>
<tr><td>Select your password:</td>
<td><input type="password" name="pwd" placeholder="" required style="padding:5px"></td></tr>
<tr><td>Upload your pic:</td><td><input type="file" name="dp" required></td></tr></table><br><br>
<input type="submit" value="Sign Up" name="submit" id="su"><br><br>
<p id="p1">By clicking "Sign Up",you agree to our <a href="tos.html" target="_blank">Terms of Service</a> and <a href="pp.html" target="_blank">Privacy Policy</a>.</p></center>
</form>
</div>
</body>
</html>