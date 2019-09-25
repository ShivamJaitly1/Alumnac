<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>
</body>
</html>
<?php
include("db/config.php");
$data="SELECT bloodgroup,sum(units) as 'total' from blood group by bloodgroup";
$run=mysqli_query($conn,$data);
echo "<table><tr><th>BloodGroup</th><th>Total units</th></tr>";
while($row_img=mysqli_fetch_array($run))
{
	$bloodgroup=$row_img[0];
$totalunits=$row_img[1];

echo "
<tr><td>$bloodgroup</td><td>$totalunits</td></tr>";
}
echo "</table>"
?>