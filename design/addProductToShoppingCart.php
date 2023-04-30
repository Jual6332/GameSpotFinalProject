<?php

session_start();
 
// servername => localhost
// username => root
// password => empty
// database name => gamespotcompany

// Include config file
require_once "connection.php";
    
// Check connection
if($con === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
    
// Taking all 5 values from the form data(input)
$name =  $_SESSION['addedItem']['name'];
$sku =  $_SESSION['addedItem']['sku'];
$image = $_SESSION['addedItem']['image'];
$price = $_SESSION['addedItem']['price'];
$quantity = $_REQUEST['quantity'];
    
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO shoppingcart VALUES ('$name',
    '$sku','$image','$price','$quantity')";
    
if(mysqli_query($con, $sql)){
    //echo "<h3>data stored in a database successfully."
    //    . " Please browse your localhost php my admin"
    //    . " to view the updated data</h3>";
    include('productslist_shoppingcart.php');
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}
    
// Close connection
mysqli_close($con);
?>
