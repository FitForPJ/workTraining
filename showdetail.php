<?php

 include_once "database/config.php";



// get the q parameter from URL
$q = $_REQUEST["variable"];

$hint = "";

// $sql = "SELECT name FROM provider WHERE name='".$name."'";
// 		$result= $conn->query($sql);
$query = mysqli_query($conn,"SELECT * FROM customer WHERE cid='".$q."'");



// Output "no suggestion" if no hint was found or output correct values 
while($result=mysqli_fetch_array($query,MYSQLI_NUM)){
    $i++;
   
      
       echo "<p>".$i."</p>";
       echo "<p>".$result[0]."</p>";
       echo "<p>".$result[1]."</p>";
       echo "<p>".$result[2]."</p>";
       echo "<p>".$result[3]."</p>";
       echo "<p>".$result[4]."</p>";
       echo "<p>".$result[5]."</p>";
       echo "<p>".$result[6]."</p>";
       echo "<p>".$result[7]."</p>";
       echo "<p>".$result[8]."</p>";
       
     }

     $conn->close();
    ?>
