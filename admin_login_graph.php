<?php
session_start();
error_reporting(0);
$movie=$_POST['A'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>User Profile</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- gallery -->
<link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />

<!-- //gallery -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 

<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Gidugu" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

</head>
	
<body>

<div class="main" id="home">
<!-- banner -->
	<div class="banner">
			<!--Slider-->
			<img src="<?php echo $_SESSION['dp']?>" height="300" width="250">
					<h2>Hi <?php echo $_SESSION['username'];?></h2>
					<span><?php echo $_SESSION['email'];?></span>
					<br><br>
				<div class="callbacks_container">
					
			<div class="clearfix"></div>
		</div>
		<!--//Slider-->
					<ul class="top-links">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
	</div>
<!-- //banner -->
	</div>
<!-- header -->
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<h1><a class="navbar-brand" href="index.html"><span class="one">M</span>ovie Reviewer</a></h1>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1" id="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a class="scroll" href="index.html">About</a></li>
							<li><a href="#about" class="scroll hvr-bounce-to-bottom">Review a movie</a></li>
							<!--<li><a href="#services" class="scroll hvr-bounce-to-bottom"></a></li>-->
							<li><a href="#education" class="scroll hvr-bounce-to-bottom">See movie ratings</a></li>
							<!--<li><a href="#gallery" class="scroll hvr-bounce-to-bottom">Bollywood gossips</a></li>-->
							<!--<li><a href="#mail" class="scroll hvr-bounce-to-bottom">Contact</a></li>-->
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
</div>
<!-- //header -->
<!-- about -->
	<div class="about" id="about">
		<div class="container">
					<h3 class="w3l_head">ADD A MOVIE</h3>
			<p class="w3ls_head_para">Because every feedback matters.</p>
		<div class="w3l-grids-about">
				<div class="col-md-5 w3ls-ab-right">
					<div class="agile-about-right-img">
						<img src="<?php echo $_SESSION['dp']?>" height="450" width="120">
					</div>
				</div>
				<div class="col-md-7 w3ls-agile-left">
					<div class="w3ls-agile-left-info">
						<br><br><br><center><form  action="add.php" method="GET">
						Movie Name: <input type="text" name="movie">
<br><br>
<input id="text2" type="submit" name ="submit"  value="SUBMIT"/></b></font>
</form></center>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>

 <div class="education" id="education">
	    <div class="col-md-6 education-w3l">
		     <h3 class="w3l_head three">See Movie Reviews</h3>
			  <div class="education-agile-grids">
				  <div class="education-agile-w3l" style="padding-left:100px;padding-top:80px;">
				     <div class="education-agile-w3l-year">
					     <h4>Selected Movie:</h4><br>
						   <h4> Total Reviews: </h4>
				     </div>
					 <div class="education-agile-w3l-info">
						   <br>
						   <b><?php echo $movie?></b><br><br><br>
						   <b><?php
						   include("db.php");
						   $query="select count(*) as count from movie_reviews where movie_name='".$movie."'";
						   $result=mysql_query($query);
						   $row=mysql_fetch_assoc($result);
						   echo $row['count'];
						   ?></b>

				     </div><br><br><br>
					 <form action="admin_login.php">
	
					<input type="submit" value="Back" style="margin-top:100px;margin-left:100px;font-size: 1em;
    color: #fff;
    background: #2DCC70;
    border: none;
    letter-spacing: 1px;
    outline: none;
    cursor: pointer;
    padding: .7em 0em;
    -webkit-appearance: none;
    width: 30%;
    text-align: center;
    display: inherit;
    font-family: 'Philosopher', sans-serif; ">
					 </form>
				      <div class="clearfix"></div>
				  </div>
				<br><br><br><br>
				<br><br><br><br>
				      <div class="clearfix"></div>
				  </div>
				 
			  </div>
		</div>
		<div class="col-md-6 skills">
		<h3 class="w3l_head two">MOVIE REVIEW</h3>
	     <div class="skill-agile">
		<?php
		include('db.php');
		include "libchart/libchart/classes/libchart.php";
		$chart = new VerticalBarChart(550, 400);
		$dataSet = new XYDataSet();
		$query="Create temporary table reviews (id INT(255) AUTO_INCREMENT PRIMARY KEY,
		review VARCHAR(255) NOT NULL,
		number INT(255) NOT NULL)";
		mysql_query($query) or die(mysql_error());
		
		$query1="select count(*) AS p_num from movie_reviews where movie_name='".$movie."' AND response='Positive'";
		$result1=mysql_query($query1) or die(mysql_error());
		while($row=mysql_fetch_assoc($result1))
		{
		$pno= $row['p_num'];
		}
		$query2="select count(*) AS n_num from movie_reviews where movie_name='".$movie."' AND response='Negative'";
		$result2=mysql_query($query2) or die(mysql_error());
		while($row1=mysql_fetch_assoc($result2))
		{
		$nno= $row1['n_num'];
		}
		//$total= $pno + $nno;
		//echo $total; 
		$q="insert into reviews(review,number) values ('positive',$pno)";
		$r=mysql_query($q) or die(mysql_error());
		$q1="insert into reviews(review,number) values ('negative',$nno)";
		$r1=mysql_query($q1) or die(mysql_error());
		
		$query3="select * from reviews";
		$result3=mysql_query($query3);
		$num_results=mysql_num_rows($result3);
		if($num_results>0)
		{
		 while( $row3 = mysql_fetch_assoc($result3) ){
            extract($row3);
            $dataSet->addPoint(new Point("".$row3['review']."", $number));
		}
		}
		echo "<center>";
		$chart->setDataSet($dataSet);
		$chart->setTitle("Reviews for ".$movie);
		$chart->render("images/to.png");
		echo "</center>";
	 echo "<img alt='Line graph'  src='images/to.png'/>";
		?>
					</div>

						</div>
		 </div>
		 <div class="clearfix"> </div>
		</div>
 <!-- //education -->
 <!-- /experience -->
 
		 <div class="clearfix"> </div>
		</div>
 
</body>
</html>