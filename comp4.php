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
<style>
h1{
  color:#003;
}
h3{
  color:grey;
}
	h2{
	font-size:36px;
	font-weight: bold;
}
th,td{
    padding:15px;
    text-align: left;
  }
  input[type=submit]
  {
    background-color: green;
    color:white;
       height:40px;
  width:150px;
  margin-left:0px;
  }
  #add,#add1,#add2
  {
	  width:50px;
	  height:50px;
	  background-color:#006;
	  color:white;
	  font-size:36px;}
   #login
{
color:#003;
font-weight:bold;
font-size:24px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>
<script src="plugin/jq.js" type="text/javascript"></script>

</head>

<body>
<?php include("includes/topindex.php");?>

<fieldset id="reg">
<legend><h1>Complete your Profile</h1></legend>
<h2> Describe your Work Experience</h2>
<h3>Please add your relevant work experience to your profile.</h3>

<form method="post" enctype="multipart/form-data">
<table id="det">
<tr>
<th>
Total years of experience <span style="color:red">*</span>:</th> <td colspan="2"><input type="radio" name="y" value="0-1"/>0-1
<input type="radio" name="y" value="1-3" />1-3
<input type="radio" name="y" value="3-5" />3-5
<input type="radio" name="y" value="5-10" />5-10
<input type="radio" name="y" value="10+" />10+years</td>
</tr>
<tr>
<th>
<br />Roles you were in:</th><td><br /><input type="text" name="role[]" 
></td><td><br /><input type="button" id="add" value="+" onClick="addInput()" />
</td><tr><td></td><td><span id="responce"></span>
</td></tr>
<script>
//var countBox =2;
var boxName = 0;
function addInput()
{
     var boxName="role[]" 
document.getElementById('responce').innerHTML+='<br/><input type="text" name="'+boxName+'" "  /><br/>';
    // countBox += 1;
}
</script>
<tr><th><br />Industries you have worked in:</th><td><br /><input type="text" name="ind[]" 
></td><td><br /><input type="button" id="add1" value="+" onClick="add1Input()" />
</td><tr><td></td><td><span id="res1"></span>
</td></tr>
<script>
//var count =2;
var boxName = 0;
function add1Input()
{
     var boxName="ind[]"; 
document.getElementById('res1').innerHTML+='<br/><input type="text"  name="'+boxName+'" "  /><br/>';
     //count+= 1;
}
</script>
<tr><th><br />You have experience in:</th><td><br /><input type="text" name="exp[]" 
></td><td><br /><input type="button" id="add2" value="+" onClick="add2Input()" />
</td><tr><td></td><td><span id="res2"></span>
</td></tr>
<script>
//var counte =2;
var boxName = 0;
function add2Input()
{
     var boxName="exp[]"; 
document.getElementById('res2').innerHTML+='<br/><input type="text" id="'+boxName+'" name="'+boxName+'" "  /><br/>';
     //counte+= 1;
}
</script>
<tr>
<td><p style="text-align:left;"><a href="../alumnac/complete.php"> -Back</a></td>
<td><input type="submit" id="save" name="sub" value="Save and Continue" />
</p></td></tr></table><p style="text-align:right" style="font-size:24px"><a id="login" href="pending.php">Go to Next Step-></a></p>
</fieldset>
</body>
</html>

<?php
include("db/config.php");
if(isset($_POST['sub']))
{
 $uname="$_SESSION[var]";
   $exp=$_POST['y'];
 $roles = $_POST['role'];
$inds = $_POST['ind'];

foreach( $inds as  $s) {
  //echo "The name is ".$n."";
foreach( $roles as  $r ) {
  //echo "The name is ".$n."";
$addrole="insert into roles_worked(uname,roles,industries) values('$uname','$r','$s');";
mysqli_query($conn,$addrole);
}
}
$skills = $_POST['exp'];

foreach( $skills as  $e) {
  //echo "The name is ".$n."";
$addskill="insert into skills(uname,skill) values('$uname','$e');";
mysqli_query($conn,$addskill);
}
  

$ins="update workdetails set totalexp='$exp' where uname='$uname'";

if((mysqli_query($conn,$ins)))
{
		echo("<script>location.href = 'pending.php';</script>");
		}

else
{
	 echo "<h1 align='center' style='color:black'> Unsuccessful,Try again</h1>";
}
}
?>