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
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="favicon (1).ico">
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
    h2{
    color:#333;
	font-weight:bold;
	font-size:36px;
  }
  input[type=submit]
  {
    background-color: green;
    color:white;
    height:40px;
  width:150px;
  }
  
  h1{
    	color:#003;
	font-weight:bold;
  }
 
 #login
{
color:#003;
font-weight:bold;
font-size:24px;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>
</head>

<body>
<?php include("includes/topindex.php");?>
<br />
<fieldset id="reg">
<legend><h1>Complete your Profile</h1></legend>
<p>

<h2>Profile Photograph</h2>
<h3>Help your friends identify you,please upload a picture!</h3>
<br />
<form method="post" enctype="multipart/form-data">
<table>
<tr>
<td rowspan="2"><img src="user.png" id="dp" /></td>
<th>
Choose a Profile picture
</th></tr><tr><td colspan="3" align="right"><input type="file" name="image" onChange="readURL(this);" /></td>

</tr>
<script>function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#dp')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>
<tr>
<td><br /><input type="submit" id="save" name="pic" value="Save and Continue"/></td>
</tr>
</table>
<br />

<p style="text-align:right;"}><a id="login" href="comp2.php">Go To Next Step->></a>
</fieldset>
</body>
</html>
<?php
include("db/config.php");
if(isset($_POST['pic']))
{
 $uname="$_SESSION[var]";
   $name=$_FILES['image']['name'];
$temp_name=$_FILES['image']['tmp_name'];

move_uploaded_file($temp_name,"pics/$name");
 
  
$ins="update details set pic='$name' where uname='$uname'";

if((mysqli_query($conn,$ins)))
{
		echo("<script>location.href = 'comp2.php';</script>");
		

}

else
{
	 echo "<h1 align='center' style='color:black'> Unsuccessful,Try again</h1>";
}
}
?>