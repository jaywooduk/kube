<? include "khead.php" ?>

<?php
// Load configuration as an array. Use the actual location of your configuration file
$config = parse_ini_file('config.ini'); 

// Try and connect to the database
$conn = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

// If connection was not successful, handle the error
if($conn === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
}


$sql = "SELECT id, name, shortname, parentid FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$cat .=  "<option value=\"" .$row["id"] . "\">" . $row["name"] . "</option>";
}
} else {
echo "0 results";
}
$conn->close();


?>


<p> Start of Form</p>

<form action="insert.php" method="post">
    <p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
    </p>
<p>

<div>
<label for="q3">Category:</label>
<select id="q3" name="q3_cat">
<option value="none">Choose One</option>
<?=$cat?>
</select>
</p>

    <p>
        <label for="postcode">Post Code:</label>
        <input type="text" name="postcode" id="postcode">
    </p>
    <p>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
    </p>
    <p>
        <label for="website">Website:</label>
        <input type="text" name="website" id="website">
    </p>
    <p>
        <label for="startdate">Start Date (if any):</label>
        <input type="text" name="startdate" id="startdate">
    </p>
    <p>
        <label for="enddate">End Date (if any):</label>
        <input type="text" name="enddate" id="enddate">
    </p>
    <input type="submit" value="Submit">
</form>





    <p> </p><br /> 
<?php include "kfoot.php" ?>