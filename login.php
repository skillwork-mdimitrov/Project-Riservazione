<?php
include 'dbConnection.php';
$CheckingString = "SELECT userNumber, userEmail FROM $UserTable WHERE userEmail='$userEmail' AND userPasswordSalt='".substr(md5($userPw), 0, 20)."'";
$CheckingQuery = mysqli_query($DBConnect, $CheckingString) ;
if(!$CheckingQuery)
{
    echo "<p>There was an error when checking if the password matched. " .mysqli_error($DBConnect) ;
}
else
{
    if (mysqli_num_rows($CheckingQuery) == 0)
    {
        echo "<span>The e-mail address/password " . " combination entered is not valid. </span>\n";
    } 
    else
    {
        $Row = mysqli_fetch_assoc($CheckingQuery);
        $_SESSION['userNumber'] = $Row['userNumber'];
        $_SESSION['userEmail'] = $Row['userEmail'];
        // echo "<span style='color:green'>You've succesfully logged in</span>" ;
    }
}
?>

