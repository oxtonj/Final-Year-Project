<?php 
DEFINE ('DB_USER', 'oxtonj'); 
DEFINE ('DB_PASSWORD', 'fluPtern4'); 
DEFINE ('DB_HOST', 'mudfoot.doc.stu.mmu.ac.uk');
DEFINE ('DB_NAME', 'oxtonj'); 

$conn = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
?>
