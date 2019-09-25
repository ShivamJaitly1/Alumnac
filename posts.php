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
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">
<title>News Feed</title>
</head>

<body>
<?php include("includes/top.php");?>
	<?php include("includes/menul.php");?>
<?php
include("db/config.php");
$data="select * from posts ORDER BY id DESC ";
$run=mysqli_query($conn,$data);

while($row_img=mysqli_fetch_array($run))
{
	$post=$row_img[3];
$tdate=$row_img[2];
$uname=$row_img[1];
$postpic=$row_img[4];
if($postpic=="")
{
	$h="hpic";}
	else 
	{$h="hey";}
$q="SELECT fname,lname,pic from details,users where details.uname='$uname'and users.uname='$uname' ";
$run2=mysqli_query($conn,$q);
while($row_name=mysqli_fetch_array($run2)){
$fname=$row_name[0];
$lname=$row_name[1];
$pic=$row_name[2];


echo "<table align='center'>
<tr><td colspan='2' width='100%'><hr  align='center'></td></tr><tr>
<td width=15% rowspan='2'><img style='vertical-align: bottom;' src='pics/$pic'  height='75px' width='70px' id='dp'/></td>
<td><p font-size='+5'><b><a href='profile.php?rec=$uname' id='arec'>&nbsp;$fname $lname</a></b><br><font color='#666666'>&nbsp;$tdate </font></td> </tr>
<tr><td></td></tr>
<tr><td colspan='2'><h4>&nbsp;&nbsp;$post</h4></td></tr><tr><td colspan='3' id ='$h'><img id='popic' src='pics/$postpic' height='100px' width='100px' onerror='this.style.display='none'></td></tr>
</table>
   <br>"
;
}
}
?>
</body>
</html>