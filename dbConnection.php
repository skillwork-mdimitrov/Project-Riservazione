<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "","riservatzione") ;

// Database variables
$DBName = 'riservatzione' ;
$ReservTable = 'reservation' ;
$RoomTable = 'room' ;
$UserTable = 'user';
$UReservTable = 'userreservation' ;
$URoleTable = 'userrole' ;

// Check connection
if(!$conn)
{
    echo "<p>There was an error while connecting to the server. " . mysqli_error($conn) . "</p>" ;
}
$SelectDB = mysqli_select_db($conn, $DBName) ;
if(!$SelectDB)
{
    echo "<p>There was an error while selecting the database. " . mysqli_error($conn) . "</p>";
}
?>

