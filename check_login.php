<?php 
function check_login($conn, $usernamein = '', $passin = '') {
	$errors = array(); 
	if (empty($usernamein)) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$username = mysqli_real_escape_string($conn, trim($usernamein));
	}
	if (empty($passin)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$pass = mysqli_real_escape_string($conn, trim($passin));
	}
	if (empty($errors)) { 
		$query = "SELECT ACCOUNT_ID, USERNAME, FIRST_NAME FROM ACCOUNTS WHERE 
	USERNAME='$username' AND PASSWORD='$pass'";
/*(SHA1)*/	
		$results = @mysqli_query ($conn, $query);

		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_array ($results, MYSQLI_ASSOC);
			return array(true, $row);
		} else { 
			$errors[] = 'The entered username and password are 
	incorrect.';
		}
	} 
	return array(false, $errors);
} 
?>
