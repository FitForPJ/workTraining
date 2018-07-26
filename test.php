<?php 

include "database/config.php";
$query1 = mysqli_query($conn, "SELECT provider_id FROM customer");

while ($result1 = mysqli_fetch_array($query1, MYSQLI_NUM)) {
    echo $result1[0];
    echo gettype($result1[0]);
}

$query = mysqli_query($conn, "SELECT name,provider_id FROM provider");
while ($result = mysqli_fetch_array($query, MYSQLI_NUM)) {
    echo $result[1];
    echo gettype($result[1]);
}
?>