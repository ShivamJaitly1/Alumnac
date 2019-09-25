<?php
session_start();

if(!$_SESSION['var'])
{
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Registration</title>
<link rel="icon" type="image/png" href="favicon (1).ico">
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("includes/topindex.php");?>
<script src="plugin/jq.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('#btn1').click(function(){
	$('#teach').hide();
	$('#alum').fadeIn();
}
   ); 
});
$(document).ready(function() {
	$('#btn2').click(function(){
	$('#alum').hide();
	$('#teach').fadeIn();
	
}
   ); 
});
</script>
<style>
h1{
text-align:center;
font-size:36px;
	}
	p{font-size:24px;
		font-weight: bold;
	}
	#btn1{
		background-color: blue;
		color:white;
		height:110%;
	width:250px;
		font-size:24px;
	}
	#btn2{
		background-color: #87cefa;
		color:white;
		height:110%;
	width:320px;
	margin-left:180px;
	font-size:24px;
	}
	#btn3{
		background-color: orange;
		color:white;
		height:110%;
		font-size:24px;
	width:230px;
	margin-left:180px;
	}
	
#alum,#teach
{display:none;
float:left;
}
#alum
{
color:#000000;	

font-size:18px;
}

</style>
</head>
<body>
<h1>Choose to register as an alumnus/alumna or a faculty member</h1>
<br />
<fieldset id="reg">
<p>Hey <?php echo $_SESSION['var'];?>,  Please add the course you studied at Northern India Engineering College,Delhi if you're an alumnus or existing student, or add your department and designation details if you're a faculty member.

</p>
<br />
<div id="regas">
<ul><form method="post">
    <li > <input type="button" id="btn1" name="alx" value="Register as Alumni" >&nbsp;</li>
    <li> <input type="button" id="btn2"name="te" value="Register as Faculty member" > &nbsp; </li>
    <li> <input type="button" id="btn3" name="st" value="Register as Student"> &nbsp;</li>
</form></ul>
</fieldset>
</div>

<div id="alum">
<table>
<form method="post">
<tr><th>
<h2> Course/Degree: </th>
<td>
<select name="courses">
<option value="">-</option>
<option value="Btech-Computer Science & Engineering">Btech-Computer Science & Engineering</option>
<option value="Btech-Electronics & Communication Engineering">Btech-Electronics & Communication Engineering</option>
<option value="Btech-Mechanical & Automation Engineering">Btech-Mechanical & Automation Engineering</option>
<option value="Btech-Electrical & Electronics Engineering">Btech-Electrical & Electronics Engineering</option>
<option value="Btech-Information Technology">Btech-Information Technology</option>
<option value="Btech-Civil Engineering">Btech-Civil Engineering</option>
<option value="Btech-Mechanical Engineering">Btech-Mechanical Engineering</option>
<option value="Master of Business Administration">Master of Business Administration</option>
<option value="Master of Computer Application ">Master of Computer Application </option>
</select><br /></td>
</tr></h2>
<tr><th>
<h2>
Graduation Year: </th>
<td>
<select name="year" id="year">
<script>
var start = 2005;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;
</script>
</select><br /></td>
</tr>
</h2>
<tr><th>
<h2><input type="submit" value="Submit for Approval" name="ins"/></h2></th></tr>
</table>
<?php
include("db/config.php");
if(isset($_POST['ins']))
{$year=$_POST['year'];
$uname="$_SESSION[var]";
$courses=$_POST['courses'];
$role="alumni";
$insq="insert into details(uname,courses,year,role) values('$uname','$courses','$year','$role')";
$run=mysqli_query($conn,$insq);
if($run)
{
	echo("<script>location.href = 'complete.php';</script>");
	}
else{
echo "<h1 align='center' style='color:red'>404 error</h1>";
}
}
?>
<ul>
<li>Graduation year is the year of completion of that particular course,Make sure you fill it correctly so that it will help us identify your batch.
</li>
<li>
If you did not graduate from NIEC,Delhi or discontinued or still pursuing the course,please enter the year your batchmates graduated or the year when you will be completing the course.</li></ul>
</form>
</div>

<div id="teach">
<h2>Hey</h2>
</div>
</body>
</html>

