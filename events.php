<!DOCTYPE html>
<html>
<head>
	<title>EVENTS</title>
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
<h1>Events</h1>
<br>
<fieldset id="f1">
<?php
include("db/config.php");
$data="select * from events ORDER BY id ";
$run=mysqli_query($conn,$data);
echo "<table >";
while($row_img=mysqli_fetch_array($run))
{
	$id=$row_img[0];
$name=$row_img[1];
$day=$row_img[2];
$month=$row_img[3];
$venue=$row_img[4];
$descip=$row_img[5];
echo "
<tr><td colspan='2' width='550px'><h4>&nbsp;<p id='news'>$name</p></h4><font color='#666666' size='+1'>&nbsp;<b>Venue:$venue</b></font></td> 
<td align='center'  ><p id='news'><b>$month<br>$day</b></p></td></tr><tr><td>&nbsp $descip
</td></tr><tr><td  colspan='2' width='110%'><hr  align='center'></td></tr>
"
;


}
echo "</table>

   <br>";
?>
</fieldset>