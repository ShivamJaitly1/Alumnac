<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>
<style>
img {
    -webkit-backface-visibility: hidden; 
    -ms-transform: translateZ(0); /* IE 9 */
    -webkit-transform: translateZ(0); /* Chrome, Safari, Opera */
    transform: translateZ(0);
}

#hpic {
    display: none;
	border:none;
width:0;
height:0;
}
#hey:hover
	{height:350px;
	width:350px;
	transition:all 1s;
		margin:auto;	
		}
	#contentg
	{height:auto;
	width:97%;
margin:auto;} 
    #one,#two
	{width:35%;
	height:auto;
margin:auto;
float:left;
border:none;
box-shadow:0px 0px 20px #999999;
		}
		#one,#toph
		{
			background-color:#FFFFFF;}
			#toph
			{border:solid #FFFFFF;
			height:200px;}
			#three
			{height:auto;
margin:auto;
float:left;
border:none;
box-shadow:0px 0px 20px #999999;
				width:30%;
				}
#help
{background-color:#6c648b;
width:auto;
margin:auto;
padding-left:20px;
	border:solid #CCC;
	}
	#topone{
		height:auto;
		}
#bot{ height:56%;}
	a{
		text-decoration:none;}
	font{

	}
	h1{
		font-size: 20px;
	}
	#see1{
		float:right;
	}
	
	h3{
		color: white;
		text-align: center;
	}
	#bot1{
		
	    height:600px;
		font-weight: bold;
		font-size:30px;	
		padding-left:10px;
	}

		

	 </style>
</head>

<body>
<div id="contentg">
<?php
include("db/config.php");
$user="$_SESSION[var]";
$fetch_data="select * from users where uname='$user'";
$run=mysqli_query($conn,$fetch_data);
echo "<ul>";
while($row_wise_data=mysqli_fetch_array($run))
{
	$fname=$row_wise_data[3];
	$lname=$row_wise_data[4];
	
}

?>

<p><font face="Lucida Sans Unicode, Lucida Grande, sans-serif" color="#990000" size="+6">Welcome <?php echo $fname?>!</font><b>&nbsp;Here's everything that's happening on your Alumni Network!</b></p>

<div id="one">
<div id="topone" >
<table ><tr><td width="470px">
<p ><font face="Comic Sans MS, cursive" color="#0B3C5D" size="+3">Latest Discussions</p> </td><td  align="right"><a href="posts.php" id="see1">&nbsp;See all</a>
</td></tr>
</table>
<?php
include("db/config.php");
$data="select * from posts ORDER BY id DESC limit 3";
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
<tr><td colspan='2'><h4>&nbsp;&nbsp;$post</h4></td></tr><tr><td colspan='3' id ='$h'><img  id='popic' src='pics/$postpic' height='100px' width='100px' onerror='this.style.display='none'></td></tr>
</table>
   "
;
}
}
?>

</div>
<div id="bot">
<p><table><tr><td width="470px">
<font face="Comic Sans MS, cursive" color="#fba100" size="+3">Jobs and Internships</font></td><td><a href="jobs.php" align="right" id="see2">See all</a></td></tr></p>
<?php
include("db/config.php");
$data="select profile,company,date,id from jobs ORDER BY id DESC limit 4";
$run=mysqli_query($conn,$data);
echo "<table align='center'>";
while($row_img=mysqli_fetch_array($run))
{
	$pro=$row_img[0];
$date=$row_img[2];
$company=$row_img[1];
$id=$row_img[3];
echo "
<tr><td colspan='4' width='100%'><hr  align='center'></td></tr><tr>
<td colspan='2' width='80%'><a href='openjob.php?a=$id' >$pro at $company </td>
<td width='20%'>$date </td> <td></td></tr>

   "
;

}
echo "</table><br>";
?>

</div>
</div>

<div id="two">
<div id="toph" >

<p ><font face="Comic Sans MS, cursive" color="#FBA100" size="+3">My Group</font></p>

<?php
include("db/config.php");
$uname=$_SESSION['var'];
$data="select year,courses from details where uname='$uname'";
$run=mysqli_query($conn,$data);

while($row_img=mysqli_fetch_array($run))
{
	$year=$row_img[0];
$course=$row_img[1];
$p="SELECT count(*) from details where year='$year' and courses='$course' ";
$run2=mysqli_query($conn,$p);
while($row_name=mysqli_fetch_array($run2)){
$mem=$row_name[0];

echo "<table ><tr><td><font color='#000' size='+2'><a href='mygroup.php'><b>$course,$year</a></b></font></td></tr>
<tr><td>$mem Members</td></tr></table><br><br>";
}
}
?>

</div>
<div id="bot">
<p ><font face="Comic Sans MS, cursive" color="#6bbaa7" size="+3">Birthday's Next</font></p><br />
<br />
<?php
include("db/config.php");
$mo=date("M") ;
$m=date("m");
$n=$m+1;

 $date=date_create("2013-".$n."-1");
$next=date_format($date,"M");


$data="select * from users where month='$mo' or month='$next' order by month desc limit 4 ";
$run=mysqli_query($conn,$data);
echo "<table  align='center'>";
while($row_img=mysqli_fetch_array($run))
{	$uname=$row_img[1];
	$fname=$row_img[3];
$lname=$row_img[4];
$day=$row_img[8];
$month=$row_img[9];
$p="SELECT courses,year,pic from details where uname='$uname' ";

$run2=mysqli_query($conn,$p);
while($row_name=mysqli_fetch_array($run2)){
$course=$row_name[0];
$year=$row_name[1];
$pic=$row_name[2];

}
echo"<tr><td colspan='4'><hr size='0' color='#444'></td></tr>
<tr>
<td ><img style='vertical-align: bottom;' src='pics/$pic'  height='70px' width='70px' id='dp'/></td>
<td><p font-size='+3'><b><a href='profile.php?rec=$uname' id='arec'>&nbsp;$fname $lname</a></b><br><font color='#666666'>&nbsp;$course,$year </font></td> <td></td>
<td align='center' ><b>$month<br>$day</b></td>";
}
echo "</table>";
?>
</div>
</div>


<div id="three">

<div id="help">
<p ><h3><font face="Comic Sans MS, cursive" color="#fff" size="+3">&nbsp;Help us Build our Database!</font></h3><font color="#FFFFCC"; size="+2">
Join the initiative to build an alumni database from your friends on facebook!</font>
</p>
<br />
<br />
<br />

<table>
<tr>
<td>
<a href="#"><img srcset="like.jpg" width="50px" height="30px" /></a>
</td>
<td>
<a href="#"><img srcset="share.jpg" width="50px" height="30px"/></a>
</td>
</tr>
</table>
</div>
<div id="bot1"><p><font face="Comic Sans MS, cursive" color="#0b3c5d" size="+3">Recent Photos</font></p>
<?php
include("db/config.php");
$data="select pic from posts where pic != ' 'order by id desc limit 4";
$run=mysqli_query($conn,$data);
echo "<p align='center'>";
while($row_imgr=mysqli_fetch_array($run))
{
$name=$row_imgr[0];
if($name=="")
{
	$h="hpic";}
	else 
	{$h="hey";}
echo "<img id='$h' src='pics/$name' height='180px' width='180px' />&nbsp;";
}
echo "</p>";
?>
</div>
</div>


</body>
</html>