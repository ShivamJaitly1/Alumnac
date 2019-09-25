<style>
#rr{
	text-align:right;}
	#subms{
		width:40%;}
		#textmsg{
			width:160%;}
</style>
<div>
<form method="post">
<table >
<?php
include("db/config.php");
 $uname='somya';
$second="Shivam";

$q="SELECT * from messages where sender='$uname' and receiver='$second' or sender='$second' and receiver='$uname'";
$run=mysqli_query($conn,$q);

while($row_img=mysqli_fetch_array($run))
{
	$sender=$row_img[1];
$receiver=$row_img[2];
$msg=$row_img[3];
if($sender==$uname){
	echo "<tr><td><font color='blue'>$sender:$msg </td></tr> </font>";
	}
	else {
	echo "<tr id='rr'><td><font color='red'>$sender:$msg </td></tr></font>";}

}

?>
</table><table><tr><td>
<input type ="text" id="textmsg" name="msg"/></td><td> 
<input type="submit"  value="Send" id="subms" name="submsg" /></td></tr></table>
<?php
include("db/config.php");
if(isset($_POST['submsg']))
{
	$unme='somya';
	$second='Shivam';
		$newmsg=$_POST['msg'];

$insmsg="insert into messages(sender,receiver,msg) values('$unme','$second','$newmsg')";
$runmsg=mysqli_query($conn,$insmsg);

	
if($runmsg)
{header("Refresh:0");
	
}
}
?>

</form>
</div>
