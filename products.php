<?php
session_start();
include ('header.html');
require_once ('mysqli_connect.php');



$id = $_GET['id'];

$sql = "SELECT * FROM PRODUCTS WHERE PRODUCT_ID =  '".$id."'" ;

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
		echo '<img src= '.$row["PRODUCT_IMAGE"].' />'; 
		echo   '<br>' . "Product: " . $row["PRODUCT_NAME"]. '<br>' . " - Price: £" . $row["PRICE"]. "<br>";
		
		
		echo '<br>';
		echo '<p> Product Description';
		echo '<br>';
		echo $row["PRODUCT_DESCRIPTION"];
		
		
		 }
} else {
    echo "0 results";
	
}


if(isset($_POST['Submit'])){
	$query = "INSERT INTO SHOPPING_CART(PRODUCT_ID,ACCOUNT_ID) VALUES ('".$id."',{$_SESSION['ACCOUNT_ID']})";
	$results = mysqli_query ($conn, $query);
	if ($results) {
		echo '<h3>Thank you!</h3>
		<p>The product is now in your shopping cart.</p>';	
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
	


?>

<form method="post">
<input type="submit" name="Submit" value="Add To Shopping Cart">
</form>