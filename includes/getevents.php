<?php
include("db/config.php");
$data="select * from events ORDER BY id DESC limit 5";
$run=mysqli_query($conn,$data);
echo "<table ><br>";
while($row_img=mysqli_fetch_array($run))
{
	$id=$row_img[0];
$name=$row_img[1];
$day=$row_img[2];
$month=$row_img[3];
$venue=$row_img[4];
echo "
<tr><td colspan='2' width='550px'><h4> <font size='+1'>&nbsp;<a id='login' href='events.php?rem=$id'>$name</a></font></h4><font color='#666666'>&nbsp;Venue:$venue</font></td> 
<font size='+1'><td align='center' >$month<br>$day</font></td></tr>
<tr><td  colspan='2' width='110%'><hr  align='center'></td></tr>
"
;


}
echo "</table>

   <br>";
?>