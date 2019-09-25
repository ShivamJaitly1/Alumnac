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
<title>Home</title>
</head>

<body>
<?php include("includes/top.php");?>
	<?php include("includes/menul.php");?>
<br />

<?php
include("db/config.php");
$uname=$_SESSION['var'];
$data="select year,courses from details where uname='$uname'";
$run=mysqli_query($conn,$data);

while($row_img=mysqli_fetch_array($run))
{$year=$row_img[0];
 $course=$row_img[1];
 echo "<h1>Batch of $year</h1><h2 align='center'>$course</h2>";
 $qu="SELECT fname,lname,pic,details.uname from details,users where details.year='$year'and details.courses='$course' and details.uname=users.uname ";
 $run2=mysqli_query($conn,$qu);
 while($row_name=mysqli_fetch_array($run2)){
$fname=$row_name[0];
$lname=$row_name[1];
$pic=$row_name[2];
$username=$row_name[3];


echo "<table align='center'>
<tr><td colspan='2' width='100%'><hr  align='center'></td></tr><tr>
<td width=15% rowspan='2'><img style='vertical-align: bottom;' src='pics/$pic'  height='75px' width='70px' id='dp'/></td>
<td><p font-size='+5'><b><a href='profile.php?rec=$username' id='arec'>&nbsp;$fname $lname</a></b></font></td> </tr>
<tr><td></td></tr>
</table>
   "
;
}
}
?>

</body>
</html>