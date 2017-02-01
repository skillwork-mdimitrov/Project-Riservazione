<?php
    session_start();
    $adminAccess = 0; // only if an admin logs in, he can be granted access
    
    // PHP functions area 
    function logout()
    {
        session_destroy();
    }
    
    // END of PHP functions area
    
    if(isset($_POST['Submit'])) // upon login submit button press
    {
        $userEmail = stripslashes($_POST['email']); // stripslashes for security
        $userPw = stripslashes($_POST['password']); // stripslashes for security
        require 'login.php'; // Login requires by itself dbConnection. dbConnection is included in index, indirectly.
    } 
    
    // If logout button is pressed
    if(isset($_POST['LogOut']))
    {
        logout();
        header('Location: '.$_SERVER['REQUEST_URI']); // refresh the page (so the login button becomes visible)
    }
    
    // If register user button is pressed
    if(isset($_POST['registerUser']))
    {   
        require 'registerUser.php';
    }
    
    require "dbConnection.php";
  
?>
<!-- HEY STONE -->
<!DOCTYPE html> <!-- in order for the browsers to use the latest rendering standards. -->
<html lang="en"> <!-- useful for search engines and screen readers -->
<?php
    include 'headSection.php';
?>
    <body onload="displayData()">
    <div class="fluid-container"> <!-- WRAPPER. The bootstrap grid used below requires such container. 
    The xs(phone), sm(tablets), md(desktop) and lg(lager desktop) grids(Example: class="col-sm-3 col-xs-3") 
    will all "stack" vertically on screens/viewports less tdan 768 pixels. 
    This is where the xs grid fits in. Columns that use the col-xs-* classes will not stack vertically and continue to scale down on the smallest screens. -->

        <!--Navigation bar-->
        <div>
            <div class="row"> <!-- NAME THIS -->
                <!-- LOGO -->
                <div class="col-sm-3 col-xs-3"><img src="Images/logo.png" class="logo clickable img-responsive" alt="logo" onclick="window.location.reload();"></div> 
                
                <!-- Middle container, currently empty -->
                <div class="col-sm-5 col-xs-5"><p></p></div> 

                <!-- Button holder. Holds the user buttons. Login, logout, register user, my profile -->
                <div class="sl col-sm-4 col-xs-4"> 
                    

                    <!--Log in button, initially hidden-->
                    <button type="button" class="signupLogin btn btn-danger btn-md" id="login" data-toggle="modal" data-target="#logIn" style="display:none">Log in</button>
                    
                    <!-- Log in pop up -->
                    <div class="modal fade" id="logIn" role="dialog">
                        <div class="modal-dialog">    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Login</h4>
                              </div>
                              <div class="modal-body">
                                <form action="#" method="POST">
                                    Email address:<br>
                                    <input type="text" name="email"><br>
                                    Password:<br>
                                    <input type="password" name="password"><br><br>
                                    <input type="Submit" value="Submit" name="Submit"> <!-- needs to be uppercase -->
                                </form>    
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                      </div>
                    </div>
                    <!--End of log in pop up-->
                    
                    <!--Log out button, initially hidden-->
                    <form action="#" method="POST">
                        <input type="submit" value="Log out" name="LogOut" class="signupLogin btn btn-danger btn-md" id="logout" style="display:none"> 
                        
                    </form>
                    
                    <!-- My profile button, initially hidden -->
                    <button type="button" class="signupLogin btn btn-danger btn-md" id="myProfileButton" data-toggle="modal" 
                    data-target="#myProfile" style="display:none">My profile</button>
                    
                    <!-- My profile button pop up -->
                    <div class="modal fade" id="myProfile" role="dialog">
                        <div class="modal-dialog">    
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">My profile</h4>
                                </div>
                                <div class="modal-body">
                                    <p>My email:
                                      <?php 
                                      if(isset($_SESSION['userEmail']))
                                      {
                                          echo $_SESSION['userEmail']; // displays the user email
                                      }
                                      // in case session is lost
                                      else 
                                      {
                                          echo "<p>Unknown</p>"; 
                                      }
                                      ?>
                                    </p>
                                    <p>My username:
                                        <?php
                                        if(isset($_SESSION['userName']))
                                        {
                                            echo $_SESSION['userName']; // displays the user name
                                        }
                                        // in case session is lost
                                        else
                                        {
                                            echo "<p>Unnamed</p>";
                                        }
                                        ?>
                                    </p>
                                    <p>My role:
                                        <?php
                                        if(isset($_SESSION['roleID']))
                                        {
                                            $roleIDSession = $_SESSION['roleID']; // store the session's role id in a variable
                                            $roleNameSelect =   "SELECT roleName
                                                                FROM userrole
                                                                WHERE roleID = '$roleIDSession'"; // select the role name of the current session
                                            $roleNameQuery = mysqli_query($DBConnect, $roleNameSelect); // execute the selecting query
                                            $roleNameRow = mysqli_fetch_assoc($roleNameQuery); // // fetch that row as an array
                                            $roleNameAsString = implode($roleNameRow, " "); // convert the array to String
                                            echo $roleNameAsString; // display what the user role is
                                        }
                                        else
                                        {
                                            echo "<p>Undefined role</p>";
                                        }
                                        ?>
                                    </p>
                                    <?php 
                                    /* if the user logged in, happens to be a student (different than 0 student number) display his student number */
                                    if($_SESSION['studentNumber'] != 0)
                                    {
                                        echo "<p>My student number: " . $_SESSION['studentNumber'] . "</p>";
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <!-- My profile pop up END -->
                     
                    <!-- Register user button, initially hidden -->
                    <form action="#" method="POST" name="registrationForm">
                        <button type="button" class="signupLogin btn btn-danger btn-md" id="registration" data-toggle="modal"
                        data-target="#registerUsers" style="display:none">Register user</button>
                        <!--  *
                        *
                        *
                        *
                        * 
                        *
                        
                        * 
                        *
                        * -->
                    </form>
                    <?php
                    
                   
                ?>
                    <!-- Register user pop up -->
                    <div class="modal fade" id="registerUsers" role="dialog">
                        <div class="modal-dialog">    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Registration form</h4>
                              </div>
                              <div class="modal-body">
                                <form action="#" method="POST">                              
                                    Email address:<br>
                                    <input type="email" name="userEmail"><br>
                                    Password:<br>
                                    <input type="password" name="userPassword"><br>
                                    Student number:<br>
                                    <input type="number" name="studentNumber" placeholder="If applicable"><br>
                                    Picture:<br>
                                    <input type="file" name="userPicture"><br>
                                    User type:<br>
                                    <input type="radio" name="userType" value="Student" checked="checked"> Student<br>
                                    <input type="radio" name="userType" value="Teacher"> Teacher<br>
                                    <input type="radio" name="userType" value="Admin"> Admin<br><br>
                                    <input type="submit" value="Submit" name="registerUser"> 
                                </form>    
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                      </div>
                    </div>                   
                    <!-- END of register user pop up -->           
                    
                </div> 
                <!-- Button holder -->
            </div>
            <!-- Div class Row END -->
        </div>
        <!-- Navigation bar END -->

        <!--Room navigation bar (Contains the different rooms buttons, the weeks)-->
        <div class="row" id="buttons">
            <div class="col-sm-4 col-xs-4">
                <p>
                <div class="whiteColor">
                    <form action="#" method="POST">
                        <input type="submit" class="btn btn-info" onclick="myFunction('buttonButton1')" id="buttonButton1" name="buttonButton1" value="1"/>
                        <input type="submit" class="btn btn-danger"  onclick="myFunction('buttonButton2')" id="buttonButton2" name="buttonButton2" value="2"/>
                        <input type="submit" class="btn btn-info"  onclick="myFunction('buttonButton3')" id="buttonButton3" name="buttonButton3" value="3"/>
                        <input type="submit" class="btn btn-danger"  onclick="myFunction('buttonButton4')" id="buttonButton4" name="buttonButton4" value="4"/>
                        <input type="submit" class="btn btn-info"  onclick="myFunction('buttonButton5')" id="buttonButton5" name="buttonButton5" value="5"/>
                    </form>
                </div>
                <?php
                 $roomNr = 1;
                 if(isset($_POST['buttonButton1']) || isset($_POST['buttonButton2']) || isset($_POST['buttonButton3']) || isset($_POST['buttonButton4']) || isset($_POST['buttonButton5']) )
                 {
                     if(isset($_POST['buttonButton1']))
                    {
                        $roomNr = $_POST['buttonButton1'];
                    }
                    if(isset($_POST['buttonButton2']))
                    {
                         $roomNr = $_POST['buttonButton2'];
                    }
                    if(isset($_POST['buttonButton3']))
                    {
                         $roomNr = $_POST['buttonButton3'];
                    }
                    if(isset($_POST['buttonButton4']))
                    {
                        $roomNr = $_POST['buttonButton4'];
                    }
                    if(isset($_POST['buttonButton5']))
                    {
                        $roomNr = $_POST['buttonButton5'];
                    }
                    $_SESSION['roomNr'] = $roomNr;
                    $sql1 = "SELECT reservation.date,reservation.roomNumber, reservation.timeIn, reservation.timeOut, user.userName FROM reservation,user,userreservation WHERE userreservation.userNumber = user.userNumber and userreservation.reservationNumber = reservation.reservationNumber and reservation.roomNumber = {$_SESSION['roomNr']}";
                    
                    $array[][] = [[]];
                    $r = 0;
                    $result = mysqli_query($DBConnect, $sql1);// or die("Say something!!!".mysqli_error($DBConnect));
                    if(($row = mysqli_num_rows($result)) > 0)
                    {
                        while($res = mysqli_fetch_assoc($result))
                        {
                            $array[$r]['timeIn'] = $res['timeIn'];
                            $array[$r]['timeOut'] = $res['timeOut'];
                            $array[$r]['date'] = $res['date'];
                            $array[$r]['userName'] = $res['userName'];
                            $array[$r]['roomNumber'] = $res['roomNumber'];
                            $r++;
                        }
                    }
                 }else{
                       $sql1 = "SELECT reservation.date,reservation.roomNumber, reservation.timeIn, reservation.timeOut, user.userName FROM reservation,user,userreservation WHERE userreservation.userNumber = user.userNumber and userreservation.reservationNumber = reservation.reservationNumber and reservation.roomNumber = 1";
                    $array[][] = [[]];
                    $r = 0;
                    $result = mysqli_query($DBConnect, $sql1);// or die("Say something!!!".mysqli_error($DBConnect));
                    if(($row = mysqli_num_rows($result)) > 0)
                    {
                        while($res = mysqli_fetch_assoc($result))
                        {
                            $array[$r]['timeIn'] = $res['timeIn'];
                            $array[$r]['timeOut'] = $res['timeOut'];
                            $array[$r]['date'] = $res['date'];
                            $array[$r]['userName'] = $res['userName'];
                            $array[$r]['roomNumber'] = $res['roomNumber'];
                            $r++;
                        }
                    }
                 }
                ?>
                </p>
            </div>
              <?php
                $days[] = array();
                $order[] = array(); 
                $hours[] = array( );
                $hours["08:00:00"] = 1;
                $hours["09:00:00"] = 2;
                $hours["10:00:00"] = 3;
                $hours["11:00:00"] = 4;
                $hours["12:00:00"] = 5;
                $hours["13:00:00"] = 6;
                $hours["14:00:00"] = 7;
                $hours["15:00:00"] = 8;
                $hours["16:00:00"] = 9;
                $hours["17:00:00"] = 10;
                $hours["18:00:00"] = 11;
                $hours["19:00:00"] = 12;
                $hours["20:00:00"] = 13;
                $date = 0;
                $date1 = date("Y-m-d");
                if(isset($_SESSION['date']))
                     $date = $_SESSION['date'];
                else
                    $date = date("Y-m-d");
                $date1 = getdate();
                if($date1['wday'] == 0)
                {
                    $date1['wday'] = 7;
                }
        ?>
            <?php
                if(!isset($_POST["wBefore"]))
                {
                   $before = 0;
                }else{
                    $before = $_POST["wBefore"];
                    if(isset($_POST['after']))
                    {
                        $date = date('Y-m-d', strtotime($date. ' + 7 days'));
                        $before++;
                    }
                    
                     if(isset($_POST['before']) && $before > 0)
                    {
                       $date = date('Y-m-d', strtotime($date. ' - 7 days'));
                       $before--;
                    }
                }
               
              
               ?>
            <div class="col-sm-4 col-xs-4"><p></p></div>
            <div class="week col-sm-4 col-xs-4">
                <p>
                    <form action="#" method="POST">
                        <input type="submit" class="week1 btn btn-danger" name="after" value="Week after"/>
                        <input type="submit" class="week1 btn btn-info" name="before" value="Week before"/>
                        <input type="submit" class="week1 btn btn-danger" name="currentWeek" value="Current week"/>
                        <input type="hidden" value="<?php echo $before; ?>" name="wBefore"/>
                    </form>
                </p>
            </div>
        </div>
        
       <?php
        if(isset($_POST['currentWeek']))
          {
                    $_SESSION['date'] = date("Y-m-d");
                    $date = $_SESSION['date'];
                    $before = 0;
           }
                
                
       ?>
        
        <!-- Room navigation bar END -->
        <!--table 5-->
        <div id="Room5" style="display:none;" class="whiteColor">
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12" id="name">
                <p>Room <label id="name1"><?php echo $roomNr;
                ?></label></p>
                
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12" id="tableDiv" >
                <table class="table" id="mytable">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br><?php 
                      if($date1['wday'] == 1)
                      {
                           echo $date;
                           //echo date('Y-m-d'); 
                           $days[0] = "".date("Y-m-d");
                           $order[$days[0]] = 7;
                      }
                     else {
                          echo date('Y-m-d', strtotime($date. ' - '.($date1['wday'] - 1).' days'));
                          $days[0] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 1 days')); 
                          $order[$days[0]] = 7;
                     }
                      ?></td> 
                      <td>Tuesday<br><?php 
                       if($date1['wday'] == 2)
                      { 
                           echo $date;
                           //echo date('Y-m-d'); 
                           $days[1] = $date;
                           $order[$days[1]] = 8;
                      }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 2 days'));
                         $days[1] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 2 days'));
                         $order[$days[1]] = 8;
                      }                         
                      ?></td>
                      <td>Wednesday<br><?php 
                       if($date1['wday'] == 3)
                      {
                            echo $date;
                           //echo date('Y-m-d');  
                           $days[2] = $date;
                           $order[$days[2]] = 9;
                       }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 3 days'));  
                         $days[2] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 3 days'));  
                         $order[$days[2]] = 9;
                      }   
                      ?></td>
                      <td>Thursday<br><?php 
                       if($date1['wday'] == 4)
                      {
                            echo $date;
                           //echo date('Y-m-d'); 
                           $days[3] = $date;
                           $order[$days[3]] = 10;
                      }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 4 days'));  
                         $days[3] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 4 days'));
                         $order[$days[3]] = 10;
                          
                      }   
                      ?></td>
                      <td>Friday<br><?php 
                       if($date1['wday'] == 5)
                      {
                            echo $date;
                           //echo date('Y-m-d');  
                           $days[4] = $date;
                           $order[$days[4]] = 11;
                      }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 5 days'));  
                         $days[4] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 5 days'));
                         $order[$days[4]] = 11;
                      }    
                      ?></td>
                    </tr>
                    <tr>
                      <td>08:00</td>
                      <td id="cell1" onclick="read('cell1')"></td> 
                      <td id="cell2" onclick="read('cell2')"></td>
                      <td id="cell3" onclick="read('cell3')"></td>
                      <td id="cell4" onclick="read('cell4')"></td> 
                      <td id="cell5" onclick="read('cell5')"></td>
                    </tr>
                    <tr>
                      <td>09:00</td>
                      <td id="cell6" onclick="read('cell6')"></td> 
                      <td id="cell7" onclick="read('cell7')"></td>
                      <td id="cell8" onclick="read('cell8')"></td>
                      <td id="cell9" onclick="read('cell9')"></td> 
                      <td id="cell10" onclick="read('cell10')"></td>
                    </tr>
                    <tr>
                      <td>10:00</td>
                      <td id="cell11" onclick="read('cell11')"></td> 
                      <td id="cell12" onclick="read('cell12')"></td>
                      <td id="cell13" onclick="read('cell13')"></td>
                      <td id="cell14" onclick="read('cell14')"></td> 
                      <td id="cell15" onclick="read('cell15')"></td>
                    </tr>
                    <tr>
                      <td>11:00</td>
                      <td id="cell16" onclick="read('cell16')"></td> 
                      <td id="cell17" onclick="read('cell17')"></td>
                      <td id="cell18" onclick="read('cell18')"></td>
                      <td id="cell19" onclick="read('cell19')"></td> 
                      <td id="cell20" onclick="read('cell20')"></td>
                    </tr>
                    <tr>
                      <td>12:00</td>
                      <td id="cell21" onclick="read('cell21')"></td>
                      <td id="cell22" onclick="read('cell22')"></td>
                      <td id="cell23" onclick="read('cell23')"></td> 
                      <td id="cell24" onclick="read('cell24')"></td>
                      <td id="cell25" onclick="read('cell25')"></td>
                    </tr>
                    <tr>
                      <td>13:00</td>
                      <td id="cell26" onclick="read('cell26')"></td> 
                      <td id="cell27" onclick="read('cell27')"></td>
                      <td id="cell28" onclick="read('cell28')"></td>
                      <td id="cell29" onclick="read('cell29')"></td> 
                      <td id="cell30" onclick="read('cell30')"></td>
                    </tr>
                    <tr>
                      <td>14:00</td>
                      <td id="cell31" onclick="read('cell31')"></td> 
                      <td id="cell32" onclick="read('cell32')"></td>
                      <td id="cell33" onclick="read('cell33')"></td>
                      <td id="cell34" onclick="read('cell34')"></td> 
                      <td id="cell35" onclick="read('cell35')"></td>
                    </tr>
                    <tr>
                      <td>15:00</td>
                      <td id="cell36" onclick="read('cell36')"></td> 
                      <td id="cell37" onclick="read('cell37')"></td>
                      <td id="cell38" onclick="read('cell38')"></td>
                      <td id="cell39" onclick="read('cell39')"></td> 
                      <td id="cell40" onclick="read('cell40')"></td>
                    </tr>
                    <tr>
                      <td>16:00</td>
                      <td id="cell41" onclick="read('cell41')"></td> 
                      <td id="cell42" onclick="read('cell42')"></td>
                      <td id="cell43" onclick="read('cell43')"></td>
                      <td id="cell44" onclick="read('cell44')"></td> 
                      <td id="cell45" onclick="read('cell45')"></td>
                    </tr>
                    <tr>
                      <td>17:00</td>
                      <td id="cell46" onclick="read('cell46')"></td> 
                      <td id="cell47" onclick="read('cell47')"></td>
                      <td id="cell48" onclick="read('cell48')"></td>
                      <td id="cell49" onclick="read('cell49')"></td> 
                      <td id="cell50" onclick="read('cell50')"></td>
                    </tr>
                    <tr>
                      <td>18:00</td>
                      <td id="cell51" onclick="read('cell51')"></td> 
                      <td id="cell52" onclick="read('cell52')"></td>
                      <td id="cell53" onclick="read('cell53')"></td>
                      <td id="cell54" onclick="read('cell54')"></td> 
                      <td id="cell55" onclick="read('cell55')"></td>
                    </tr>
                    <tr>
                      <td>19:00</td>
                      <td id="cell56" onclick="read('cell56')"></td> 
                      <td id="cell57" onclick="read('cell57')"></td>
                      <td id="cell58" onclick="read('cell58')"></td>
                      <td id="cell59" onclick="read('cell59')"></td> 
                      <td id="cell60" onclick="read('cell60')"></td>
                    </tr>
                    <tr>
                      <td>20:00</td>
                      <td id="cell61" onclick="read('cell61')"></td> 
                      <td id="cell62" onclick="read('cell62')"></td>
                      <td id="cell63" onclick="read('cell63')"></td>
                      <td id="cell64" onclick="read('cell64')"></td> 
                      <td id="cell65" onclick="read('cell65')"></td>
                    </tr>
                </table>
            </div>
        </div>
            
        </div> 
         <div class="row">
            <div class="col-sm-8 col-xs-8"><p></p></div>
            <div class="col-sm-4 col-xs-4">

                <p>
                <!--Booking button-->
                <button type="submit" class="booking btn btn-success btn-md"  data-toggle="modal"
                        data-target="#booking"  onclick="getSomeColor()" value="Booking">Booking</button>
                    <input type="hidden" value="something" name="pptppt" id="proc"/>
                <!--Booking button pop up-->
                <div class="modal fade" id="booking" role="dialog">
                        <div class="modal-dialog">    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Registration form</h4>
                              </div>
                              <div class="modal-body">
                                <form action="#" method="POST">       
                                    <div id="contentForm">
                                    <p> Are you sure that you want to book this????</p>
                                   
                                    <input type="submit" name="button123" value="YES" onclick=""/>
                                    <input type="submit" value="NO"/>
                                    <input type="hidden" value="" name="dateIn" id="dateIn"/>
                                    <input type="hidden" value="" name="timeIn" id="timeIn"/>
                                    <input type="hidden" value="" name="timeOut" id="timeOut"/>
                                    <input type="hidden" value="" name="roomNumber" id="roomNumber"/>
                                    </div>
                                </form>    
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                      </div>
                    </div>                   
                <!-- Booking button pop up END -->
            </div>

        <!--footer -->
       
        <!-- footer end -->
    </div>
        <!-- Javascript -->
        <script>
              
             
            document.getElementById('Room5').style.display = 'block';
            function myFunction(elementID) {
                switch(elementID){
                    case 'buttonButton1':
                        document.getElementById('name1').innerHTML = '1';
                        break;
                    case 'buttonButton2':
                        document.getElementById('name1').innerHTML = '2';
                        break;
                    case 'buttonButton3':
                        document.getElementById('name1').innerHTML = '3';
                        break;
                    case 'buttonButton4':
                        document.getElementById('name1').innerHTML = '4';
                        break;
                    case 'buttonButton5':
                        document.getElementById('name1').innerHTML = '5';
                        break;
                }
            }            
            // If user is not logged in, show him the Login button
            function showLogin()
            {
                var loginButton = document.getElementById('login');
                loginButton.style = "block";
            }
            
            // If the user is logged in, show him My profile button
            function showProfile()
            {
                var myProfileButton = document.getElementById('myProfileButton');
                myProfileButton.style = "block";
            }
            
            // If user is logged in, show him the Logout button
            function showLogout()
            {
                var logoutButton = document.getElementById('logout');
                logoutButton.style = "block";
            }         
            
            // If the user is logged in and is admin, show him the register user button
            function showRegistration()
            {
                var registerButton = document.getElementById('registration');
                registerButton.style = "block";
            }
            
            function read(some){
                if(document.getElementById(some).style.backgroundColor != "red")
                if(document.getElementById(some).style.backgroundColor == "darkgreen")
                       document.getElementById(some).style.backgroundColor = "transparent";
                    else
                       document.getElementById(some).style.backgroundColor = "darkgreen";    
            }
            
            function displayData()
            {
                 var array = <?php echo json_encode($array); ?>;
                 var size =  <?php echo json_encode($r); ?>;
                 var days =  <?php echo json_encode($days); ?>;
                 var order = <?php echo json_encode($order);?>;
                 var hours = <?php echo json_encode($hours);?>;
                 
                 var x = document.getElementById("mytable").getElementsByTagName("td");
                 for(var p = 0; p < size; p++)
                 {
                     
                    q = order[array[p]['date']];
                    w = hours[array[p]['timeIn']];
                    e = hours[array[p]['timeOut']];
                    sw = 0;
                    for(t = 7; t <= 11 && sw == 0; t++)
                    {
                          if(q == t)
                                sw = 1;
                    }
                    
                    for(o = w; o <= e && sw == 1; o++)
                    {
                        s = ((7*o)-(o-1))+ (q - 7);
                        x[s].style.backgroundColor = "red";
                        x[s].innerHTML = array[p]['userName'];
                    }
                 }
            }
            
            function tableRefresh(){
                 setInterval(function() {
                  window.location.reload();
                }, 200); 
            }
                 
            function checkDaysChecked(){
                var sw = true;
                var days = [0,0,0,0,0];
                var x = document.getElementById("mytable").getElementsByTagName("td");
                for(var i = 1; i <= 13; i++)
                {   
                    var k = (7*i)-(i-1);
                    for(var j = 0; j <= 4; j++)
                    {
                        if(x[k+j].style.backgroundColor == "darkgreen")
                        {
                            days[j]=1;
                        }
                    }
                }
                
                for(var p = 0; p < 4 && sw; p++)
                {
                    if(days[p] == days[p + 1] && days[p] == 1){
                        sw = false;
                        return sw;
                    }
                }
                var l = 0;
                for(var p = 0; p < 4 && sw; p++)
                {
                    l += days[p];
                }
                if(l == 0)
                      return false;
                return sw;
            } 
            
            
            
            function getSomeColor()
            { 
                
                var nameOfRoom = document.getElementById("name1").innerHTML;
                document.getElementById("roomNumber").value = nameOfRoom;
                var date = <?php echo json_encode($days); ?>;
                var dateOut = 0;
                var x = document.getElementById("mytable").getElementsByTagName("td");
                if(checkDaysChecked()){
                     document.getElementById("contentForm").style.display = "block";
                for(var i = 1; i <= 13; i++)
                {
                    var k = (7*i)-(i-1);
                    for(var j = 0; j <= 4; j++)
                    {
                         if(x[k+j].style.backgroundColor == "darkgreen"){
                           // x[k+j].innerHTML = "Colum: "+(j+1)+" Row: "+ i;
                            if(dateOut == 0)
                            document.getElementById("dateIn").value = j;
                           
                            if(dateOut == 0){
                             document.getElementById("timeIn").value = i+7;
                         }
                            dateOut = i+7;
                         }
                    }
                }
               document.getElementById("timeOut").value = dateOut;
                 }else{
                     alert("Please select a field, you can't have empty!");
                     document.getElementById("contentForm").style.display = "none";
                  }
            }
        </script>
        
        <div id="shit">
            <?php
                  if(isset($_POST['after']) || isset($_POST['before'])){
                      $_SESSION["yourDate"] = $days;
                      $_SESSION["date"] = $date;
                  }
                  
                  if(!isset($_SESSION["yourDate"]) || empty($_SESSION["yourDate"]))
                  {
                     $_SESSION["yourDate"] = $days;
                  }
                 if(isset($_POST["button123"]))
                { 
                  if(isset($_SESSION["userNumber"]))
                 {
                    $a = $_POST['dateIn'];
                    $b = $_POST['timeIn'];
                    $c = $_POST['timeOut'];
                    if(!empty($_SESSION["roomNr"])){
                      $d = $_SESSION["roomNr"];
                    $_SESSION["roomNr"] = 1;
                    }
                  else {
                    $d = 1;
                  }
                  echo $_SESSION["yourDate"][$a];
                    if(strlen($b) == 1)
                    {
                        $b = "0".$b.":00:00";
                    }else{
                        $b = $b.":00:00";
                    }
                    
                     if(strlen($c) == 1)
                    {
                        $c = "0".$c.":00:00";
                    }else{
                        $c = $c.":00:00";
                    }
                    $sql = "INSERT INTO `reservation`(`date`, `timeIn`, `timeOut`, `roomNumber`) VALUES ('{$_SESSION['yourDate'][$a]}','{$b}','{$c}','{$d}')";
                    mysqli_query($DBConnect, $sql) or die("Something happend: ".mysqli_error($DBConnect));
                    $sql = "SELECT reservationNumber FROM reservation ORDER BY reservationNumber DESC LIMIT 1";
                    $result = mysqli_query($DBConnect, $sql);
                    $res = mysqli_fetch_assoc($result);
                    $resNumber = $res['reservationNumber'];
                    $sql = "INSERT INTO `userreservation`(`userNumber`, `reservationNumber`) VALUES ({$_SESSION['userNumber']},{$resNumber})";
                    mysqli_query($DBConnect, $sql) or die("Something happend: ".mysqli_error($DBConnect));
                    }else{
                        echo "<script> alert('You need to login, for reserving a room!!!'); </script>";
                    }
                    $_SESSION['yourDate']="";
               }
             
            ?>
        </div>
        <!-- END of Javascript-->
        
        <!-- Area for php scripts that NEED the javascript functions first -->       
        <?php
        
        // If there is no session, show the user the login button
        if(!isset($_SESSION['userNumber']))
        {
            echo '<script type="text/javascript">',
            'showLogin();',
            '</script>';
        }
        // If there is session, the user is logged in, show him the logout and my profile buttons
        else
        {
            // call the show logout button javascript function
            echo '<script type="text/javascript">',
            'showLogout();',
            '</script>';
            
            // call the show profile button javascript function
            echo '<script type="text/javascript">',
            'showProfile();',
            '</script>';
        }
        
        // If there is a session and the user logged in, is admin, show him the registration button
        if(isset($_SESSION['userNumber']) && $adminAccess > 0)
        {
            echo '<script type="text/javascript">',
            'showRegistration();',
            '</script>';
        }
        ?>      
  </body>
</html>
