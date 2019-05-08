<?php
$page_title = 'Login';
include ('header.html');

if (!empty($errors)) {
	echo '<h3 class="error">Error</h3>
	<p class="error">The following error(s) occurred:</p>';
	foreach ($errors as $message) {
		echo '<p class="error">' . $message . '</p>';
	}
	echo '<p>Please try again.</p>';
}
?>
<h3>Login</h3>
<form action="signin.php" method="post">
	<p>Username: <input type="text" name="username" size="60" 	maxlength="60" /> </p>
	<p>Password: <input type="password" name="pass" size="40" 	maxlength="40" /></p>
	<p><input type="submit" name="submit" value="Login" /></p>
</form>
