<?php
include 'dbConnection.php';
$userName = stripslashes($_POST['userName']); // stripslashes for security
$userEmail = stripslashes($_POST['userEmail']);
$userPw = stripslashes($_POST['userPassword']);
$userPicTEST = "sample text"; // need fix
$userPwMD = md5(stripslashes($userPw));
$highestID = "SELECT MAX(userNumber)
              FROM user"; // gets the latest userID number
$highestIDQuery = mysqli_query($DBConnect, $highestID); // execute the select statement
$row = mysqli_fetch_assoc($highestIDQuery); // fetch that row as an array
$rowAsInt = implode($row, " "); // convert the array result to an integer
$userID = $rowAsInt + 1; // userID = the latest userID + 1
           
$InsertingString = "INSERT INTO $UserTable (userNumber, userName, userEmail, userPasswordSalt, roleID)"
        . "VALUES (' ', '$userName', '$userEmail', '$userPwMD', '4')" ;
$InsertingQuery = mysqli_query($DBConnect, $InsertingString) ;

if(!$InsertingQuery)
{
    echo "<p>There was an error when inserting the user and pw. " .mysqli_error($DBConnect) ;
}
?>

