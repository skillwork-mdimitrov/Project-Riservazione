<?php
include 'dbConnection.php';
$userName = stripslashes($_POST['userName']); // stripslashes for security
$userEmail = stripslashes($_POST['userEmail']);
$userPw = stripslashes($_POST['userPassword']);
$userPicTEST = "sample text"; // need fix
$userPwMD = md5(stripslashes($userPw));

// Different errors
$errorCount = 0;
$invalidEmail = 0;
$shortPW = 0;

$checkUserExists = "SELECT COUNT(userEmail) FROM $UserTable WHERE userEmail='$userEmail'";
$checkUserExistsQuery = mysqli_query($DBConnect, $checkUserExists) ;
    if($checkUserExists == false)
    {
       echo "<p style=color:red;>There was an error while checking if the name is available. " . mysqli_error($DBConnect) . "</p>" ;
    }
    if($checkUserExistsQuery !== false)
    {
            $userRow = mysqli_fetch_row($checkUserExistsQuery) ;
            if($userRow[0] > 0)
            {
                $errorCount++ ;
                echo "<p style=color:red;>The username you entered already exist.</p>" ;
            }
     }   

$highestID = "SELECT MAX(userNumber)
              FROM user"; // gets the latest userID number
$highestIDQuery = mysqli_query($DBConnect, $highestID); // execute the select statement
$row = mysqli_fetch_assoc($highestIDQuery); // fetch that row as an array
$rowAsInt = implode($row, " "); // convert the array result to an integer
$userID = $rowAsInt + 1; // userID = the latest userID + 1

    // Different checks. Not so strict, administrator will be the only one with access to registration
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false)
    {
        $errorCount++;
        // $invalidEmail++;
    }

    if(empty($userPw) || strlen($userPw) <= 6)
    {
        $errorCount++;
        // $shortPW++;
    }
    

    if($errorCount == 0)  
    {    
        $InsertingString = "INSERT INTO $UserTable (userNumber, userName, userEmail, userPasswordSalt, roleID)"
                . "VALUES ('$userID', '$userName', '$userEmail', '$userPwMD', '4')" ; // Different categories?
        $InsertingQuery = mysqli_query($DBConnect, $InsertingString) ;

        if(!$InsertingQuery)
        {
            echo "<p>There was an error when inserting the user and pw. " .mysqli_error($DBConnect) ;
        }
        else
        {
            echo "<p><span style=color:green;>Successfully registered user</span></p>";
        }
    }
    else
    {
        echo '<script type="text/javascript">alert("Password too short, name taken or invalid email");</script>';
    }
?>

