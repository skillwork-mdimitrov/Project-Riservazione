<?php
    session_start();
    
    // PHP functions area 
    function logout()
    {
        session_destroy();
    }
    
    // END of PHP functions area
    
    if(isset($_POST['Submit'])) // upon login submit button press
    {
        $userName = stripslashes($_POST['userName']); // stripslashes for security
        $userPw = stripslashes($_POST['password']); // stripslashes for security
        require 'login.php';
        // $userNameSession = $_SESSION['userName'] = $userName; // use later
        // $userPwSession = $_SESSION['password'] = $userPw; // use later
    } 
    
    // If logout button is pressed
    if(isset($_POST['LogOut']))
    {
        logout();
        header('Location: '.$_SERVER['REQUEST_URI']); // refresh the page (so the login button becomes visible)
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
        <div id="nav-bar-container">
            <div class="row" id="nav-bar-container">
                <div class="col-sm-3 col-xs-3"><img src="Images/Logo3.png" class="img-responsive" alt="logo"></div>

                <div class="col-sm-5 col-xs-5"><p></p></div>

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

                    <!--Log in button-->
                    <button type="button" class="signupLogin btn btn-danger btn-md" id="login" data-toggle="modal" data-target="#logIn">Log in</button>
                    
                    <!--Log out button-->
                    <form action="#" method="POST">
                        <input type="submit" value="Log out" name="LogOut" class="signupLogin btn btn-danger btn-md" id="logout"> 
                    </form>
                    
                    <!--thing that pops up-->
                    <div class="modal fade" id="logIn" role="dialog">
                        <div class="modal-dialog">    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Login</h4>
                              </div>
                              <div class="modal-body">
                                <form action="#" method="POST">
                                    Username:<br>
                                    <input type="text" name="userName"><br>
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
                    <!--end of thing that pops up-->
                </div> 
            </div>
        </div>
        <!-- Navigation bar END -->

        <!--Room navigation bar (Contains the different rooms, the weeks)-->
        <div class="row" id="buttons">
            <div class="col-sm-4 col-xs-4">
                <p>
                    <div id="nameRoom">Room :
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

        <!-- Public google calendar embedded -->


        <!--table 1-->
        <div id="Room1">
        <div class="row" id="name">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room 1</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br>day 1</td> 
                      <td>Tuesday<br>day 2</td>
                      <td>Wednesday<br>day 3</td>
                      <td>Thursday<br>day 4</td>
                      <td>Friday<br>day 5</td>
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
        <div id="Room2" style="display:none;">
        <div class="row" id="name">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room 2</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br>day 1</td> 
                      <td>Tuesday<br>day 2</td>
                      <td>Wednesday<br>day 3</td>
                      <td>Thursday<br>day 4</td>
                      <td>Friday<br>day 5</td>
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
        <div id="Room3" style="display:none;">
        <div class="row" id="name">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room 3</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br>day 1</td> 
                      <td>Tuesday<br>day 2</td>
                      <td>Wednesday<br>day 3</td>
                      <td>Thursday<br>day 4</td>
                      <td>Friday<br>day 5</td>
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
        <div id="Room4" style="display:none;">
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12" id="name"><p>Room 4</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br>day 1</td> 
                      <td>Tuesday<br>day 2</td>
                      <td>Wednesday<br>day 3</td>
                      <td>Thursday<br>day 4</td>
                      <td>Friday<br>day 5</td>
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
        <div id="Room5" style="display:none;">
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12" id="name"><p>Room 5</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table">
                    <tr>
                      <td>Room name</td>
                      <td>Monday<br>day 1</td> 
                      <td>Tuesday<br>day 2</td>
                      <td>Wednesday<br>day 3</td>
                      <td>Thursday<br>day 4</td>
                      <td>Friday<br>day 5</td>
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
       <!--
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

                    <!--button-->
                    <button type="button" class="booking btn btn-success btn-md" data-toggle="modal" data-target="#booking">Booking</button>
                    <!--thing that pops up-->
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
                                <form action="index.php">
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
                </p>
            </div>
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
            
            function hideLoginButton()
            {
                var loginButton = document.getElementById('login');
                var logoutButton = document.getElementById('logout');
                loginButton.style.visibility = 'hidden';
                logoutButton.style.visibility = 'visible';
            }
            
            function showLoginButton()
            {
                var loginButton = document.getElementById('login');
                var logoutButton = document.getElementById('logout');
                loginButton.style.visibility = 'visible';
                logoutButton.style.visibility = 'hidden';
            }
            
        </script>
        <!-- end of Javascript-->
        
        <!-- Area for php scripts that NEED the javascript functions first -->       
        <?php
        if(isset($_SESSION['userNumber'])) // uppon logged in
        {
            echo '<script type="text/javascript">',
             'hideLoginButton();',
             '</script>';
        }
        else // when logged out
        {
            echo '<script type="text/javascript">',
            'showLoginButton();',
            '</script>';
        }
        ?>
        
  </body>
</html>
