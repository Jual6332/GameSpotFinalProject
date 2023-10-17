<?php
 
// servername => localhost
// username => root
// password => empty
// database name => staff

// Include config file
require_once "connection.php";
    
// Check connection
if($con === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
    
// Taking all 5 values from the form data(input)
$title =  $_REQUEST['title'];
$name = $_REQUEST['name'];
$description =  $_REQUEST['description'];
$manager = $_REQUEST['reviewType'];
$rating = $_REQUEST['rating'];
    
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO reviews VALUES ('$title',
    '$name','$description','$reviewType','$rating')";
    
if(mysqli_query($con, $sql)){
    //echo "<h3>data stored in a database successfully."
    //    . " Please browse your localhost php my admin"
    //    . " to view the updated data</h3>";
    include('reviewsList.php');
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}
    
// Close connection
mysqli_close($con);
?>