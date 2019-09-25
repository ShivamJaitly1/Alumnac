<?php
session_start();

if(!$_SESSION['var'])
{
	header("location:index.php");
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Jobs & Internships</title>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">

</head>

<body>
<?php include("includes/top.php");?>
	<?php include("includes/menul.php");?>

<?php
include("db/config.php");
$data="select profile,company,date,type,uname,content from jobs where id='$_GET[a]'";
$run=mysqli_query($conn,$data);

while($row_img=mysqli_fetch_array($run))
{
	$pro=$row_img[0];
$date=$row_img[2];
$company=$row_img[1];
$type=$row_img[3];
$user=$row_img[4];
$con=$row_img[5];
$q="SELECT fname,lname from users where uname='$user' ";
$run2=mysqli_query($conn,$q);
while($row_name=mysqli_fetch_array($run2)){
$fname=$row_name[0];
$lname=$row_name[1];

echo "<h1>$pro at $company</h1>
<table align='center' style='font-size:20px'>
<tr>
<td>Type</td><td>: </td><td>$type</td>
</tr>
<tr>
<td>Date Added</td><td>: </td><td>$date</td>
</tr>
<tr>
<td>Description</td><td>: </td><td>$con</td></tr>
<tr><td>Contact Person<td>:</td> </td>
<td > <a href='profile.php?rec=$user' id='login'>$fname $lname </a></td> <td></td></tr>

   "
;
}
}
echo "</table><br>";
?>
</body>
</html>