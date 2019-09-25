
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
</head>

<body>
 <div id="content">
<form method="post" enctype="multipart/form-data">
<fieldset id="reg">
<legend>Post</legend>
<table align="center">
<tr><th><h2>Start a Discussion</h2></th></tr>
<tr>
<th>
Post: </th><td><textarea name="con" cols="15" rows="5" required placeholder="Write your content here..." ></textarea></td>
</tr>
<tr><td>Upload image:</td><td><input type="file" name="image" onchange="readURL(this);" /></td>
<br />
<td><img src="user.png" id="dp" /></td>
</tr>
<script>function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#dp')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>

<tr><th colspan="3">
<input type="submit"  name="sub" value="Add" /></th>
</tr>
</table>
</fieldset >
</form>
<?php
include("db/config.php");
if(isset($_POST['sub']))
{
	$tdate=date("Y-m-d") ;
		$content=$_POST['con'];
	$uname=$_SESSION['var'];
 $name=$_FILES['image']['name'];
$temp_name=$_FILES['image']['tmp_name'];
move_uploaded_file($temp_name,"pics/$name");
$ins="insert into posts(username,date,content,pic) values('$uname','$tdate','$content','$name')";
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
</div>
</body>
</html>