<!DOCTYPE html> <!-- so the browsers can use the latest rendering standards. -->
<html lang="en"> <!-- useful for search engines and screen readers -->
    <head>
        <meta charset="UTF-8"/> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- to support IE 9 or IE 8 -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- render the width of the page at the width of its own screen, So if that screen
        is 320px wide, the browser window will be 320px wide -->
        <link rel="stylesheet" type="text/css" href="CSS/indexCSS.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- Justification of this is needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- Justification of this is needed -->
        <title>HomePage</title>
        
        <style>
        div 
        {
            border-bottom: 1px solid;
            border-top: 1px solid;
            border-left: 1px solid;
            border-right: 1px solid;
        }
        
        .row{
            background-color: gray;
        }
        
        #signupLogin{
            display: inline-block;
        }
        </style>
        
    </head>
    <body>
        <div class="fluid-container"> <!-- bootstrap grid (which is used below) requires a container class. 
        The xs(phone), sm(tablets), md(desktop) and lg(lager destop) grids(Ex class="col-sm-3 col-xs-3") 
        will all "stack" vertically on screens/viewports less than 768 pixels. 
        This is where the xs grid fits in. Columns that use the col-xs-* classes will not stack vertically 
        and continue to scale down on the smallest screens. -->
        <!--nav bar-->
        <div class="row">
            <div class="col-sm-3 col-xs-3"><p>HOme</p></div>
            <div class="col-sm-5 col-xs-5"><p>nothing</p></div>
            
            <div id="signupLogin" class="col-sm-2 col-xs-2">
                
                
                <h2>Sign up</h2>
                

            </div>
            
            <div id="signupLogin" class="col-sm-2 col-xs-2">
                
                
                
                <h2>Log In</h2>

            </div>
            
        </div>
        <!--nav bar but for the room-->
        <div class="row">
            <div class="col-sm-4 col-xs-4"><p>room</p></div>
            <div class="col-sm-4 col-xs-4"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>week</p></div>
        </div>

        <!--table 1-->
        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>table</p></div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 2-->
        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>table</p></div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 3-->
        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>table</p></div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 4-->
        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>table</p></div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-xs-8"><p>nothing</p></div>
            <div class="col-sm-4 col-xs-4"><p>booking</p></div>
        </div>

        <!--table 5-->
        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>Room name</p></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12"><p>table</p></div>
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
  </body>
</html>