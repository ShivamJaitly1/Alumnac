<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My profile</title>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
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
#menu
{height:50px;
width:99%;
border:1px solid;
margin:auto;
}
#content
{border:1px solid;
	position: relative;
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
border:solid;
background:none;

float:left;}
#right
{height:80%;
width:79%;
border:solid;
float:left;
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
<div id="menu">

</div>
<div id="header">
<img src="college.jpg" width="100%"height="297px" />
<?php
include("db/config.php");
//$user="$_SESSION[var]";
$data="select pic from details where uname='somya'";
$run=mysqli_query($conn,$data);

while($row_img=mysqli_fetch_array($run))
{
	$pic=$row_img[0];
echo "<img src='pics/$pic' width='250px' height='250px' alt='my image' class='floatdown' id='pp'>";
}?>
</div>

<div id="content">
<div id="left"><br /><br /><br /><br /><br />
<ul>
    <li> <a href="#" id="w">Wall </a></li>
    <li> <a href="#" id="i">Info </a></li>
    <li> <a href="#"id="p">Photos </a></li>
   <li> <a href="#" id="q">Questions</a></li>
    </ul>

</div>
<div id="right">
<div id="wall">
 <form method="post" enctype="multipart/form-data">
&nbsp;<table>
<tr>
<td><textarea name="con" cols="130" rows="5" required placeholder="Share your Thoughts!" ></textarea></td>
</tr>
<tr><td colspan="2" align="center" class="image-upload">
    <label for="file-input">
       &nbsp; <img src="cam.ico" width="50px" height="40px"/>
    </label>

    <input id="file-input" name="imag" type="file" onchange="readURL(this);" /></td>
<br />
<td><img src="" id="pp"  /></td>
</tr>
<script>function readURL(input) {
	
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pp')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>

 <tr><td colspan="2" align="center">
<input type="submit"  name="sub" value="Share" /></td>
</tr>
</table>
</form>
<?php
include("db/config.php");
//$uname=$_SESSION['var'];
$data="select * from posts where username='somya'";
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


echo "<table align='center'>
<tr><td colspan='2' width='100%'><hr  align='center'></td></tr><tr>
<td width=15% rowspan='2'><img style='vertical-align: bottom;' src='pics/$pic'  height='75px' width='70px' id='dp'/></td>
<td><p font-size='+5'><b><a href='profile.php?rec=$uname' id='arec'>&nbsp;$fname $lname</a></b><br><font color='#666666'>&nbsp;$tdate </font></td> </tr>
<tr><td></td></tr>
<tr><td colspan='2'><h4>&nbsp;&nbsp;$post</h4></td></tr><tr><td colspan='3' id ='$h'><img src='pics/$postpic' height='100px' width='100px' onerror='this.style.display='none'></td></tr>
</table>
   <br>"
;
}
}
?>
</div>

<div id="info">
INFO
</div>

<div id="photos">
PH
</div>
<div id="ques">
qu
</div>

</div>
</div>
<div id="footer">
</div>



</body>
</html>