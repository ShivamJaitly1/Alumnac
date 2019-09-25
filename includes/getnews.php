<?php
include("db/config.php");
$data="select * from news ORDER BY id DESC limit 3";
$run=mysqli_query($conn,$data);
echo "<table><br>";
while($row_img=mysqli_fetch_array($run))
{
	$id=$row_img[0];
$title=$row_img[1];
$tdate=$row_img[2];

echo "
<tr><td  width='78%'><h4><font size='+1'> &nbsp;<a id ='login' href='news.php?rem=$id'>$title&nbsp;</a></font></h4></td><td align='right'>$tdate</td></tr>
<tr><td  colspan='2' align='center' width='89%'><hr align='center' width='120%'></td></tr>
"
;
}
echo "</table>
   ";
?>