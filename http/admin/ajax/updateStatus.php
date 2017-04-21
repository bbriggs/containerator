<?php
  require_once '../../includes/config.php'; // The mysql database connection script
  if(isset($_GET['id'])){
    $on_tap = $_GET['on_tap'];
    $id = $_GET['id'];
    $query="update beers set on_tap='$on_tap' where id='$id'";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $result = $mysqli->affected_rows;
    $json_response = json_encode($result);
  }
?>
