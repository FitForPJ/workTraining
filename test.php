<<<<<<< HEAD
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
=======
<?php

include "database/config.php";
 $query = mysqli_query($conn, "SELECT name,provider_id FROM provider");
 $result = mysqli_fetch_array($query, MYSQLI_NUM);
 

 $query1 = mysqli_query($conn, "SELECT provider_id FROM customer");
 while ($result1 = mysqli_fetch_array($query1, MYSQLI_NUM)) {
         $id =(int) $result1[0];    
            echo gettype($id);
               echo $id = $result1[0];
         }
?>

>>>>>>> b7c0f0d483be2d70163caaf7e8de674a6979e34e
