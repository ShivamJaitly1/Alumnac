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
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jobs & Internships</title>
</head>

<body>
<?php include("includes/top.php");?>
	<?php include("includes/menul.php");?>
    <br />
    <h1>Jobs And Internships</h1>
    <br />
	<div><?php
include("db/config.php");
$data="select profile,company,date,id from jobs ORDER BY id DESC ";
$run=mysqli_query($conn,$data);
echo "<table align='center'>";
while($row_img=mysqli_fetch_array($run))
{
	$pro=$row_img[0];
$date=$row_img[2];
$company=$row_img[1];
$id=$row_img[3];
echo "
<tr><td colspan='4' width='100%'><hr  align='center'></td></tr><tr>
<td colspan='2' width='80%'><a href='openjob.php?a=$id' >$pro at $company </td>
<td width='20%'>$date </td> <td></td></tr>

   <br>"
;

}
echo "</table>";
?>
<div>
</body>
</html>