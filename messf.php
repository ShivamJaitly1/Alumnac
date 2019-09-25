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
<title>Chat</title>
<script src="plugin/jq.js" type="text/javascript"></script>
<style>
#receiver
{
	display:none;}
</style>
<script>
$(document).ready(function() {
	$('#newcon').click(function(){
		$('#receiver').show();
		$('#conver').hide();
}
   ); 
});
$(document).ready(function() {
	$('#start').click(function(){
		$('#conver').show();
		$('#receiver').hide();
}
   ); 
});
</script>
</head>

<body>
<?php include("includes/top.php");?>
	<?php include("includes/menul.php");?>
    <br />
<br />
<a href="#" id="newcon">Start a new Conversation</a>
<div id="receiver">
<form method="post">
<select name="userx">
<?php
include("db/config.php");
$data="select fname,lname,uname from users";
$run=mysqli_query($conn,$data);
echo " <option value=''>Select a User</option>";
while($row_imgr=mysqli_fetch_array($run))
{
$fname=$row_imgr[0];
$lname=$row_imgr[1];
$uname=$row_imgr[2];
echo "<option value='$uname'>$fname&nbsp$lname</option> ";

}
?>
</select></p>
<input type='submit' name='startq' id='start' value="Start"></form>
</div>

<div id="conver">
<form method ="post">


<?php
if(isset($_POST['startq'])){
$se=$_POST['userx'];
echo "<br> <b>Chat with @".$se."</b><br>";
}
?>
<input type="text" name="msg" placeholder="Enter your Message here "/>
<input type="submit" name="send" value="send" />
</form>
</div>
<?php
if(isset($_POST['send'])){
$msg=$_POST['msg'];
$sender=$_SESSION['var'];
echo "<br><b>@$sender</b>  ".$msg."<br>";
}
?>
</body>
</html>