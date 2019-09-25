
<div id="content" align="center">
<form method="post" enctype="multipart/form-data">
<fieldset id="reg">
<legend><h1>Registration form</h1></legend>

<table align="center">
<!--<tr>
<th colspan="5"><h1>Registration form</h1></th>
</tr>-->
<tr>
<th>Enter your User Name:</th> <td><input type="text" name="uname" required
></td>
</tr>
<tr>
<th>
Salutation: </th><td colspan="2"><input type="radio" name="s" value="Mr."/>Mr.
<input type="radio" name="s" value="Ms." />Ms.
<input type="radio" name="s" value="Dr." />Dr.
<input type="radio" name="s" value="Prof." />Prof.</td>
</tr>
<tr>
<th>
Enter your First Name : </th><td><input type="text" name="fname" required
></td>
</tr>
<tr>
<th>
Enter your Last Name: </th>
<td><input type="text" name="lname" required
></td>
</tr>
<tr>
<th>Enter your Email id: </th>
<td><input type="text" name="email" required
></td>
</tr>
<tr>
<th>
Enter your Password: </th><td><input type="password" name="pass" required />
</td>
</tr>
<tr><th>
Date of Birth:</th>
<td width="200px">
<select name="year" id="year" >
           <script>
var start = 1981;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;
</script>
</select>              
         </td>            
      <td>
        <select name="month" id="month"  >
            <option value="--" selected>Month</option>
            <option value="Jan">January</option>
              <option value="Feb">February</option>
            <option value="Mar">March</option>
            <option value="Apr">April</option>
            <option value="Jun">June</option>
            <option value="July">July</option>
            <option value="Aug">August</option>
            <option value="Sep">September</option>
            <option value="Oct">October</option>
            <option value="Nov">November</option>
            <option value="Dec">December</option>
        </select>            
     </td>
     <td>
        <select name="day" id="day" >
        <option value="--" >Day</option>
        <script>
var start = 1;
var end = 31;
var options = "";
for(var day = start ; day <=end; day++){
  options += "<option>"+ day +"</option>";
}
document.getElementById("day").innerHTML += options;
</script>
</select>
        </td>

</tr>
<tr>
<th>
Select Gender: </th><td colspan="2"><input type="radio" name="g" value="Male"/>Male
<input type="radio" name="g" value="Female" />Female</td>

</tr>

<br />
<tr>
<th colspan="2" rowspan="2" >
<input type="submit" id="regbtn" name="sub" value="Create Account" /></th>
</tr>
</table>
</fieldset >
</form>
</div>

<?php
include("db/config.php");
if(isset($_POST['sub']))
{
 $uname=$_POST['uname'];
 $_SESSION['var']=$uname; 
  $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'];
 $pass=$_POST['pass'];
 $gen=$_POST['g'];
$salu=$_POST['s'];
$m=$_POST['month'];
$y=$_POST['year'];
$d=$_POST['day'];
$ins="insert into users(uname,pass,fname,lname,email,gen,salutation,day,month,year) values('$uname','$pass','$fname','$lname','$email','$gen','$salu','$d','$m','$y')";

if((mysqli_query($conn,$ins)))
{
	
	echo("<script>location.href = 'signup2.php';</script>");
}

else
{
	 echo "<h1 align='center' style='color:red'> Registration Unsuccessful,Try again</h1>";
}
}
?>