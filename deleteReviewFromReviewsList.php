<?php

if(!isset($_SESSION)) 
{ 
    session_start();
} 

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
    
// Performing delete query execution
// here our table name is shoppingcart
if (!empty($_GET["delete"])){
    $sql = "DELETE FROM reviews WHERE name='" . $_GET["delete"] . "'";   
    if(mysqli_query($con, $sql)){
        //echo "<h3>data stored in a database successfully."
        //    . " Please browse your localhost php my admin"
        //    . " to view the updated data</h3>";
        include('reviewsList.php');
    } else{
        echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
    }
    
    //$removedItem = "";
    //$_SESSION["removedItemName"] = $removedItem;
        
    // Close connection
    mysqli_close($con);
}
?>
