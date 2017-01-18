<?php
        
//Setting my variables for my Database        
        $serverName = "serverict.nl:53390";
        $username = "root";
        $password = "!Toor_1630";
        $dbname = "reservationSystem";

// Create connection
       $conn = mysqli_connect($serverName, $username, $password);
       
// Check connection
        if (!$conn) 
        {
            echo "Sucka!";
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            echo "Succes!";
            mysqli_select_db($conn, $dbname);
        }   
        ?>
