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
<!--
<script src="plugin/jq.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('#search').click(function(){
	$('#mainresult').hide();
		$('#ret').show();
}
   ); 
});
$(document).ready(function() {
	$('#back').click(function(){
	$('#mainresult').show();
		$('#ret').hide();
}
   ); 
});
</script>-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>
<style>
#rightco
{
	float:right;
	width:30%;
	height:auto;
	}
	#mainresult
	{float:left;
	width:69%;
	
	height:auto;
		}
		#name{
			float:right;}
			</style>
</head>

<body>
<?php include("includes/top.php");?>
	<?php include("includes/menul.php");?>
<br />
<div id="co">
<div id="rightco">
	    <h3>Search Your Mates</h3> 
    <p>You  may search either by first or last name</p> 
    <form  method="post"   id="searchform"> 
    <table ><tr><td colspan="2 ">
	      <input  type="text" name="name" id="name"> </td></tr><tr><td>
	     <input type="submit" name="submit"  id="search" value="Search"> </td></tr>
         </table>
	    </form>
       
	      <?php
  if(isset($_POST['submit'])){
     $name=$_POST['name'];
  include("db/config.php");
  $sql="SELECT  uname, fname, lname FROM users WHERE fname LIKE '%".$name."%' OR lname LIKE '%".$name."%' OR uname LIKE '%".$name."%'";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result)){
          $FirstName  =$row[1];
          $LastName=$row[2];
          $ID=$row[0];
		   $que="SELECT pic,courses,year from details where uname='$ID'";
 $run3=mysqli_query($conn,$que);
 while($rown=mysqli_fetch_array($run3)){

$pic=$rown[0];
$course=$rown[1];
$year=$rown[2];
if(($run3)&&($year!="")){
  //-display the result of the array
    echo "<table align='center'>
<tr><td colspan='2' width='100%'><hr  align='center'></td></tr><tr>
<td width=15% rowspan='2'><img style='vertical-align: bottom;' src='pics/$pic'  height='75px' width='70px' id='dp'/></td>
<td><p font-size='+5'><b><a href='profile.php?rec=$ID' id='arec'>&nbsp;$FirstName $LastName</a></b></font><br><font color='#666666'>&nbsp;$course,$year </font></td> </tr>
<tr><td></td></tr>
</table>
   "
;}
else{
  echo  "<p>No Results Found</p>
  ";
  }

   }
  }
  }
  ?>
</div>
<div id="mainresult">
<h1>All Members</h1>
<?php
include("db/config.php");
 $qu="SELECT fname,lname,details.pic,details.uname,courses,details.year from details,users where details.uname=users.uname";
 $run2=mysqli_query($conn,$qu);
 while($row_name=mysqli_fetch_array($run2)){
$fname=$row_name[0];
$lname=$row_name[1];
$pic=$row_name[2];
$username=$row_name[3];
$course=$row_name[4];
$year=$row_name[5];

echo "<table align='center'>
<tr><td colspan='2' width='100%'><hr  align='center'></td></tr><tr>
<td width=15% rowspan='2'><img style='vertical-align: bottom;' src='pics/$pic'  height='75px' width='70px' id='dp'/></td>
<td><p font-size='+5'><b><a href='profile.php?rec=$username' id='arec'>&nbsp;$fname $lname</a></b></font><br><font color='#666666'>&nbsp;$course,$year </font></td> </tr>
<tr><td></td></tr>
</table>
   "
;
}

?>
</div>
</body>
</html>