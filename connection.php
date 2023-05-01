<?php      
    // Connect to localhost when working locally
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "gamespotcompany";

    // Connect to ClearDB when deploying to Heroku

    //$host = "us-cdbr-east-06.cleardb.net";  
    //$user = "b0697db6c03ee3";  
    //$password = '7a4f4698';  
    //$db_name = "heroku_aecc862be4c87f7"; 
      
    // Connect using MySQL
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>
