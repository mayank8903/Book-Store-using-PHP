<?php 
require("mysqli_connect.php");

$query = "SELECT * FROM bookinventory";

$result = mysqli_query($dbc, $query);

if(!$result) {
    echo "Error: " . mysqli_error($dbc);
}

while($row = mysqli_fetch_array($result)) {
    echo "<p>{$row['book_name']}, {$row['book_price']}</p>";
    
}
?>