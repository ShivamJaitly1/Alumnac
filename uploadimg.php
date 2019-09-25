<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File Upload</title>
</head>

<body>
<form method="post" enctype="multipart/form-data">
Upload image:<input type="file" name="image" />
<br />
<input type="submit" name="sub" value="Upload krde" />
</form>
<?php
include("db/config.php");
if(isset($_POST['sub']))
{

$name=$_FILES['image']['name'];
$temp_name=$_FILES['image']['tmp_name'];

move_uploaded_file($temp_name,"pics/$name");
$ins="insert into gallery (name) values ('$name')";
$run=mysqli_query($conn,$ins);
if($run)
{
header("location:gallery.php");
}
else
{
echo "<script>alert('Error');</script>";	
}
}
?>
</body>
</html>