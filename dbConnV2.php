<?php
// Database connection
$DBConnect = mysqli_connect("localhost", "root", "") ;

// Database variables
$DBName = 'riservatzione3' ;
$ReservTable = 'reservation' ;
$UserTable = 'user';
$UReservTable = 'userreservation' ;
$URoleTable = 'userrole' ;

// Check connection
if(!$DBConnect)
{
    echo "<p>There was an error while connecting to the server. " . mysqli_error($DBConnect) . "</p>" ;
}
$SelectDB = mysqli_select_db($DBConnect, $DBName) ;
if(!$SelectDB)
{
    echo "<p>There was an error while selecting the database. " . mysqli_error($DBConnect) . "</p>";
}
?>

