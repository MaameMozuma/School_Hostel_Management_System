<?php

    // Connect to the db
    $servername = "localhost";
    $username = "root";
    $password = "Bv12@34.";
    $dbname = "bayview_hostels";
            
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
            //stop executing the code and echo error
          die("Connection failed: " . $conn->connect_error);
    }

?>