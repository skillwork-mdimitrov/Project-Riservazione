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
        require 'login.php';
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
    
?>
<!-- test 1-->
<!DOCTYPE html> <!-- in order for the browsers to use the latest rendering standards. -->
<html lang="en"> <!-- useful for search engines and screen readers -->
<?php
    include 'headSection.php';
?>
<body>
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
                    <!--Sign up button-->
                    <!--<button type="button" class="signupLogin btn btn-info btn-md" data-toggle="modal" data-target="#signUp">Sign Up</button>-->
                    <!--Thing that pops up-->
                    <!--
                    <div class="modal fade" id="signUp" role="dialog">
                        <div class="modal-dialog">    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Sign Up</h4>
                              </div>
                              <div class="modal-body">
                                <p>
                                <form action="index.php">
                                    Username:<br>
                                    <input type="text" name="username"><br>
                                    Password:<br>
                                    <input type="password" name="password"><br>
                                    Re-enter password:<br>
                                    <input type="password" name="repassword"><br><br>
                                    <input type="submit" value="Submit">
                                </form>
                                </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </div>
                    </div>-->
                    <!--End of thing that pops up-->

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
                                    <p>User email:
                                      <?php 
                                      if(isset($_SESSION['userEmail']))
                                      {
                                          echo $_SESSION['userEmail'];
                                      }
                                      // else is currently unreachable, but just in case
                                      else
                                      {
                                          echo "Unknown";
                                      }
                                      ?>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <!-- My profile pop up END -->
                    
                    <!-- Register user button, initially hidden -->
                    <form action="#" method="POST">
                        <button type="button" class="signupLogin btn btn-danger btn-md" id="registration" data-toggle="modal"
                        data-target="#registerUsers" style="display:none">Register user</button>
                    </form>
                    
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
                                    Picture:<br>
                                    <input type="file" name="userPicture"><br>
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
                <div class="whiteColor"><span id="roomText">Room: </span>
                    <button type="button" class="btn btn-info" onclick="myFunction('buttonButton1')" id="buttonButton1">1</button>
                    <button type="button" class="btn btn-danger"  onclick="myFunction('buttonButton2')" id="buttonButton2">2</button>
                    <button type="button" class="btn btn-info"  onclick="myFunction('buttonButton3')" id="buttonButton3">3</button>
                    <button type="button" class="btn btn-danger"  onclick="myFunction('buttonButton4')" id="buttonButton4">4</button>
                    <button type="button" class="btn btn-info"  onclick="myFunction('buttonButton5')" id="buttonButton5">5</button>
                    </div>
                </p>
            </div>
            <div class="col-sm-4 col-xs-4"><p></p></div>
            <div class="week col-sm-4 col-xs-4">
                <p>
                    <button type="button" class="week1 btn btn-danger" >week before</button> 
                    <button type="button" class="week1 btn btn-info">week after</button>
                </p>
            </div>
        </div>
        <?php
                $days[] = [""];
                $date = date("Y-m-d");
                $date1 = getdate();
                if($date1['wday'] == 0)
                {
                    $date1['wday'] = 7;
                }
                echo "Today is: ".$date1['weekday']." and is the: ".$date1['wday']."th of the week";
        ?>
        <!-- Room navigation bar END -->
        <!--table 5-->
        <div id="Room5" style="display:none;" class="whiteColor">
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12" id="name"><p id="name1">Room 5</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table" id="mytable">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br><?php 
                      if($date1['wday'] == 1)
                      {
                           echo date('Y-m-d'); 
                           $days[0] = "".date("Y-m-d");
                      }
                     else {
                          echo date('Y-m-d', strtotime($date. ' - '.($date1['wday'] - 1).' days'));
                          $days[0] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 1 days'));
                     }
                      ?></td> 
                      <td>Tuesday<br><?php 
                       if($date1['wday'] == 2)
                      {
                           echo date('Y-m-d'); 
                           $days[1] = "".date("Y-m-d");
                      }else if($date1['wday'] < 2)
                      {
                         echo date('Y-m-d', strtotime($date. ' + 1 days'));    
                         $days[1] = "".date("Y-m-d");
                      }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 2 days'));
                         $days[1] = "".date("Y-m-d");
                      }                         
                      ?></td>
                      <td>Wednesday<br><?php 
                       if($date1['wday'] == 3)
                      {
                           echo date('Y-m-d'); 
                           $days[2] = "".date("Y-m-d");
                      }else if($date1['wday'] < 3)
                      {
                         echo date('Y-m-d', strtotime($date. ' + 2 days')); 
                         $days[2] = "".date('Y-m-d', strtotime($date. ' + 2 days'));
                      }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 3 days'));  
                         $days[2] = "".strtotime($date. ' - '.$date1['wday'].' days'.'+ 3 days');
                      }   
                      ?></td>
                      <td>Thursday<br><?php 
                       if($date1['wday'] == 4)
                      {
                           echo date('Y-m-d');
                           $days[3] = "".date("Y-m-d");
                      }else if($date1['wday'] < 4)
                      {
                         echo date('Y-m-d', strtotime($date. ' + 3 days')); 
                         $days[3] = "".date('Y-m-d', strtotime($date. ' + 3 days'));
                      }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 4 days'));  
                         $days[3] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 4 days'));
                      }   
                      ?></td>
                      <td>Friday<br><?php 
                       if($date1['wday'] == 5)
                      {
                           echo date('Y-m-d'); 
                           $days[4] = "".date("Y-m-d");
                      }else if($date1['wday'] < 5)
                      {
                         echo date('Y-m-d', strtotime($date. ' + 4 days'));   
                         $days[4] = "".date('Y-m-d', strtotime($date. ' + 4 days'));
                      }else{
                         echo date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 5 days'));  
                         $days[4] = "".date('Y-m-d', strtotime($date. ' - '.$date1['wday'].' days'.'+ 5 days'));
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
       <!-- TO BE REMOVED
        <div id="calendar">
        <iframe src="https://calendar.google.com/calendar/embed?showPrint=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=3m5vmovfngbf3f47r65gn60jag%40group.calendar.google.com&amp;color=%238D6F47&amp;ctz=Europe%2FAmsterdam"
        style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
       -->
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
                                    <p> Are you sure that you want to book this????</p>
                                    
                                    <input type="submit" value="YES"/>
                                    <input type="submit" value="NO"/>
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
                        document.getElementById('name1').innerHTML = 'Room 1';
                        break;
                    case 'buttonButton2':
                        document.getElementById('name1').innerHTML = 'Room 2';
                        break;
                    case 'buttonButton3':
                        document.getElementById('name1').innerHTML = 'Room 3';
                        break;
                    case 'buttonButton4':
                        document.getElementById('name1').innerHTML = 'Room 4';
                        break;
                    case 'buttonButton5':
                        document.getElementById('name1').innerHTML = 'Room 5';
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
                
                if(document.getElementById(some).style.backgroundColor == "darkgreen")
                       document.getElementById(some).style.backgroundColor = "transparent";
                    else
                       document.getElementById(some).style.backgroundColor = "darkgreen";    
            }
                       
            function getSomeColor()
            { 
                var nameOfRoom = document.getElementById("name1").innerHTML;
                var x = document.getElementById("mytable").getElementsByTagName("td");
                for(var i = 1; i <= 13; i++)
                {
                    var k = (7*i)-(i-1);
                    for(var j = 0; j <= 4; j++)
                    {
                         if(x[k+j].style.backgroundColor == "darkgreen"){
                            x[k+j].innerHTML = "Colum: "+(j+1)+" Row: "+ i;
                            document.getElementById("proc").innerHTML = "Colum: "+(j+1)+" Row: "+ i;
                         }
                    }
                }
               
            }
        </script>
        
        <div id="shit">
            <?php
                if(isset($_POST["button231"]))
                {
                    echo "Show some shit to Chen!";
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
