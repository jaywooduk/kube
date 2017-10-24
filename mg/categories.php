<?php include "khead.php" ?>

<?php
// Load configuration as an array. Use the actual location of your configuration file
$config = parse_ini_file('config.ini'); 

// Try and connect to the database
$conn = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
$articles= mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

// If connection was not successful, handle the error
if($conn === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
}


$sql = "SELECT cat.id, cat.name, cat.shortname, cat.parentid, COALESCE(c, 0) as ARTCount 
FROM categories cat
  LEFT JOIN (SELECT cat_id, count(*) c

  FROM events

  GROUP BY cat_id) ev 
ON ev.cat_id = cat.id;";
$result = $conn->query($sql);
echo "<p><table class='search' width='100%' CELLPADDING='0' CELLSPACING='0'>";
echo "<tr class='search'><th>Category ID</th><th>Name</th><th>Short Name</th><th>Parent Category</th><th>Number of Articles</th></tr>";


if ($result->num_rows > 0) {
// output data of each row
$count = 0;
while($row = $result->fetch_assoc()) {

if ($count == "1") {
$count = 0;
} else {
$count = 1;
}


echo "<tr id='row" . $count . "'><td class='search' align='center'>" . $row["id"] . "</td><td class='search'>" . $row["name"] . "</td><td class='search'>" . $row["shortname"] . "</td><td class='search' align='center'>"  . $row["parentid"] . "</td><td class='search' align='center'>" . $row["ARTCount"] . "</td></tr>\n";


}
} else {
echo "0 results";
}
$conn->close();
?>


    <p> </p><br /> 
<?php include "kfoot.php" ?>