<?php include "khead.php" ?>

<?php
// Load configuration as an array. Use the actual location of your configuration file
$config = parse_ini_file('config.ini'); 

// Try and connect to the database
$link= mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

// If connection was not successful, handle the error
if($link=== false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
}




// Escape user inputs for security

$cat_id = mysqli_real_escape_string($link, $_POST['q3_cat']); 



$sql = "SELECT * from events where cat_id = '$cat_id' limit 20";
// attempt insert query execution

$result = $link->query($sql);
echo "<p><table class='search' width='100%' CELLPADDING='0' CELLSPACING='0'>\n";
echo "<tr class='search'><th>Event ID</th><th>Name</th><th>Image</th><th>Description</th><th>Postcode</th><th>Website</th><th>Start Date</th><th>End Date</th>\n";
$count = 0;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
if ($count == "1") {
$count = 0;
} else {
$count = 1;
}
echo "<tr id='row" . $count . "'><td class='search' align='center'>" . $row["event_id"] . "</td><td class='search'>" . $row["name"] . "</td><td class='search' align='center'><a href='" . $row["image"] . "'><img src='" . $row["thumb_image"] . "'></a></td><td class='search'>" . $row["description"] . "</td><td class='search'>" . $row["postcode"] . "</td><td class='search'>"  . $row["website"] . "</td><td class='search'>" . $row["start_date"] . "</td><td class='search'>" . $row["end_date"] . "</td></tr>\n";
}
} else {
echo "<tr id='row" . $count . "'><td class='search' colspan='7' align='center'>0 results</td></tr>\n";
}
echo "</table>";

 
// close connection
mysqli_close($link);
?>
<?php include "kfoot.php" ?>