<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">
<style>
#galpic
{	height:400px;
	width:400px;
	}
#galpic:hover
	{height:650px;
	width:650px;
	transition:all 1s;
		margin:auto;	
		}
</style>

</head>

<body>
<?php include("includes/topindex.php");?>
<br />
<h1>GALLERY</h1>
<br />
<br />
<?php

include("db/config.php");
$data="select * from gallery";
$run=mysqli_query($conn,$data);
while($row_img=mysqli_fetch_array($run))
{
$name=$row_img[1];
echo "<td><img id='galpic' src='pics/$name' />";
}

?>

</body>
</html>