<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	require_once ('check_login.php');
	require_once ('mysqli_connect.php');
		
	list($test, $data) = check_login($conn, $_POST['username'], $_POST['pass']);
	
	if ($test) {
		session_start();
		$_SESSION['ACCOUNT_ID'] = $data['ACCOUNT_ID'];
		$_SESSION['USERNAME'] = $data['USERNAME'];
		$_SESSION['FIRST_NAME'] = $data['FIRST_NAME'];
				
		header("Location: 
		http://mudfoot.doc.stu.mmu.ac.uk/students/oxtonj/Project/loggedin.php");
		//Be sure to change userid to your own mudfoot username
		exit(); 
	} else { 
		$errors = $data;
	}
mysqli_close($conn); 
}
include('login_page.php');

?>