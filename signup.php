<?php
include ('header.html');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require_once ('mysqli_connect.php');
	$errors = array();
	
	if (empty($_POST['USERNAME'])) {
	$errors[] = 'You forgot to enter your username.';
} else {
	$username = 
	mysqli_real_escape_string($conn,trim($_POST['USERNAME']));
}
	if (empty($_POST['PASSWORD'])) {
	$errors[] = 'You forgot to enter your password.';
} else {
	$password = 
	mysqli_real_escape_string($conn,trim($_POST['PASSWORD']));
}
	if (empty($_POST['FIRST_NAME'])) {
	$errors[] = 'You forgot to enter your first name.';
} else {
	$firstname = 
	mysqli_real_escape_string($conn,trim($_POST['FIRST_NAME']));
}
	if (empty($_POST['LAST_NAME'])) {
	$errors[] = 'You forgot to enter your last name.';
} else {
	$lastname = 
	mysqli_real_escape_string($conn,trim($_POST['LAST_NAME']));
}
	if (empty($_POST['ADDRESS'])) {
	$errors[] = 'You forgot to enter your address.';
} else {
	$address = 
	mysqli_real_escape_string($conn,trim($_POST['ADDRESS']));
}
	if (empty($_POST['TELEPHONE'])) {
	$errors[] = 'You forgot to enter your telephone.';
} else {
	$telephone = 
	mysqli_real_escape_string($conn,trim($_POST['TELEPHONE']));
}
	if (empty($_POST['EMAIL'])) {
	$errors[] = 'You forgot to enter your email.';
} else {
	$email = 
	mysqli_real_escape_string($conn,trim($_POST['EMAIL']));
}
	if (empty($_POST['DATE_JOINED'])) {
	$errors[] = 'You forgot to enter the date.';
} else {
	$date = 
	mysqli_real_escape_string($conn,trim($_POST['DATE_JOINED']));
}

if (empty($errors)) {
	$query = "INSERT INTO ACCOUNTS (USERNAME, PASSWORD, FIRST_NAME, LAST_NAME, ADDRESS, TELEPHONE, EMAIL, DATE_JOINED) VALUES ('$username', '$password', '$firstname', '$lastname', '$address', '$telephone', '$email', '$date')";		
	$results = @mysqli_query ($conn, $query);
	if ($results) {
		echo '<h3>Thank you!</h3>
		<p>You have successfully signed up.</p>';	
	} else { 			
		echo '<h3 class="error">System Error</h3>
		<p class="error">sign up failed because of a system
	error:</p>'; 
		//DEBUGGING 
		echo '<p class="error">' . 
	mysqli_error($conn) . '</p>
	
		<p class="error">Query: ' . $query . '</p>';
	} 
	mysqli_close($conn);
		
	
	exit();
}
else { 

	echo '<h3 class="error">Error</h3>
	<p class="error">The following error(s) occurred:</p>';
	foreach ($errors as $message) { 
		echo "<p class='error'>$message</p>";
	}
	echo '<p>Please try again.</p>';
} 
mysqli_close($conn);
}
?>

<h3>Sign Up</h3>
<form action="signup.php" method="post">
	<p>Username: <input type="text" name="USERNAME" size="12" 
	maxlength="12" value="<?php if(isset($_POST['USERNAME'])) 
	echo $_POST['USERNAME']; ?>" /></p>

	<p>Password: <input type="text" name="PASSWORD" size="20" 
	maxlength="20" value="<?php if (isset($_POST['PASSWORD'])) 
	echo $_POST['PASSWORD']; ?>" /></p>

    <p>First Name: <input type="text" name="FIRST_NAME" size="10" 
	maxlength="10" value="<?php if (isset($_POST['FIRST_NAME'])) 
	echo $_POST['FIRST_NAME']; ?>" /></p>

    <p>Last Name: <input type="text" name="LAST_NAME" size="20" 
	maxlength="20" value="<?php if (isset($_POST['LAST_NAME'])) 
	echo $_POST['LAST_NAME']; ?>" /></p>

    <p>Address: <input type="text" name="ADDRESS" size="50" 
	maxlength="100" value="<?php if (isset($_POST['ADDRESS'])) 
	echo $_POST['ADDRESS']; ?>" /></p>

    <p>Telephone: <input type="text" name="TELEPHONE" size="13" 
	maxlength="13" value="<?php if (isset($_POST['TELEPHONE'])) 
	echo $_POST['TELEPHONE']; ?>" /></p>

    <p>Email: <input type="text" name="EMAIL" size="40" 
	maxlength="40" value="<?php if (isset($_POST['EMAIL'])) 
	echo $_POST['EMAIL']; ?>" /></p>

    <p>Date: <input type="date" name="DATE_JOINED" value="<?php if (isset($_POST['DATE_JOINED'])) 
	echo $_POST['DATE_JOINED']; ?>" /></p>

	<p><input type="submit" name="submit" value="Sign Up" /></p>
</form>

