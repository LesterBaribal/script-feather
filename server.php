<?php
    /*--------------------------------------------
            CONNECTING THE IN THE SERVER
    ----------------------------------------------*/
    //setting up variables for nessesary info for connecting and modifying the data when changed in server
    $host = "localhost";    
    $user = "root";
    $password = "";
    $database = "script-feather";

    //connecting to the server and selecting a database, then save in variable $conn
    $conn = mysqli_connect($host, $user, $password, $database);
?>