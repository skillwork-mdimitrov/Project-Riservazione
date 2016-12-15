<!DOCTYPE html> <!-- so the browsers can use the latest rendering standards. -->
<html lang="en"> <!-- useful for search engines and screen readers -->
    <head>
        <meta charset="UTF-8"/> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- to support IE 9, IE 8 -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- render the width of the page at the width of its own screen, So if that 
        screen is 320px wide, the browser window will be 320px wide -->
        <link rel="stylesheet" type="text/css" href="CSS/indexCSS.css"> <!-- reference to the CSS stylesheet -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- Justification of this is needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- Justification of this is needed -->
        <link rel="icon" href="Images/favicon.ico"/> <!-- the icon will be displayed in the browser tabs -->
        <title>HomePage</title>
    </head>
    <body>
        <div class="fluid-container"> <!-- WRAPPER. The bootstrap grid used below requires such container. 
        The xs(phone), sm(tablets), md(desktop) and lg(lager desktop) grids(Example: class="col-sm-3 col-xs-3") 
        will all "stack" vertically on screens/viewports less than 768 pixels. 
        This is where the xs grid fits in. Columns that use the col-xs-* classes will not stack vertically and continue to scale down on the smallest screens. -->
            
        <!--Navigation bar-->
        <div id="nav-bar-container" class="row">
            <div class="col-sm-3 col-xs-3"><img src="Images/Logo3.png" class="img-responsive" alt="logo"></div>
            <div class="col-sm-5 col-xs-5"><p>nothing</p></div>
            
            <div class="signupLogin col-sm-2 col-xs-2">
                <!--button-->
                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#signUp">Sign Up</button>
                <!--thing that pops up-->
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
                <!--end of thing that pops up-->
            </div>
            
            <div class="signupLogin col-sm-2 col-xs-2">
                <!--button-->
                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#logIn">LogIn</button>
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
        <!-- Navigation bar END -->
        <!--nav bar but for the room-->
        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <p>
                    <button type="button" class="btn btn-primary">Room 1</button>
                    <button type="button" class="btn btn-info">Room 2</button>
                    <button type="button" class="btn btn-warning">Room 3</button>
                    <button type="button" class="btn btn-danger">Room 4</button>
                    <button type="button" class="btn btn-success">Room 5</button>
                </p>
            </div>
            <div class="col-sm-4 col-xs-4"><p>nothing</p></div>
            <div class="week col-sm-4 col-xs-4">
                <p>
                    <button type="button" class="btn btn-primary"><--</button>
                        week
                    <button type="button" class="btn btn-primary">--></button>
                </p>
            </div>
        </div>

        <!--table 1-->
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table style="width:100%">
                    <tr>
                      <th>Room name</th>
                      <th>Monday</th> 
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
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
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 2-->
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table style="width:100%">
                    <tr>
                      <th>Room name</th>
                      <th>Monday</th> 
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
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
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 3-->
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table style="width:100%">
                    <tr>
                      <th>Room name</th>
                      <th>Monday</th> 
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
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
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 4-->
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table style="width:100%">
                    <tr>
                      <th>Room name</th>
                      <th>Monday</th> 
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
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
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 5-->
        <div class="row">
            <div class="RoomName col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table style="width:100%">
                    <tr>
                      <th>Room name</th>
                      <th>Monday</th> 
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
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
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>


        <!--footer-->
        <div class="row">
        <footer class="container-fluid text-center">
          <p>Footer Text</p>
        </footer>
        </div>
        </div>
        
        <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
  </body>
</html>
