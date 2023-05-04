<?php      
    // Connect to localhost when working locally
    //$host = "localhost";  
    //$user = "root";  
    //$password = '';  
    //$db_name = "gamespotcompany";

    // Connect to ClearDB when deploying to Heroku

    $host = "us-cdbr-east-06.cleardb.net";  
    $user = "b63ea21dacfbc3";  
    $password = '50cfb7f6';  
    $db_name = "heroku_b5298790e7bf5bb"; 
      
    // Connect using MySQL
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>
