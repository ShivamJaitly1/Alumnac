<form method="post">
<select name="xyz">
<option value="11">11</option>
<option value="43">43</option><option value="13">13</option><option value="12">12</option>
</select>
<input type="submit" name="sub" value="Submit">
</form>
<?php
include("db/config.php");
if(isset($_POST['sub'])){
$x=$_POST['xyz'];
echo $x;
}
?>