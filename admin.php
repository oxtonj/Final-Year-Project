<?php
session_start();
include ('header.html');
require_once ('mysqli_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {


$css = "";
$cssErr = "";


  if (empty($_POST["css"])) {
    $cssErr = "css is required";
	echo $cssErr;
  } 
  else {
    $css = ($_POST["css"]);
	echo "$css selected";
	if ($css =="css1")
	{
		$query = "UPDATE CSS SET CSS_ON = '1' WHERE CSS_ID = 1; UPDATE CSS SET CSS_ON = '0' WHERE CSS_ID = 2";
		$results = @mysqli_multi_query ($conn, $query);
		if ($results) {
		echo '<h3>Thank you!</h3>
		<p>You have successfully changed CSS.</p>';	
		
		header("Location: http://mudfoot.doc.stu.mmu.ac.uk/students/oxtonj/Project/index.php");
		exit();
	} 
	mysqli_close($conn);
	exit();
	
	echo '<h3 class="error">Error</h3>
	<p class="error">The following error(s) occurred:</p>';
	foreach ($errors as $message) { 
		echo "<p class='error'>$message</p>";
	}
	echo '<p>Please try again.</p>';
	}
	
	if ($css =="css2")
	{
		
		$query = "UPDATE CSS SET CSS_ON = '1' WHERE CSS_ID = 2; UPDATE CSS SET CSS_ON = '0' WHERE CSS_ID = 1";
		$results = @mysqli_multi_query ($conn, $query);
		if ($results) {
		echo '<h3>Thank you!</h3>
		<p>You have successfully changed CSS.</p>';	
		
		header("Location: http://mudfoot.doc.stu.mmu.ac.uk/students/oxtonj/Project/index.php");
		exit();
		
	} else { 			
		echo '<h3 class="error">System Error</h3>
		<p class="error">Registration failed because of a system
	error:</p>'; 
		echo '<p class="error">' . 
	mysqli_error($conn) . '</p>
	
		<p class="error">Query: ' . $query . '</p>';
	} 
	mysqli_close($conn);
	exit();
	
	echo '<h3 class="error">Error</h3>
	<p class="error">The following error(s) occurred:</p>';
	foreach ($errors as $message) { 
		echo "<p class='error'>$message</p>";
	}
	echo '<p>Please try again.</p>';
	
	
	
	}
	mysqli_close($conn);
  }


}
?>

<form action="admin.php" method="post">
 <input type="radio" name="css" <?php if($css=="css1") echo "checked"; ?>  value="css1" > css1<br>
  <input type="radio" name="css" <?php if($css=="css2") echo "checked"; ?> value="css2" > css2<br>
  <input type="submit" value="Submit">
</form>






