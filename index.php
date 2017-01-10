<!DOCTYPE html> <!-- so tde browsers can use tde latest rendering standards. -->
<html lang="en"> <!-- useful for search engines and screen readers -->
    <head>
        <meta charset="UTF-8"/> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- to support IE 9, IE 8 -->
        <meta name="viewport" content="widtd=device-widtd, initial-scale=1"> <!-- render tde widtd of tde page at tde widtd of its own screen, So if tdat 
        screen is 320px wide, tde browser window will be 320px wide -->
        <link rel="stylesheet" type="text/css" href="CSS/indexCSS.css"> <!-- reference to tde CSS stylesheet -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- Justification of tdis is needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- Justification of tdis is needed -->
        <link rel="icon" href="Images/favicon.ico"/> <!-- tde icon will be displayed in tde browser tabs -->
        <title>HomePage</title>
        <!-- javascript -->
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
        </script>
        <!-- end of javascript-->
    </head>
    <body>
        <div class="fluid-container"> <!-- WRAPPER. The bootstrap grid used below requires such container. 
        The xs(phone), sm(tablets), md(desktop) and lg(lager desktop) grids(Example: class="col-sm-3 col-xs-3") 
        will all "stack" vertically on screens/viewports less tdan 768 pixels. 
        This is where tde xs grid fits in. Columns tdat use tde col-xs-* classes will not stack vertically and continue to scale down on tde smallest screens. -->
            
            <!--Navigation bar-->
            <div id="nav-bar-container">
                <div class="row" id="nav-bar-container">
                    <div class="col-sm-3 col-xs-3"><img src="Images/Logo3.png" class="img-responsive" alt="logo"></div>
                    
                    <div class="col-sm-5 col-xs-5"><p></p></div>

                    <div class="sl col-sm-4 col-xs-4">
                        <!--Sign up button-->
                        <button type="button" class="signupLogin btn btn-info btn-md" data-toggle="modal" data-target="#signUp">Sign Up</button>
                        <!--Thing tdat pops up-->
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
                        </div>
                        <!--End of thing that pops up-->
                    
                        <!--button-->
                        <button type="button" class="signupLogin btn btn-danger btn-md" data-toggle="modal" data-target="#logIn">LogIn</button>
                        <!--thing that pops up-->
                        <div class="modal fade" id="logIn" role="dialog">
                            <div class="modal-dialog">    
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">LogIn</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>
                                    <form action="index.php">
                                        Username:<br>
                                        <input type="text" name="username"><br>
                                        Password:<br>
                                        <input type="password" name="password"><br><br>
                                        <input type="submit" value="Submit">
                                    </form>
                                    </p>
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

            <!--Room navigation bar (Contains tde different rooms, tde weeks)-->
            <div class="row" id="buttons">
                <div class="col-sm-4 col-xs-4">
                    <p>
                        <button type="button" class="btn btn-info" onclick="myFunction('Room1')">Room 1</button>
                        <button type="button" class="btn btn-danger"  onclick="myFunction('Room2')">Room 2</button>
                        <button type="button" class="btn btn-info"  onclick="myFunction('Room3')">Room 3</button>
                        <button type="button" class="btn btn-danger"  onclick="myFunction('Room4')">Room 4</button>
                        <button type="button" class="btn btn-info"  onclick="myFunction('Room5')">Room 5</button>
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
                          <td>Monday</td> 
                          <td>Tuesday</td>
                          <td>Wednesday</td>
                          <td>Thursday</td>
                          <td>Friday</td>
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
                          <td>Monday</td> 
                          <td>Tuesday</td>
                          <td>Wednesday</td>
                          <td>Thursday</td>
                          <td>Friday</td>
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
                          <td>Monday</td> 
                          <td>Tuesday</td>
                          <td>Wednesday</td>
                          <td>Thursday</td>
                          <td>Friday</td>
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
                          <td>Monday</td> 
                          <td>Tuesday</td>
                          <td>Wednesday</td>
                          <td>Thursday</td>
                          <td>Friday</td>
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
                          <td>Monday</td> 
                          <td>Tuesday</td>
                          <td>Wednesday</td>
                          <td>Thursday</td>
                          <td>Friday</td>
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
                                    <h4 class="modal-title">Book</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>
                                    <p>Are you sure you want to book this room?????</p>
                                    <form action="index.php">
                                        
                                        <input type="submit" value="yes">
                                        <input type="submit" value="no">
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
            <!--footer-->
            <div class="row" id="footer">
            <footer class="container-fluid text-center">
              <p>Footer Text</p>
            </footer>
            </div>
        </div>
  </body>
</html>
