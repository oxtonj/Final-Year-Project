<?php
session_start();
include ('header.html');
require_once ('mysqli_connect.php');




$sql = "SELECT SHOPPING_CART.SC_ID, SHOPPING_CART.ACCOUNT_ID, ACCOUNTS.ACCOUNT_ID, ACCOUNTS.USERNAME, ACCOUNTS.FIRST_NAME, ACCOUNTS.LAST_NAME, ACCOUNTS.ADDRESS, SHOPPING_CART.PRODUCT_ID, PRODUCTS.PRODUCT_ID, PRODUCTS.PRODUCT_NAME, PRODUCTS.PRICE FROM SHOPPING_CART, ACCOUNTS, PRODUCTS WHERE SHOPPING_CART.ACCOUNT_ID = ACCOUNTS.ACCOUNT_ID AND SHOPPING_CART.PRODUCT_ID = PRODUCTS.PRODUCT_ID AND SHOPPING_CART.ACCOUNT_ID = {$_SESSION['ACCOUNT_ID']} GROUP BY SC_ID";
//$firstname = $row['IRST_NAME'];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>';
        echo   '<br>' . "Shopping Cart Number: " . $row["SC_ID"]. '<br>' . "Account Number: " . $row["ACCOUNT_ID"]  .  '<br>' . "Username: " . $row["USERNAME"]. '<br>' . "First Name: " . $row["FIRST_NAME"]. '<br>' . "Last Name: " . $row["LAST_NAME"]. '<br>' . "Address: " . $row["ADDRESS"]. '<br>' . "Product Number: " . $row["PRODUCT_ID"]. '<br>' . "Product: " . $row["PRODUCT_NAME"]. '<br>' . "Price: " . $row["PRICE"]. '<br>';
		echo '</td>';
		echo '</tr>';
		//echo $firstname;
		
	//. '<br>' . "Total: ". $row['TOTAL_PRICE'];	
	//SUM(PRODUCTS.PRICE) AS TOTAL_PRICE	
		
		$firstname = $row["FIRST_NAME"];
$lastname = $row["LAST_NAME"];
$address = $row["ADDRESS"];
$productname = $row["PRODUCT_NAME"];
$price = $row["PRICE"];
$product = $row["PRODUCT_ID"];
$username = $row["USERNAME"];
$date = date('Y-m-d');







if(isset($_POST['Submit'])){
	$query = "INSERT INTO SALES (PRODUCT_ID,ACCOUNT_ID,USERNAME,FIRST_NAME,LAST_NAME,ADDRESS, PRODUCT_NAME, PRICE, DATE_OF_SALE) VALUES ('1',{$_SESSION['ACCOUNT_ID']}, '$username', '$firstname', '$lastname', '$address', '$productname', '$price', '$date')"; 
	
	$results = mysqli_query ($conn, $query);
	if ($results) {
		echo '<h3>Thank you!</h3>
		<p>For purchasing from us.</p>';	
	} else { 			
		echo '<h3 class="error">System Error</h3>
		<p class="error">system
	error:</p>'; 
		echo '<p class="error">' . 
	mysqli_error($conn) . '</p>
	
		<p class="error">Query: ' . $query . '</p>';
	} 
	//mysqli_close($conn);
		//exit();
	

	}
		
		
		
		
		
		
		
		
		
		
    }
	




	
	} else {
    echo "0 results";
}

echo $query;






?>

<form method="post">
<input type="submit" name="Submit" value="Purchase">
</form>