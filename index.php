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
                    <button type="button" class="btn btn-info" onclick="myFunction('Room1')" id="buttonButton">1</button>
                    <button type="button" class="btn btn-danger"  onclick="myFunction('Room2')" id="buttonButton">2</button>
                    <button type="button" class="btn btn-info"  onclick="myFunction('Room3')" id="buttonButton">3</button>
                    <button type="button" class="btn btn-danger"  onclick="myFunction('Room4')" id="buttonButton">4</button>
                    <button type="button" class="btn btn-info"  onclick="myFunction('Room5')" id="buttonButton">5</button>
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
        <!-- Room navigation bar END -->

        <!--table 1-->
        <div id="Room1" class="whiteColor">
        <div class="row" id="name">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room 1</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <?php
                $date = date("Y-m-d");;
                ?>
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br><?php echo date('Y-m-d'); ?></td> 
                      <td>Tuesday<br><?php echo date('Y-m-d', strtotime($date. ' + 1 days')); ?></td>
                      <td>Wednesday<br><?php echo date('Y-m-d', strtotime($date. ' + 2 days')); ?></td>
                      <td>Thursday<br><?php echo date('Y-m-d', strtotime($date. ' + 3 days')); ?></td>
                      <td>Friday<br><?php echo date('Y-m-d', strtotime($date. ' + 4 days')); ?></td>
                    </tr>
                    <tr>
                      <td>0800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>0900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1100</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1200</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1300</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1400</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1500</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1600</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1700</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>2000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>

        <!--table 2-->
        <div id="Room2" style="display:none;" class="whiteColor">
        <div class="row" id="name">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room 2</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br><?php echo date('Y-m-d'); ?></td> 
                      <td>Tuesday<br><?php echo date('Y-m-d', strtotime($date. ' + 1 days')); ?></td>
                      <td>Wednesday<br><?php echo date('Y-m-d', strtotime($date. ' + 2 days')); ?></td>
                      <td>Thursday<br><?php echo date('Y-m-d', strtotime($date. ' + 3 days')); ?></td>
                      <td>Friday<br><?php echo date('Y-m-d', strtotime($date. ' + 4 days')); ?></td>
                    </tr>
                    <tr>
                      <td>0800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>0900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1100</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1200</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1300</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1400</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1500</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1600</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1700</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>2000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
        <!--table 3-->
        <div id="Room3" style="display:none;" class="whiteColor">
        <div class="row" id="name">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room 3</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br><?php echo date('Y-m-d'); ?></td> 
                      <td>Tuesday<br><?php echo date('Y-m-d', strtotime($date. ' + 1 days')); ?></td>
                      <td>Wednesday<br><?php echo date('Y-m-d', strtotime($date. ' + 2 days')); ?></td>
                      <td>Thursday<br><?php echo date('Y-m-d', strtotime($date. ' + 3 days')); ?></td>
                      <td>Friday<br><?php echo date('Y-m-d', strtotime($date. ' + 4 days')); ?></td>
                    </tr>
                    <tr>
                      <td>0800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>0900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1100</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1200</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1300</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1400</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1500</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1600</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1700</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>2000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
        <!--table 4-->
        <div id="Room4" style="display:none;" class="whiteColor">
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12" id="name"><p>Room 4</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br><?php echo date('Y-m-d'); ?></td> 
                      <td>Tuesday<br><?php echo date('Y-m-d', strtotime($date. ' + 1 days')); ?></td>
                      <td>Wednesday<br><?php echo date('Y-m-d', strtotime($date. ' + 2 days')); ?></td>
                      <td>Thursday<br><?php echo date('Y-m-d', strtotime($date. ' + 3 days')); ?></td>
                      <td>Friday<br><?php echo date('Y-m-d', strtotime($date. ' + 4 days')); ?></td>
                    </tr>
                    <tr>
                      <td>0800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>0900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1100</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1200</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1300</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1400</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1500</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1600</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1700</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>2000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
        <!--table 5-->
        <div id="Room5" style="display:none;" class="whiteColor">
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12" id="name"><p>Room 5</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br><?php echo date('Y-m-d'); ?></td> 
                      <td>Tuesday<br><?php echo date('Y-m-d', strtotime($date. ' + 1 days')); ?></td>
                      <td>Wednesday<br><?php echo date('Y-m-d', strtotime($date. ' + 2 days')); ?></td>
                      <td>Thursday<br><?php echo date('Y-m-d', strtotime($date. ' + 3 days')); ?></td>
                      <td>Friday<br><?php echo date('Y-m-d', strtotime($date. ' + 4 days')); ?></td>
                    </tr>
                    <tr>
                      <td>0800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>0900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1100</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1200</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1300</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1400</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1500</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1600</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1700</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1800</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>1900</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>2000</td>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td></td> 
                      <td></td>
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
                <button type="button" class="booking btn btn-success btn-md" data-toggle="modal" data-target="#booking">Booking</button>
                <!--Booking button pop up-->
                <div class="modal fade" id="booking" role="dialog">
                    <div class="modal-dialog">    
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Booking</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                            <p>Enter the Room number and then the date and time to book the room.</p>
                            <form action="#">
                                Room :<br>
                                <input type="text" name="roomName"><br>
                                Date :<br>
                                <input type="text" name="date"><br>
                                Time :<br>
                                <input type="text" name="time"><br>
                                <input type="submit" value="Submit" name="bookRoom">
                            </form>
                            </p>
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
        <?php
            // include 'footerSection.php';
        ?>
        <!-- footer end -->
    </div>
        <!-- Javascript -->
        <script>
            
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
            });
            
            function myFunction(elementID) {
                switch(elementID){
                    case 'Room1':
                        document.getElementById('Room1').style.display = 'block';
                        document.getElementById('Room2').style.display = 'none';
                        document.getElementById('Room3').style.display = 'none';
                        document.getElementById('Room4').style.display = 'none';
                        document.getElementById('Room5').style.display = 'none';
                        break;
                    case 'Room2':
                        document.getElementById('Room1').style.display = 'none';
                        document.getElementById('Room2').style.display = 'block';
                        document.getElementById('Room3').style.display = 'none';
                        document.getElementById('Room4').style.display = 'none';
                        document.getElementById('Room5').style.display = 'none';
                        break;
                    case 'Room3':
                        document.getElementById('Room1').style.display = 'none';
                        document.getElementById('Room2').style.display = 'none';
                        document.getElementById('Room3').style.display = 'block';
                        document.getElementById('Room4').style.display = 'none';
                        document.getElementById('Room5').style.display = 'none';
                        break;
                    case 'Room4':
                        document.getElementById('Room1').style.display = 'none';
                        document.getElementById('Room2').style.display = 'none';
                        document.getElementById('Room3').style.display = 'none';
                        document.getElementById('Room4').style.display = 'block';
                        document.getElementById('Room5').style.display = 'none';
                        break;
                    case 'Room5':
                        document.getElementById('Room1').style.display = 'none';
                        document.getElementById('Room2').style.display = 'none';
                        document.getElementById('Room3').style.display = 'none';
                        document.getElementById('Room4').style.display = 'none';
                        document.getElementById('Room5').style.display = 'block';
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
        </script>
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
