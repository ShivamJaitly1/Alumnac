<!DOCTYPE html>
<html>
<head>
	<title>News Room</title>
	<style type="text/css">
     #f1{

  margin-top: 50px;
  margin-left: 100px;
  margin-right: 100px;
  margin-bottom: 100px;

     }
     tr{
     	width: 100%;
     }
	</style>
</head>
<body>

</body>
</html>
<?php include("includes/topindex.php");?>
<?php include("db/config.php");?>
<fieldset id="f1">
<?php
include("db/config.php");
$data="select * from news ORDER BY id DESC";
$run=mysqli_query($conn,$data);
echo "<table>";
while($row_img=mysqli_fetch_array($run))
{
	$id=$row_img[0];
$title=$row_img[1];
$tdate=$row_img[2];

echo "
<tr><td colspan='2'><h4>&nbsp;<a href='news.php?rem=$id'>$title</a></h4></td><td align='right'>$tdate</td></tr>
<tr><td  colspan='2' align='center' width='85%'><hr align='center' width='120%'></td></tr>
"
;
}
echo "</table>
   ";
   ?>
   </fieldset>