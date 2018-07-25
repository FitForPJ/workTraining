<?php 
    include_once "database/config.php";


    if (isset($_GET['delete'])) {
        $cid = $_GET['cid'];
        $sql = "DELETE FROM customer WHERE cid=" . $cid;
        mysqli_query($conn, $sql);
        exit();
    }

    if (isset($_POST['update'])) {
       
        $name = $_POST['name'];
        $cid_string = $_POST['cid'];
        $cid=(int)$cid_string;
        $bandwidth_string = $_POST['bandwidth'];
        $bandwidth = (int)$bandwidth_string;
        $start = $_POST['start'];
        $contract = $_POST['contract'];
        $pid = $_POST['pid'];
        if($pid == "UIH")
            $pid_id = 1;
        else if($pid == "Symphony")
            $pid_id = 2;
        else if($pid == "TOT")
            $pid_id = 3;
        else if($pid == "CAT")
            $pid_id = 4;
        else{
            $pid_id = 5;
        }

        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
       
        $sql = "UPDATE customer SET name='$name', cid='$cid'
                , provider_id='$pid_id', bandwidth='$bandwidth'
                , start_date='$start', contract='$contract'
                , ip_address1='$ip1', ip_address2='$ip2'
                , ip_address3='$ip3' WHERE cid=".$cid;
        if ($result = mysqli_query($conn, $sql)) {
          
           
          echo "Edit Successful";
          
        }else {
          echo "Error: ". mysqli_error($conn);
        }
        exit();
    }
  


?>