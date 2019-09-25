<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="plugin/jq.js" type="text/javascript"></script>
<script>
$(function(){ /* to make sure the script runs after page load */

	$('.item').each(function(event){ /* select all divs with the item class */
	
		var max_length = 300; /* set the max content length before a read more link will be added */
		
		if($(this).html().length > max_length){ /* check for content length */
			
			var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
			var long_content	= $(this).html().substr(max_length);
			
			$(this).html(short_content+
						 '<a href="#" class="read_more"><br/>Read More</a>'+
						 '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */
						 
			$(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */
 
				event.preventDefault(); /* prevent the a from changing the url */
				$(this).hide(); /* hide the read more button */
				$(this).parents('.item').find('.more_text').show(); /* show the .more_text span */
		 
			});
			
		}
		
	});
 
 
});

</script>

<div id="content">
<div id="left">
<?php
include("db/config.php");
$user="$_SESSION[var]";
$fetch_data="select * from users where uname='$user'";
$run=mysqli_query($conn,$fetch_data);
echo "<ul>";
while($row_wise_data=mysqli_fetch_array($run))
{
	$fname=$row_wise_data[2];
	$lname=$row_wise_data[3];
	$iname=$row_wise_data[8];
echo "<figure><img src='pics/$iname' height='200px' width='200px' id='dp'/><br><br>
  <figcaption>$fname $lname</figcaption>
</figure>
";
}
?>

<br />
<br />


 <ul>
    <li> <a href="details.php">Edit Personal Details </a></li>
    <li> <a href="viewrecipes.php"> View my Recipes </a></li>
    <li> <a href="addrecipe.php"> Add a New Recipe</a></li>
    <li> <a href="addblog.php"> Add a New Blog</a></li>
    <li> <a href="viewblog.php">My Blogs</a></li>
   </ul> 
<br />
</div>
<div id="center">
<h1>Welcome  <?php echo "$fname";?></h1>
   <h2><u>Daily Blog:</u></h2>
   <?php
   $blogselect="SELECT * FROM dailyblogs ORDER BY RAND() LIMIT 1 ";
$run=mysqli_query($conn,$blogselect);
echo "<ul>";
while($row_wise_data=mysqli_fetch_array($run))
{
	$title=$row_wise_data[2];
	$blog=$row_wise_data[3];
echo "$title <br> <div class='item'>
    $blog
</div>
";
}
   ?>
   <br />
   <br>
    <img id="logo" src="pics/logo.jpg" width="150px" height="150px" onClick="about.php">
    
    
    </div>

<div id="right">
<fieldset id="up">
<h2 <style text-align:'center'> Latest Recipes</style></h2>
<marquee direction="up">
<?php
include("db/config.php");
$fetch_data="select title from recipes order by id desc limit 10 ";
$run=mysqli_query($conn,$fetch_data);
echo "<ul>";
while($row_wise_data=mysqli_fetch_array($run))
{
	$title=$row_wise_data[0];
	
echo "
<li><a href='recipe.php?rec=$title'>$title</a></li>";
}
echo "</ul></marquee><br>";

?>
</fieldset>
</div>
</div>
</body>
</html>