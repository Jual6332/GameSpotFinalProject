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
    
// Taking quantity values from the form data(input)
$quantity = $_REQUEST['quantity'];

// Initialize sql command
$sql = "";
   
// Setup database table query
$result = mysqli_query($con,"SELECT * FROM shoppingcart WHERE name ='" . $_REQUEST['productName'] . "'");
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        $newQuantity = $_POST['quantity'] + $row['quantity'];
        $sql = "UPDATE shoppingcart
        SET quantity='" . $newQuantity . "'
        WHERE name='" . $_POST["productName"] . "'";
    }
} else{
    $result = mysqli_query($con,"SELECT * FROM products WHERE name ='" . $_REQUEST['productName'] . "'");
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            // Store locally the database table row values
            $name =  $row['name'];
            $sku =  $row['sku'];
            $image = $row['image'];
            $price = $row['price'];

            // Performing insert query execution
            // here our table name is college
            $sql = "INSERT INTO shoppingcart VALUES ('$name',
                '$sku','$image','$price','$quantity')";

            if(mysqli_query($con, $sql)){
                //echo "<h3>data stored in a database successfully."
                //    . " Please browse your localhost php my admin"
                //    . " to view the updated data</h3>";
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($con);
            }
        }
    }
}

include('productslist_shoppingcart.php');

// Close connection
mysqli_close($con);

/*
$addedItem = [
    "name" => "",
    "image" => "",
    "sku" => "",
    "price" => 0,
    "quantity" => 0,
];

$_SESSION["addedItem"] = $addedItem;
*/
?>
