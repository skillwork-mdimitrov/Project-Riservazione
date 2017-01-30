<?php
// Database connection
$DBConnect = mysqli_connect("networkict", "root", "gds9pegngc9a9") ;

// Database variables
$DBName = 'riservatzione' ;
$ReservTable = 'reservation' ;
$RoomTable = 'room' ;
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