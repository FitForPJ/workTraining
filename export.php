<?php
include "database/config.php";

if (isset($_GET['run'])) 

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen("customer.csv", "w");
    fputcsv($output, array('No.', 'Customer Name', 'Provider ID', 'Bandwidth', 'Date(Start)', 'Contract', 'IP Address1', 'IP Address2', 'IP Address3'));
    
    
    $query = mysqli_query($conn,"SELECT * FROM customer ");

    $field = mysqli_num_fields($query);

   
      

    while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
       // $i++;
        //fwrite($output, "\".$i.\",\".$result[0].\",\".$result[1].\",\".$result[2].\",\".$result[3].\",\".$result[4].\",\".$result[5].\",\".$result[6].\",\".$result[7].\",\".$result[8].\" \n");
        // for($i = 0; $i < $field; $i++) {
        //     $csv_export.= '"'.$row[mysqli_field_name($query,$i)].'",';
        //   }	
        //   $csv_export.= '
        // ';	
        fputcsv($output, $row);
         }
         fclose($output);  
    
?>