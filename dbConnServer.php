<?php
$DBConnect = mysqli_connect("www.bunte-bloecke.de", "sql4", "sEuBpzQakp"); // Connection to Julian's server

// Database variables
$DBName = 'sql4' ;
$ReservTable = 'reservation' ;
$RoomTable = 'room' ;
$UserTable = 'user';
$UReservTable = 'userreservation' ;
$URoleTable = 'userrole' ;

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

