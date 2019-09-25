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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">

<style>
#a
{ width:500px;
height:auto;
float:right;
display:block;}

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
  #login
{
color:#003;
font-weight:bold;
font-size:24px;
}
  input[type=submit]
  {
    background-color: green;
    color:white; 
	margin-left:0px;
  }
  input[type=url]{
	  height:40px;
	  width:200px;}
   h6{
    color: red;
  }
  #show{
    color: red;
  }
</style>
</head>

<body>
<?php include("includes/topindex.php");?>
<br />
<br />


<fieldset id="reg">
<legend><h1>Complete Your Profile</h1></legend>
<h2>Contact Details</h2>
<h3>Help your alumni reach you!</h3>
<br />
<form method="post" enctype="multipart/form-data">
<table id="det" >
<tr>
<th>
Mobile No:<span style="color:red">*</span></th> <td><input type="text" name="phone" onfocus="func(this)"   required /></td><td>
<div id="a"></div>
<script>
function func(x)
{
	document.getElementById('a').innerHTML ="Your contact details are visible to your batchmates by Default.You can change your privacy settings to either Only Admin,Batchmates or All Registered users after your registration is approved in 'Edit Profile' Section";}
</script>
</td>
</tr>
<tr>
<th>
Home Phone No : </th><td><input type="text" name="homephn" 
></td>
</tr>
<tr>
<th>
Website/Portfolio/Blog: </th>
<td><input type="url" name="url"   placeholder="www.yourwebsite.com"
></td>
</tr>
<tr><td><h2>Present Address</h2></td></tr>
<tr>
<th>
Address:</th> <td><input type="text" name="house" placeholder="Street & Locality"
></td>
</tr>
<tr>
<th>
City: </th><td><input type="text" name="city" placeholder="City"
></td>
</tr>
<tr>
<th>
State: </th>
<td><input type="text" name="state" placeholder="State"
></td>
</tr>
<tr>
<th>
Country: </th>
<td><input type="text" name="country" value="India" placeholder="Country"
></td>
</tr>
<tr>
<td><p style="text-align:left;"><a href="complete.php"> -Back</a></td>
<td width="400px" colspan="2"> <input type="submit" id="save" name="sub" value="Save and Continue" /></td></tr>
</table>
<p style="text-align:right"><a id="login" href="comp3.php">Go to Next Step-></a></p>
</fieldset>
</body>
</html>
<?php
include("db/config.php");
if(isset($_POST['sub']))
{
 $uname="$_SESSION[var]";
   $phone=$_POST['phone'];
 $homephn=$_POST['homephn'];
 $url=$_POST['url'];
 $house=$_POST['house'];
  $city=$_POST['city'];
 $state=$_POST['state'];
 $country=$_POST['country'];
$ins="update details set mob='$phone',homephn='$homephn',website='$url',houseno='$house',city='$city',state='$state',country='$country' where uname='$uname'";

if((mysqli_query($conn,$ins)))
{
		echo("<script>location.href = 'comp3.php';</script>");
}

else
{
	 echo "<h1 align='center' style='color:black'> Unsuccessful,Try again</h1>";
}
}
?>