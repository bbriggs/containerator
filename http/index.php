<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Containerator - Tap List</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Containerator</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="admin/index.html">Admin</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?php
      //////////////////////////////////////
      //Gerenating the taplist containers
      //////////////////////////////////////
      //array for header colors
      $color = array("green", "purple", "orange", "red", "blue");
      $last_color = "brown";
      //MySqli Select Query, grab all 'on_tap' beers and print the containers for each
      $results = $mysqli->query("SELECT id, beer_name, description, on_tap, ibu, og, fg, srm, abv FROM beers WHERE on_tap = 1");
      while($row = $results->fetch_assoc()) {
        //hacky method to randomize the header colors
        $rand_keys = array_rand($color, 2);
        $new_color = $color[$rand_keys[0]];
        if($new_color == $last_color){
          $new_color = $color[$rand_keys[1]];
        }
        $last_color = $new_color;
            print '<div class="container-fluid">';
                print '<div class="row">';
                    print '<div class="col-md-12">';
                        print '<div class="card card-beer">';
                            // setting color to the srm card, not sure I really like this.  Maybe come up with something else
                            print '<div class="card-header" srm-background-color="'.$new_color.'">';
                              // paint srm color over pint mask
                              print '<div class="srm-indicator srm'.$row["srm"].'" ></div>';
                              //pint glass outline
                              print '<div class="srm-stroke"></div>';
                            print '</div>';
                            print '<div class="description">';
                              //beer name and details
                              print '<div class="title">'.$row["beer_name"].'<ul><li>OG: '.$row["og"].' </li><li> FG: '.$row["fg"].' </li><li> SRM: '.$row["srm"].' </li><li> ABV: '.$row["abv"].'%</li><li> IBU: '.$row["ibu"];
                                //print 1 - 3 hop images for the severity of ibu 1= low 3= max
                                $hopCount = (int)$row["ibu"] / 100;
                                $hopCount = $hopCount / .3;
                                for ($i = 0; $i < $hopCount; $i++) { echo ' <img src= "img/hop.png"/>'; }
                                print '</li></ul> </div>';
                              print '<div class="divider"></div>';
                              // beer description
                              print '<div class="sub-title">'.$row["description"].'</div>';
                            print '</div>';
                        print '</div>';
                    print '</div>';
                print '</div>';
            print '</div>';
        }
        // Frees the memory associated with a result
        $results->free();
        // close connection
        $mysqli->close();
        //////////////////////////////////////
        //End the taplist containers
        //////////////////////////////////////
      ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
