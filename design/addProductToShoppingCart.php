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
    
$result = mysqli_query($con,"SELECT * FROM shoppingcart WHERE name ='" . $_SESSION["addedItem"]["name"] . "'");
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $newQuantity = $_REQUEST['quantity'] + $row['quantity'];
            $sql = "UPDATE shoppingcart
            SET quantity='" . $newQuantity . "'
            WHERE name='" . $_SESSION["addedItem"]["name"] . "'";
        }
    } else{
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO shoppingcart VALUES ('$name',
            '$sku','$image','$price','$quantity')";
    }

$_SESSION["addedItem"] = [

];
    
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
