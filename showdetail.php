<?php

 include_once "database/config.php";


 
// get the q parameter from URL
if (isset($_GET['showdetail'])) {
  $cid = $_GET['cid'];
  $query = mysqli_query($conn,"SELECT * FROM customer WHERE cid='".$cid."'");

while($result=mysqli_fetch_array($query,MYSQLI_NUM)){
    $i++;
    echo 
    "<div class=\"card p-0 m-5\">
      <div class=\"card-body\">
        <div class=\"row \">
            <div class=\"col-md-12 text-center\">
                <h4>".$result[0]."</h4>
                <hr>
            </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-12\">
            <form  method=\"post\" id=\"form_show\">
                
                <div class=\"form-group row justify-content-center\">
                  <label class=\"col-2 col-form-label border border-success text-dark\">CID</label>
                  <div class=\"col-8\">
                    <input type=\"text\" name=\"cid\" class=\"form-control\"  value =\"$result[1]\" disabled>
                  </div>
                </div>
                <div class=\"form-group row justify-content-center \">
                  <label class=\"col-2 col-form-label border border-success text-dark\">Bandwidth</label>
                  <div class=\"col-8\">
                    <input type=\"text\" name=\"bandwidth\" class=\"form-control\" value =\"$result[3]\">
                  </div>
                </div>
                <div class=\"form-group row justify-content-center\">
                  <label class=\"col-2 col-form-label border border-success text-dark\">Date</label>
                  <div class=\"col-8\">
                    <input type=\"date\" name=\"start\"  class=\"form-control\" value =\"$result[4]\">
                  </div>
                </div>
                <div class=\"form-group row justify-content-center\">
                  <label class=\"col-2 col-form-label border border-success text-dark\">Contract</label>
                  <div class=\"col-8\">
                   <input class=\"form-control\" name=\"contract\"  value=\"$result[5]\"></input>
                   </div>
                </div>
              <div class=\"form-group row justify-content-center\">
                  <label class=\"col-2 col-form-label border border-success text-dark\">Provider ID</label>
                  <div class=\"col-8\">
                    <input class=\"form-control\" name=\"contract\"  value=\"$result[2]\"></input>
                  </div>
                </div>		
                <div class=\"form-group row justify-content-center\">
                  <label class=\"col-2 col-form-label border border-success text-dark\">IP Address</label>
                   <div class=\"col-8\">
                                <input id=\"ip1\" class=\"form-control\" name=\"ip1\"  value=\"$result[6]\"></input>
                                <input id=\"ip2\" class=\"form-control\" name=\"ip2\"  value=\"$result[7]\"></input>
                                <input id=\"ip3\" class=\"form-control\" name=\"ip3\"  value=\"$result[8]\"></input>
                    </div>
                </div>
            </form>					
          </div>
        </div> 
      </div>
    </div>";
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
