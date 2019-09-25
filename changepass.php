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
</head>

<body>
<?php include("includes/top.php");?>
	<?php include("includes/menul.php");?>
    <h1>Change Password</h1>
    <form method="post">
    <table align="center">
    <tr><td>Enter your Current Password:</td><td><input type="password" name="opass" /></td></tr>
    <tr><td>Enter your New Password:</td><td><input type="password" name="npass" /></td></tr>
    <tr><td colspan="2"><input type="submit" name="change" value="Change Password"/></td></tr>
    </table>
    </form>
	<?php
include("db/config.php");
$uname=$_SESSION['var'];
$data="select pass from users where uname='$uname'";
$run=mysqli_query($conn,$data);

while($row_img=mysqli_fetch_array($run))
{
	$pass=$row_img[0];
	if(isset($_POST['change'])){
	$old=$_POST['opass'];
	$np=$_POST['npass'];
	if($pass==$old)
	{
		$ch="update users set pass='$np' where uname='$uname'";
		$runn=mysqli_query($conn,$ch);
		if($runn)
		{echo "<script>alert('Successful');</script>";}
	}
	else
	{echo "<script>alert('Invalid Credentials');</script>";
		}} }?>

</body>
</html>