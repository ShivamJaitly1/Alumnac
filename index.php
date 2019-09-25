<?php session_start(); 
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['var']){
	
	$t='on';}
	else{
	$t='off';
	
}

if($t=='on')
{
	include("includes/top.php");

}
else
{
include("includes/topindex.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumnac</title>
<link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="favicon (1).ico">
<style>
#heade
{height:340px;
width:100%;
border:1px ;
margin:auto;
}
.modal {
    display: none; /* Hidden by default */
    position:fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 250px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
     margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 70%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close,.close1 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus,
.close1:hover,
.close1:focus{
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #333A56;
    color: white;
border:none;}

.modal-body {padding: 2px 16px;
border:none;
background-color:#F7F5E6;
height:200px;
font-weight:bold;}

.modal-footer {
    padding: 2px 16px;
    background-color:#333A56;
    color: white; 
	height:30px;
border:none;
}
	
	#toph
{height:400px;
	box-shadow:0px 0px 40px #999999;
margin-left:5px; 
padding:10px;}
	
#bot{ height:500px;
border:none;
margin-left:5px; 
box-shadow:0px 0px 40px #999999;
padding-left:35px;
padding-top:10px;
}
#login
{
color:#036;
font-weight:bold;
}
#imgtext span { 
 color:white;
   font: bold 24px/45px Helvetica, Sans-Serif; 
   letter-spacing: -1px; 
     padding: 10px; 
	 background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
}

#imgtext { 
   position: absolute; 
   top: 320px; 
   left:-450px;
   width: 100%; 
}

</style>


	
<body>
	
<?php include("slider.html");?>
<?php include("includes/mainhome.php");?>
</body>
</html>