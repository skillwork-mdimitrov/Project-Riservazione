<?php
include 'dbConnection.php';
$johny = 'Johny';
$johnyPW = 'prototype115m';
$johnyEmail = 'johny@student.stenden.com';
$johnyPWmd5 = md5(stripslashes($johnyPW));
// $CheckingString = "SELECT userNumber, userName FROM $UserTable WHERE userName='$userName' AND userPasswordSH='$userPw'";
// $CheckingQuery = mysqli_query($DBConnect, $CheckingString) ;
$InsertingString = "INSERT INTO $UserTable ( userNumber, userName, userEmail, userPasswordSalt, roleID) VALUES ('3', '$johny', '$johnyEmail', '$johnyPWmd5', '3' ) " ;
$InsertingQuery = mysqli_query($DBConnect, $InsertingString) ;
if(!$InsertingQuery)
{
    echo "<p>There was an error when inserting the user and pw. " .mysqli_error($DBConnect) ;
}
else
{
    echo "<p>Successfuly inserted user</p>";
}
?>

