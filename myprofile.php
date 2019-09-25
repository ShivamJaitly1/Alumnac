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
<title>My profile</title>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">

<script src="plugin/jq.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('#w').click(function(){
	$('#info').hide();
		$('#photos').hide();
			$('#ques').hide();
	$('#wall').show();
}
   ); 
});
$(document).ready(function() {
	$('#i').click(function(){
	$('#info').show();
		$('#photos').hide();
			$('#ques').hide();
	$('#wall').hide();
}
   ); 
});
$(document).ready(function() {
	$('#p').click(function(){
	$('#info').hide();
		$('#photos').show();
			$('#ques').hide();
	$('#wall').hide();
}
   ); 
});
$(document).ready(function() {
	$('#q').click(function(){
	$('#info').hide();
		$('#photos').hide();
			$('#ques').show();
	$('#wall').hide();
}
   ); 
});
</script>
<style>
#pp{
border-radius:100%;
margin-left:5px;
margin-top:15px;
border:solid 1px #666666;
box-shadow:10px 10px 100px #999;
	}
#header
{position: relative;
height:300px;
width:100%

margin:auto;
}
#topmenu
{height:60px;
width:100%;
margin:auto;
 border:none;}
	#l
	{width:30%;
	float:left;
	margin:auto;
	border:none;
		}
		#r
		{float:right;
			width:67%;
			margin:auto;
			border:none;}
#content
{position: relative;
height:85%;
width:100%
margin:auto;
}
#footer
{height:50px;
width:98%;
border:1px solid;
margin:auto;
}
.floatdown {
    position: absolute;
    top: 200px;
    left: 10px;
}
.image-upload > input
{
    display: none;
}
#left
{position:relative;
	height:80%;
width:20%;
background:none;
border:none;
float:left;}
#right
{height:80%;
width:79%;
border:none;
border-left-style:groove;
float:left;
}
#info
{font-size:18px;
	}
#info,#ques,#photos
{
	display:none;
	border:none;}
	#hpic {
    display: none;
	border:none;
width:0;
height:0;
}
</style>
</head>

<body>
<div id='topmenu'>
<div ><?php include("includes/top.php");?></div>

<?php include("includes/menul.php");?>
<div id="header">

<img src="pics/college.jpg" width="100%"height="297px" />
<?php
include("db/config.php");
$user="$_SESSION[var]";
$data="SELECT fname,lname,pic from details,users where details.uname='$user'and users.uname='$user'";
$run=mysqli_query($conn,$data);

while($row_img=mysqli_fetch_array($run))
{$fname=$row_img[0];
$lname=$row_img[1];
	$pic=$row_img[2];
echo "<img src='pics/$pic' width='250px' height='250px' alt='my image' class='floatdown' id='pp'><br><br>

</div>

<div id='content'>
<div id='left'><br /><br /><br /><br /><br />
<ul> <li><h3>$fname $lname</h3></li> ";}
?>
    <li> <a href="#" id="w">Wall </a></li>
    <li> <a href="#" id="i">Info </a></li>
    <li> <a href="#"id="p">Photos </a></li>
   <li> <a href="#" id="q">Questions</a></li>
    </ul>

</div>
<div id="right">
<div id="wall">
 <form method="post" enctype="multipart/form-data">
<table>
<tr>
<td><textarea name="con" cols="150" rows="5" required placeholder="Share your Thoughts!" ></textarea></td>
</tr>
<tr><td colspan="2" align="center" class="image-upload">
    <label for="file-input">
       &nbsp; <img src="cam.png" width="50px" height="40px"/>
    </label>

    <input id="file-input" name="imag" type="file" onchange="readURL(this);" /></td>
<br />
<td><img src="" id="postp"  /></td>
</tr>
<script>function readURL(input) {
	
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#postp')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>

 <tr><td colspan="2" align="center">
<input type="submit"  name="sub1" value="Share" /></td>
</tr>
</table>
</form>
<?php
include("db/config.php");
if(isset($_POST['sub1']))
{
	$tdate=date("Y-m-d") ;
		$content=$_POST['con'];
	$uname=$_SESSION['var'];
 $nameq=$_FILES['imag']['name'];
$temp_nameq=$_FILES['imag']['tmp_name'];
move_uploaded_file($temp_nameq,"pics/$nameq");
$ins="insert into posts(username,date,content,pic) values('$uname','$tdate','$content','$nameq')";
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
<?php
include("db/config.php");
$uname=$_SESSION['var'];
$data="select * from posts where username='$uname' order by id desc" ;
$run=mysqli_query($conn,$data);

while($row_imgq=mysqli_fetch_array($run))
{
	$post=$row_imgq[3];
$tdate=$row_imgq[2];
$uname=$row_imgq[1];
$postpic=$row_imgq[4];
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


echo "<table align='center' style='margin-left:300px;'>
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
</div>

<div id="info"><fieldset id="reg">
<legend><h1>General Details</h1></legend>
<?php
include("db/config.php");
$uname=$_SESSION['var'];
$data="select day,month,year,email,gen from users  where uname='$uname' " ;
$run=mysqli_query($conn,$data);
$run2=mysqli_query($conn,"select * from details where uname='$uname'");
while($row_imgq=mysqli_fetch_array($run))
{
$day=$row_imgq[0];
$month=$row_imgq[1];
$year=$row_imgq[2];
$email=$row_imgq[3];
$gen=$row_imgq[4];
echo "<br><table align='center'><tr><th>Gender</th><td>:</td><td>$gen</td></tr>
<tr><th>Born on </th><td>:</td><td>$day $month , $year</td></tr>
<tr><th>Email id</th><td>:</td><td>$email</td></tr>";
}
while($row_abc=mysqli_fetch_array($run2)){
	$course=$row_abc[1];
	$batchyear=$row_abc[2];
	$city=$row_abc[9];
	$state=$row_abc[10];
	$mob=$row_abc[5];
	$home=$row_abc[6];
	$web=$row_abc[7];
	}
	
echo"
<tr><th>Batch</th><td>:</td><td>$course,$batchyear</td></tr>
<tr><th>Lives in </th><td>:</td><td>$city ,$state</td></tr>
<tr><th>Mobile no</th><td>:</td><td>$mob</td></tr>
<tr><th>Landline</th><td>:</td><td>$home</td></tr>
"	;

if($web!="")
{
	echo "<tr><th>Website/Blog</th><td>:</td><td><a href='$web'>$web</a></td></tr></table>";}	

$run3=mysqli_query($conn,"select currentorg,position from workdetails where uname='$uname'") ;
echo"<table align='center' ><ul>";
while($row=mysqli_fetch_array($run3))
{$comp=$row[0];
$pos=$row[1];
	}
echo"<tr><td colspan='2'><li>Working as <b>$pos</b> at <b>$comp</b> </li></td></tr>";

$run4=mysqli_query($conn,"select roles,industries from roles_worked where uname='$uname'") ;
$run6=mysqli_query($conn,"select skill from skills where uname='$uname'") ;

while($row=mysqli_fetch_array($run4))
{$roles=$row[0];
$companies=$row[1];


	echo"<tr><td colspan='2'><li> Worked as <b>$roles</b> at <b>$companies</b> </li></td></tr>";
}
echo"<tr><td><li>Skilled in</li></td><td><ol>";
while($row2=mysqli_fetch_array($run6))
{$skill=$row2[0];
echo "<li>$skill</li>";
	} 
	echo"</ol></td></tr></ul><tr></tr><br><br><tr>
	<td colspan='2' align='center' ><a href='editprofile.php'>Edit Profile</a></td></tr></table>";
?>
</fieldset>
</div>

<div id="photos">
<h3>Your Photo Album</h3>
<?php
include("db/config.php");
$uname=$_SESSION['var'];
$data="select pic,date from posts where username='$uname' order by id desc" ;
$run=mysqli_query($conn,$data);
if($run){
while($row_imgpic=mysqli_fetch_array($run))
{
	$poc=$row_imgpic[0];
	$tdate=$row_imgpic[1];
if($poc!=""){
echo "<table align='center'>
<tr><td colspan='3' ><figure><img src='pics/$poc' height='100px' width='100px' >
<figcaption>$tdate</figcaption></figure></td></tr>
</table>";}
}}
else
{
	echo "<script> alert('No ')</script>";
	}
?>
</div>
<div id="ques">
qu
</div>

</div>
</div>




</body>
</html>