<?php include "khead.php" ?>

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
echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - " . $row["shortname"]. " ::Parent ID: " . $row["parentid"]. " .<br>";
$cat .=  "<option value=\"" .$row["id"] . "\">" . $row["name"] . "</option>";
}
} else {
echo "0 results";
}
$conn->close();
?>


<p> Start of Search</p>

<form action="ItemsByCategory.php" method="post">
<div>
<label for="q3">Category:</label>
<select id="q3" name="q3_cat">
<option value="none">Choose One</option>
<?=$cat?>
</select>
    </p>
    <input type="submit" value="Submit">
</div>
</form>




    <p> </p><br /> 
<?php include "kfoot.php" ?>