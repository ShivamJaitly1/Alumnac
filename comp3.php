
<?php
session_start();

if(!$_SESSION['var'])
{
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>
<style>
h1{
	color:#003
	;
}
h3{
	color:grey;
}
th,td{
    padding:15px;
    text-align: left;
  }
  h2{
	font-size:36px;
	font-weight: bold;
}
  input[type=submit]
  {
    background-color: green;
    color:white;
   margin-left:0px;
    height:40px;
  width:150px;
  }
   #login
{
color:#003;
font-weight:bold;
font-size:24px;
}
  </style>
</head>
<body>
<?php include("includes/topindex.php");?>
<fieldset id="reg">
<legend><h1>Complete your Profile</h1></legend>
<h2>Current/Latest Work Details</h2>
<h3>Please enter your present work details.<h3>

<form method="post" enctype="multipart/form-data">
<table id="det">
<tr>
<th>
Current Organisation<span style="color:red">*</span>:</th> <td><input type="text" name="corg"    required /></td><td>
</td>
</tr>
<tr>
<th>
Position/Role: </th><td><input type="text" name="pos" 
></td>
</tr>
<tr>
<th>
Time Period: </th>
<td><select name="starty" id="starty">
<script>
var start = 2005;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("starty").innerHTML = options;
</script>
</select></td><td>
<select name="endy" id="endy" >
<script>
var start = 2005;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("endy").innerHTML = options;
</script>
</select><br /></td>
</tr>
<tr>
<td><p style="text-align:left;"><a  id ="login" href="comp2.php"> <-Back</a></td>
<td><input type="submit"  id="save" name="sub" value="Save and Continue" />
</td></p></tr> </table> <p style="text-align:right"><a id="login" href="comp4.php">Go to Next Step-></a>
</fieldset>
</body>
</html>
<?php
include("db/config.php");
if(isset($_POST['sub']))
{
 $uname="$_SESSION[var]";
   $corg=$_POST['corg'];
 $pos=$_POST['pos'];
 $sty=$_POST['starty'];
 $ey=$_POST['endy'];
  echo "$uname";

$ins="insert into workdetails(uname,currentorg,position,startyear,endyear) values('$uname','$corg','$pos','$sty','$ey')";

if((mysqli_query($conn,$ins)))
{
		header("location:comp4.php");
		

}

else
{
	 echo "<h1 align='center' style='color:black'> Unsuccessful,Try again</h1>";
}
}
?>