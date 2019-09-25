
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
<script>
function next(){
	window.location("homepage.php");}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>

<style>
h1{
	color:grey;
}
 input[type=button]
  {
    background-color: green;
    color:white;
   
    height:40px;
  width:150px;
  }
  th,td{
    padding:15px;
    text-align: center;
  }
  .like
  {padding:0;
   border-radius:10px;
  background-position:center;
        background-image:url(like.jpg);
	  background-repeat:no-repeat;
	 background-size:cover;	  	  }
	 .share
  {padding:0;
   border-radius:10px;
  background-position:center;
        background-image:url(share.jpg);
	  background-repeat:no-repeat;
	 background-size:cover;	  	  }
</style></head>
<body>
<?php include("includes/topindex.php");?>

<fieldset id="reg">
<h1>
All Set</h1>
<h2>Please like and share  this website to share the word !</h2>
<table>
<tr>
<td>&nbsp;
<input type="button" class="like" />
</td>
<td>
<input type="button" class="share" />

<br />
<br /></td>
</tr>
<tr>
<td><input type="button" name="btn"  value ="Continue" onClick="next();" /></td>
</tr>
</table>
</fieldset>
<?php
$uname=$_SESSION['var'];
echo"
<script>
function next(){
	window.open('homepage.php?nm=$uname');}
</script>";
?>
</body>
</html>