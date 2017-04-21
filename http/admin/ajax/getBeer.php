<?php
require_once '../../includes/config.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['on_tap'])){
  $status = $_GET['on_tap'];
}
$query="SELECT id, beer_name, description, on_tap, ibu, og, fg, srm, abv FROM beers";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>
