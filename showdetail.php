<?php

 include_once "database/config.php";


 
// get the q parameter from URL
if (isset($_GET['showdetail'])) {
  $cid = $_GET['cid'];
  $query = mysqli_query($conn,"SELECT * FROM customer WHERE cid='".$cid."'");

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
  

}


if (isset($_GET['preditdetail'])) {
  $return_arr = array();
  $cid = $_GET['cid'];
  $query = mysqli_query($conn,"SELECT * FROM customer WHERE cid='".$cid."'");

  while($result=mysqli_fetch_array($query,MYSQLI_NUM)){
    $return_arr[] = array("name" => $result[0],
    "cid" => $result[1],
    "bandwidth" => $result[3],
    "start" => $result[4],
    "contract" => $result[5],
    "pid" => $result[2],
    "ip1" => $result[6],
    "ip2" => $result[7],
    "ip3" => $result[8]);
  }
  echo json_encode($return_arr);
}


    
?>
