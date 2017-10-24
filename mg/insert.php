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
$name = mysqli_real_escape_string($link, $_POST['name']);
$desc = mysqli_real_escape_string($link, $_POST['description']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$postcode = mysqli_real_escape_string($link, $_POST['postcode']); 
$cat_id = mysqli_real_escape_string($link, $_POST['q3_cat']); 
$start_date = mysqli_real_escape_string($link, $_POST['startdate']); 
$end_date = mysqli_real_escape_string($link, $_POST['enddate']); 
$website = mysqli_real_escape_string($link, $_POST['website']); 
$address = mysqli_real_escape_string($link, $_POST['address']); 

// attempt insert query execution
$sql = "INSERT INTO events(name, description, email, postcode, address, start_date, end_date, website, cat_id) VALUES ('$name', '$desc', '$email',  '$postcode', '$address', '$start_date', '$end_date', '$website', '$cat_id')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>