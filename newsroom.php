<!DOCTYPE html>
<html>
<head>
	<title>News Room</title>
    <link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">
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
	 #news{
		 font-size:24px;
		 color:#003}
	</style>
</head>
<body>

</body>
</html>
<?php include("includes/topindex.php");?>
<br>
<h1>Newsroom</h1>
<br>
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
$descip=$row_img[3];
echo "
<tr><td colspan='2'><h4>&nbsp;<p id='news' href='#'>$title</p></h4></td><td align='right'>$tdate</td></tr><tr><td>&nbsp $descip
</td></tr>
<tr><td  colspan='2' align='center' width='95%'><hr align='center' width='120%'></td></tr>
"
;
}
echo "</table>
   ";
   ?>
   </fieldset>