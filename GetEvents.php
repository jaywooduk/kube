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


$sql = "SELECT * from events LIMIT 300";
// attempt insert query execution

$result = $link->query($sql);

 //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

 
// close connection

mysqli_close($link);
?>
