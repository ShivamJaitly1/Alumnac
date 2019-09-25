<html>
<head>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>

<style>
p{
	font-size=150%;
}	
#p1
{	color:#333;
	font-weight:bold;
	font-size:120%;
}
#content{
	margin:auto;
	width:1560px;}
h2{ display:table;
	color:black;

	padding-right: 50px;
	border-bottom:solid #F00;
	 width:200px; 	padding-bottom:5px;}
	 #gapic
{	height:200px;
	width:200px;
	}
#gapic:hover
	{height:450px;
	width:450px;
	transition:all 1s;
		margin:auto;	
		}

</style>
</head>
<body>
<div id="content">
<div id="leftmain">
<br />
<div id="toph" style="margin-top:5px;">
<h2 >NEWSROOM</h2>
<?php include("includes/getnews.php");?>
</div>
<div id="bot" style="margin-top:5px;">
<h2>VIDEO</h2>
<br />
<video width="700" height="370" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
</div>
</div>
<div id="rightmain" style="float-left">
<div id ="toph" style="margin-top:28px;">

<h2>EVENTS</h2>
<?php include("includes/getevents.php");?>
</div>
<div id="bot" style="margin-top:5px;">

<h2><a href="gallery.php">GALLERY</a></h2><br />
<?php
include("db/config.php");
$data="select * from gallery ";
$run=mysqli_query($conn,$data);
while($row_imgr=mysqli_fetch_array($run))
{
$name=$row_imgr[1];
echo "<img src='pics/$name' id='gapic' />&nbsp;";
}

?>
</div>
</div>
</div>

</body>
</html>