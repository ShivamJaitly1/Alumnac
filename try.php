<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<input type="text" name="name[]" />

<input type="text" name="name[]" />

<input type="text" name="name[]" />
<input type="submit" name="sub" value="Click" />
</form>
</body>
<?php
if(isset($_POST['sub']))
{
$name = $_POST['name'];

foreach( $name as  $n ) {
  echo "The name is ".$n."";
}
echo "<script>alert('hie');</script>";

}
?>
</html>