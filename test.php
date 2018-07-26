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

