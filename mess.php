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
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">
<style>
#msgbox
{
	alignment-adjust:baseline;
}
#ri
{
	float:right;}
</style>
</head>

<body>
<form method="post">
<input type="text" name="msg" id="msgbox" placeholder="Enter your message">
<input type="submit" name="send" value="Send">

</form>

<?php
include("db/config.php");
if(isset($_POST['send'])){
$msg=$_POST['msg'];
$sender=$_SESSION['var'];
$receiver='Shivam';

$q="insert into messages(sender,receiver,msg) values('$sender','$receiver','$msg')";
$run=mysqli_query($conn,$q);
if($run)
{
echo "<br><b>@$sender</b>  ".$msg."<br>";
}
}
$sender=$_SESSION['var'];
$qu="select msg from messages where sender='Shivam' and receiver='$sender' ";
$run2=mysqli_query($conn,$qu);
while($row_img=mysqli_fetch_array($run2))
{
	$msg2=$row_img[0];
if($run2)
{	echo "<br><div id='ri'><b>@Shivam</b>$msg2</div><br>";
	}
	}
?>

</body>
</html>