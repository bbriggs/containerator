<?php
require_once '../../includes/config.php'; // The mysql database connection script
  if(isset($_GET['task'])){
    $task = $_GET['task'];
    $status = "1";
    $created = time();
    $query="INSERT INTO beers (beer_name, style, og, fg, abv, srm, ibu, description, brewed_on, on_tap)
      VALUES ('$task',' American IPA','1.068','1.018','6.6','6', '68', 'The American IPA is a different soul from the reincarnated IPA style. More flavorful than the withering English IPA, color can range from very pale golden to reddish amber. Hops are typically American with a big herbal and / or citric character, bitterness is high as well. Moderate to medium bodied with a balancing malt backbone.', '2017-01-01', '$status')";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $result = $mysqli->affected_rows;
    echo $json_response = json_encode($result);
  }
?>
