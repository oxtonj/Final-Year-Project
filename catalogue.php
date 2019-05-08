<?php
session_start();
include ('header.html');
require_once ('mysqli_connect.php');

//$servername = "localhost";
//$username = "username";
//$password = "password";
//$dbname = "myDB";

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
//if (!$conn) {
   // die("Connection failed: " . mysqli_connect_error());
//}
?>
<table border='1'>



<?php

$sql = "SELECT * FROM PRODUCTS WHERE PRODUCT_TYPE = 'FOOTBALL'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>';
		echo '<img src= '.$row["PRODUCT_IMAGE"].' />'; 
        echo   '<br>' . "Product: " . $row["PRODUCT_NAME"]. '<br>' . " - Price: £" . $row["PRICE"]. "<br>" . "<a href='products.php?id= " .$row['PRODUCT_ID']."'>" ."Click Here"  .  "</a>" ;
		echo '</td>';
		echo '</tr>';
		
		
		
		
		
    }
} else {
    echo "0 results";
}
?>


