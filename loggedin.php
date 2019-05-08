<?php 
session_start();
if (!isset($_SESSION['USERNAME'])) {
	header("Location:http://mudfoot.doc.stu.mmu.ac.uk/students/oxtonj/Project/index.php");
	exit(); 
}
$page_title = 'Logged In';
include ('header.html');

echo "<h3>Successfully logged in.</h3>
<p>Welcome {$_SESSION['FIRST_NAME']}, you are now logged in.</p>
<p><a href=\"logout.php\">Logout</a></p>";
?>
