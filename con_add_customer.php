<?php
    include_once "database/config.php";
    echo "<meta charset='utf-8'>" ;	
    $name=$_REQUEST['name'];
    $cid_string = $_REQUEST['cid'];
	$cid=(int)$cid_string;
    $bandwidth_string = $_REQUEST['bandwidth'];
    $bandwidth = (int)$bandwidth_string;
	$start=$_REQUEST['start'];
    $contract =$_REQUEST['contract'];
    $pid = $_REQUEST['pid'];
    $ip1 = $_REQUEST['ip1'];
    $ip2 = $_REQUEST['ip2'];
    $ip3 = $_REQUEST['ip3'];

    if($pid == "UIH"){
        $pid_num = 1;
    }
    else if($pid =="Symphony"){
        $pid_num = 2;
    }
    else if($pid =="TOT"){
        $pid_num = 3;
    }
    else if($pid =="CAT"){
        $pid_num = 4;
    }
    else{
        $pid_num = 5;
    }
    //echo $name."/".$cid."/".$bandwidth."/".$start."/".$contract."/".$pid_num."/".$ip1."/".$ip2."/".$ip3;

    



    if($name != ""){
		$sql = "SELECT name FROM customer WHERE name='".$name."'";
		$result= $conn->query($sql);
		$rows=mysqli_num_rows($result);
         
       
		if($rows > 0){
			echo "<script>alert('ชื่อแพคเกจนี้มีอยู่ในระบบแล้ว กรุณาตั้งชื่อแพคเกจใหม่.')</script>";
			echo "<script>window.history.back()</script>";
		}else{
            $ins_sql = "INSERT INTO customer VALUE('".$name."','".$cid."','".$pid_num."','".$bandwidth."','".$start."','".$contract."','".$ip1."','".$ip2."','".$ip3."')";

            if ($conn->query($ins_sql) === TRUE) {
                echo "<script>alert('ทำการเพิ่มข้อมูลเข้าระบบเรียบร้อยแล้ว.')</script>";
                echo "<meta http-equiv='refresh' content='0;url=add_customer.php' />";
                exit;
            } else {
                echo "Error: " . $ins_sql . "<br>" . $conn->error;
            }
		}
	}
    
    $conn->close();



?>