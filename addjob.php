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
<title>Untitled Document</title>
</head>


<body>
 <div id="gcontent">
      
<form method="post" >
<fieldset id="reg">
<legend>Blog</legend>
<table align="center">
<tr>
<th>Job Profile:</th> <td><input type="text" name="pro" required></td>
</tr>
<tr>
<th>Company:</th> <td><input type="text" name="com" required></td>
</tr>
<tr>
<th>Type:</th> <td><select name="type"><option value="internship">Internship</option>
<option value="job">Job</option></select></td>
</tr>

<tr>
<th>
Description: </th><td><textarea name="con" cols="50" rows="40" required placeholder="Write your content here..." ></textarea></td>
</tr>
<tr><th colspan="3">
<input type="submit"  name="sub" value="Upload" /></th>
</tr>
</table>
</fieldset >
</form>
<?php
include("db/config.php");
if(isset($_POST['sub']))
{	$type=$_POST['type'];
	$date=date("M-d");
	$profile=$_POST['pro'];
	$company=$_POST['com'];
	$content=$_POST['con'];
	$uname=$_SESSION['var'];
		$ins="insert into jobs(uname,type,date,profile,company,content) values('$uname','$type','$date','$profile','$company','$content')";
$run=mysqli_query($conn,$ins);
if($run)
{
//header("location:showimg.php");
echo "<script>alert('success');</script>";	
}
else
{
echo "<script>alert('Error');</script>";	
}
}
?>
</div>
</body>
</html>