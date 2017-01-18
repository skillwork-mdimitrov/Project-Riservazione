<?php
include 'dbConnection.php';
$CheckingString = "SELECT userNumber, userName FROM $UserTable WHERE userName='$userName' AND userPasswordSH='$userPw'";
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
        $_SESSION['userName'] = $Row['userName'];
        // echo "<span style='color:green'>You've succesfully logged in</span>" ;
    }
}
?>

