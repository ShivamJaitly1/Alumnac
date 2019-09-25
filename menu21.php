<style type="text/css">
    
</style>

<!DOCTYPE html>
<html dir="ltr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0">
	<title>css3menu.com</title>
		<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="menu21_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}
    ._css3m{display:none}
    /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position:fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 200px; /* Location of the box */
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
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
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
    background-color: #5cb85c;
    color: white;
border:none;}

.modal-body {padding: 2px 16px;
border:none;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white; 
	height:30px;
border:none;
}
.image-upload > input
{
    display: none;
}


    </style>
	<!-- End css3menu.com HEAD section -->

	
</head>
<?php
include("db/config.php");
$user="$_SESSION[var]";
$fetch_data="select * from users where uname='$user'";
$run=mysqli_query($conn,$fetch_data);

while($row_wise_data=mysqli_fetch_array($run))
{
	$fname=$row_wise_data[3];
	$lname=$row_wise_data[4];
	
}

?>

<body ontouchstart="" style="background-color:#EBEBEB">
<!-- Start css3menu.com BODY section -->
<ul id="css3menu1" class="topmenu">
	<li class="topfirst"><a href="#" id="w1" style="height:32px;line-height:32px;><span><img src="menu21_files/css3menu1/blue_circle - bubble.png" alt=""/>Whiteboard</span></a>
	<ul>
		<li class="subfirst"><a href="#" id="mybtn">Create a Post</a></li>
		<li><a href="#" id="myjob">Create a Job/Internship</a></li>
		<li><a href="addevent.php">Create an Event</a></li>
	</ul></li>
	<li class="topmenu"><a href="jobs.php" style="height:32px;line-height:32px;"><img src="menu21_files/css3menu1/blue_circle - computer.png" alt=""/>Jobs &amp; Internships</a></li>
	<li class="topmenu"><a href="members.php" style="height:32px;line-height:32px;"><img src="menu21_files/css3menu1/blue_circle - users.png" alt=""/>Members</a></li>
	<li class="topmenu"><a href="messages.php" style="height:32px;line-height:32px;"><img src="menu21_files/css3menu1/blue_circle - mail.png" alt=""/>Messages</a></li>
	<?php echo"<li class='toplast'><a href='#' style='height:32px;line-height:32px;'><span><img src='menu21_files/css3menu1/blue_circle - man.png' alt=''/>$fname $lname</span></a>";?>
	<ul>
		<li class="subfirst"><a href="myprofile.php">View Profile</a></li>
		<li><a href="editpro.php">Edit Profile</a></li>
		<li><a href="changepass.php">Change Password</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul></li>
</ul><p class="_css3m"><a href="http://css3menu.com/">web menu</a> by Css3Menu.com</p>
<!-- End css3menu.com BODY section -->
<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times</span>
      <h2>Start a Discussion </h2>
    </div>
    <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
<table align="center">
<tr>
<th>
Post: </th><td><textarea name="con" cols="50" rows="5" required placeholder="Write your content here..." ></textarea></td>
</tr>
<tr><td colspan="2" align="center" class="image-upload">
    <label for="file-input">
       &nbsp; <img src="cam.png" width="50px" height="40px"/>
    </label>

    <input id="file-input" name="imag" type="file" onchange="readURL(this);" /></td>
<br />
<td><img src="" id="postp"  /></td>
</tr>
<script>function readURL(input) {
	
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#postp')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>
    
    <tr><td colspan="3">
<input type="submit"  name="sub" value="Add" align="middle"/></td>
</tr>
</table>
</form>
    </div>
    <div class="modal-footer">
     
    </div>
  </div>

</div>
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close1">&times;</span>
      <h2>Create a Job</h2>
    </div>
    <div class="modal-body">
     <form method="post">
     <table align="center">
<tr>
<th>Job Profile:</th> <td><input type="text" name="pro" required></td>
</tr>
<tr>
<th>Company:</th> <td><input type="text" name="com" required></td>
</tr>
<tr>
<th>Type:</th> <td><select name="type"><option value="internship">Internship</option>
<option value="job">Job</option></select></td>
</tr>

<tr>
<th>
Description: </th><td><textarea name="con" cols="50" rows="10"  placeholder="Write your content here..." ></textarea></td>
</tr>
<tr><th colspan="3">
<input type="submit"  name="subjob" value="Create" /></th>
</tr>
</table>

</form>
    </div>
    <div class="modal-footer">
      </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');
var modjob=document.getElementById('myModal2');
// Get the button that opens the modal
var btn = document.getElementById("mybtn");
var job= document.getElementById("myjob");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close1")[0];
// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}
job.onclick = function() {
    modjob.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
span2.onclick = function() {
	modjob.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
	if (event.target == modjob) {
        modjob.style.display = "none";
    }
}
</script>
</body>
</html>
<?php
include("db/config.php");
if(isset($_POST['sub']))
{
	$tdate=date("Y-m-d") ;
		$content=$_POST['con'];
	$uname=$_SESSION['var'];
 $name=$_FILES['imag']['name'];
$temp_name=$_FILES['imag']['tmp_name'];
move_uploaded_file($temp_name,"pics/$name");
$ins="insert into posts(username,date,content,pic) values('$uname','$tdate','$content','$name')";
$run=mysqli_query($conn,$ins);

	
if($run)
{
//header("location:showimg.php");
echo "<script>alert('success');</script>";	
}
else
{
echo "<script>alert('Error');</script>";	
}
}
?>
<?php
include("db/config.php");
if(isset($_POST['subjob']))
{	$type=$_POST['type'];
	$date=date("M-d");
	$profile=$_POST['pro'];
	$company=$_POST['com'];
	$content=$_POST['con'];
	$uname=$_SESSION['var'];
		$ins="insert into jobs(uname,type,date,profile,company,content) values('$uname','$type','$date','$profile','$company','$content')";
$run=mysqli_query($conn,$ins);
if($run)
{
//header("location:showimg.php");
echo "<script>alert('success');</script>";	
}
else
{
echo "<script>alert('Error');</script>";	
}
}
?>
</div>

</body>
</html>
