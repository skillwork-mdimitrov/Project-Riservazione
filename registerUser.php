<?php
include 'dbConnection.php';
// $userName = stripslashes($_POST['userName']); // No username needed for registration
$adminAccess = 1; // only admins can access this file
$studentNumber = 0; // default value
$userEmail = stripslashes($_POST['userEmail']);
$userPw = stripslashes($_POST['userPassword']);
$userPicTEST = "sample text"; // need fix
$userPwMD = md5(stripslashes($userPw));
$userType = ($_POST['userType']); // depending on the selected radio button, save the user type in a variable. Eg. student, admin

// Different errors
$errorCount = 0;
$invalidEmail = 0;
$invalidPW = 0;

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
                // echo "<p style=color:red;>The email address you entered already exist.</p>" ;
                echo '<script type="text/javascript">alert("The email address you entered already exist.");</script>';
            }
     }   

    // Different checks. Not so strict, administrator will be the only one with access to registration
     /* If the email address was not valid */
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false)
    {
        $errorCount++;
        $invalidEmail++;
    }

    /* If the password was empty or too short */
    if(strlen($userPw) <= 6 || empty($userPw) == true)
    {
        $errorCount++;
        $invalidPW++;
    }
    

    if($errorCount == 0)  
    {
        /* Gets the role of the current user */
        $roleIDString = "SELECT roleID
                        FROM userrole
                        WHERE roleName = '$userType'
                        LIMIT 1"; // select the ID of the role that the user specified. For example userType was student, *selects 3*
        $roleIDQuery = mysqli_query($DBConnect, $roleIDString); // execute the query
        $roleIDrow = mysqli_fetch_assoc($roleIDQuery); // fetch that row as an array
        $roleIDAsInt = implode($roleIDrow, " "); // convert the array to an integer
        
        /* If the user is student, set his student number to a variable that will be inserted in the database */
        if($_POST['userType'] == 'Student')
        {
            $studentNumber = $_POST['studentNumber'];
        }
        
        /* Inserts the information about the user in the database */
        $InsertingString = "INSERT INTO $UserTable (userNumber, studentNumber, userEmail, userPasswordSalt, roleID)"
                . "VALUES (' ', '$studentNumber', '$userEmail', '$userPwMD', '$roleIDAsInt')" ; // userNumber empty, because of auto-incremented database field
        $InsertingQuery = mysqli_query($DBConnect, $InsertingString) ;
        
        /* If the insertion fails */
        if(!$InsertingQuery)
        {
            echo "<p>There was an error when inserting the user. " .mysqli_error($DBConnect) ;
        }
        /* If it succesful, notify the user */
        else
        {
            echo '<script type="text/javascript">alert("Succefully registered user");</script>';
        }
    }
    else
    {
        /* if there was an issue with the email */
        if($invalidEmail > 0)
        {
            echo '<script type="text/javascript">alert("Invalid email address");</script>';
            // echo "<p><span style=color:red;>Invalid email address</span></p>";
        }
        
        /* if there was an issue with the password */
        elseif($invalidPW > 0)
        {
            echo '<script type="text/javascript">alert("Password too short or empty. Needs to be more than 6 characters");</script>';
            // echo "<p><span style=color:red;>Password too short. Needs to be more than 6 characters</span></p>";
        }
        
    }
?>

