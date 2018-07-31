<?PHP
  include "database/config.php";
  $query = mysqli_query($conn, "SELECT * FROM customer");
 $data = array();
while ($result = mysqli_fetch_array($query, MYSQLI_NUM)) {
    
    $data1 = array("name" => $result[0], "cid" => $result[1], "provider_id" => $result[2], "bandwidth" => $result[3], "start_date" => $result[4], "contract" => $result[5], "ip_address1" => $result[6], "ip_address2" => $result[7], "ip_address3" => $result[8]);
  
    array_push($data, $data1);
}



  $colnames = array(
    'name' => "Customer name",
    'cid' => "CID",
    'provider_id' => "Provider ID",
    'bandwidth' => "Bandwidth",
    'start_date' => "Date",
    'contract' => "Contract",
    'ip_address1' => "IP Address1",
    'ip_address2' => "IP Address2",
    'ip_address3' => "IP Address3",
  );

  function map_colnames($input)
  {
    global $colnames;
    return isset($colnames[$input]) ? $colnames[$input] : $input;
  }
  function cleanData(&$str)
  {
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
      $str = "'$str";
    }
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  

  // filename for download
  $filename = "website_data_.csv";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv");

  $out = fopen("php://output", 'w');

  $flag = false;
  foreach($data as $row) {
    if(!$flag) {  
      // display field/column names as first row
      $firstline = array_map( "map_colnames", array_keys($row));
      fputcsv($out, $firstline, ',', '"');
      $flag = true;
    }
    array_walk($row,  "cleanData");
    fputcsv($out, array_values($row), ',', '"');
  }

  fclose($out);
  exit;
?>