
<!DOCTYPE html>
<?php 
   

    session_start();
	if($_SESSION['userlogin'] == ''){
		echo "<meta http-equiv='refresh' content='0;url=login.php' />";
		exit(0);
    } 
    
    include_once "database/config.php";
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   
    <link rel="stylesheet" type="text/css" href="css/mycss.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"  >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
   
    <div class="container-fluid">
        <div class="row ">
            <div class="col-2 text-center bg-success d-flex flex-column p-0">
               <nav class="navbar justify-content-center text-center text-white">
                  <a>
                  IslandTeachnology
                  </a>
               </nav>
               <nav class="navigation">
                  <ul class="mainmenu">
                    <li><a href="">Home</a></li> 
                    <li><a href="" class="disabled" >Customer</a>
                      <ul class="submenu">
                        <li><a href="#Customer">All</a></li>
                        <li><a href="add_customer.php">Add Customer</a></li>
                        <li><a href="add_provider.php">Add Provider</a></li>
                        <li><a href="">Edit/Delete</a></li>
                      </ul>
                    </li>  
                    <li><a href="">Export</a></li> 
                    <li><a href="logout.php">Sign Out</a></li> 
                  </ul>
                 
               </nav>
          </div>

            <div class="col-10 container-fluid p-0">
              
            <section  id="Home">
                        <div class="steps steps-5 text-center">
                            <?php
                                $num_pid = array(0,0,0,0,0); 
                                 $query = mysqli_query($conn,"SELECT name,provider_id FROM provider");
                                 $query1 = mysqli_query($conn,"SELECT provider_id FROM customer");
                                 $k=0;
                                 while($result=mysqli_fetch_array($query,MYSQLI_NUM)){
                                 
                                    while($result1=mysqli_fetch_array($query1,MYSQLI_NUM)){
                                       
                                        if($result[1] == $result1[0])
                                            $num_pid[0]++; //UIH
                                        else if($result[1]==$result1[0]){
                                            $num_pid[1]++; //Symphony
                                        }
                                        else if($result[1]==$result1[0]){
                                            $num_pid[2]++; //TOT
                                        }
                                        else if($result[1]==$result1[0]){
                                            $num_pid[3]++; //3BB
                                        }
                                        else{
                                            $num_pid[4]++; //CAT
                                        }
                                         $j++; 
                                    }
                                   
                                    echo "
                                      <div class=\" block-progress p-2\">  
                                        <div class=\"progress-bar status-provider d-block\" id=\"progress\">
                                            <strong>".$result[0]."</strong>
                                        </div>
                                        <div class=\" d-block p-2 border border-success\" >
                                            <strong>".$num_pid[$k]."   user</strong>
                                        </div>
                                      </div>
                                     ";
                                      
                                 $k++;
                                 }
                            ?>
                           
                        </div>
             </section>

      <section class="p-0 p-lg-3 " id="Customer">
        <ul class="steps steps-5 text-center ">
          <li class="current"><a href="#" title=""><span>ALL</span></a></li>
          <?php 
            $query = mysqli_query($conn,"SELECT name FROM provider");
            while($result=mysqli_fetch_array($query,MYSQLI_NUM)){
                $i++;
            echo " <li><a href=\"#\" title=\"\"><span>".$result[0]."</span></a></li>";
            }
          ?>
        
        </ul>

        <!--Table-->
        
<!--Top Table UI-->

<div class="card card-cascade narrower border border-success">

<!--Card image-->
<div class="view view-cascade gradient-card-header blue-gradient narrower py-2  mb-3 d-flex justify-content-center align-items-center bg-success w-100">

    <a  class="white-text mx-3">Information</a>

</div>
<!--/Card image-->

<div class="px-4 ">

    
        <!--Table-->
        <table class="table table-hover mb-0 border border-success" id="infotb" cellspacing="0" >

            <!--Table head-->
            <thead>
                <tr>
                    <th>
                        <input class="checkAll" type="checkbox" id="checkbox">
                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                    <th class="th-lg"><a>No. </a></th>
                    <th class="th-lg"><a >Customer Name</a></th>
                    <th class="th-lg"><a >CID</a></th>
                    <th class="th-lg"><a >Bandwidth</a></th>
                    <th class="th-lg"><a >Start(date)</a></th>
                    <th class="th-lg"><a >Contract</a></th>
                    <th class="th-lg"><a >Actions</a></th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
              <?php
                $query=mysqli_query($conn,"SELECT * FROM customer");
                $i=0;

                while($result=mysqli_fetch_array($query,MYSQLI_NUM)){
                 $i++;
                 echo "<tr>";
                     echo "<th scope=\"row\" class=\" pl-3\" ><input  type=\"checkbox\" id=\"checkbox1\">
                        <label class=\"form-check-label\" for=\"checkbox1\" class=\"label-table\"></label></th>";
                    echo "<td>$i</td>";
                    echo "<td>".$result[0]."</td>";
                    echo "<td>".$result[1]."</td>";
                    echo "<td>".$result[3]."</td>";
                    echo "<td>".$result[4]."</td>";
                    echo "<td>".$result[5]."</td>";
                    echo "<td>
                            <a href=\"#\" class=\"edit\" title=\"Edit\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE254;</i></a>
                            <a href=\"#\" onclick=\"javascript:myFunc()\" class=\"delete\" title=\"Delete\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE872;</i></a>
                        </td>";
                    echo "</tr>";
                  }
                  $conn->close();
                ?>
                <tr>
                    <th scope="row">
                        <input  type="checkbox" id="checkbox2">
                        <label class="form-check-label" for="checkbox2" class="label-table"></label>
                    </th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="checkbox" id="checkbox3">
                        <label class="form-check-label" for="checkbox3" class="label-table"></label>
                    </th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">
                        <input  type="checkbox" id="checkbox4">
                        <label class="form-check-label" for="checkbox4" class="label-table"></label>
                    </th>
                    <td>Paul</td>
                    <td>Topolski</td>
                    <td>@P_Topolski</td>
                    <td>Paul</td>
                    <td>Topolski</td>
                    <td>@P_Topolski</td>
                </tr>
                <tr>
                    <th scope="row">
                        <input  type="checkbox" id="checkbox5">
                        <label class="form-check-label" for="checkbox5" class="label-table"></label>
                    </th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
            <!--Table body-->
        </table>
        <!--Table-->
    </div>

    

    <!--Bottom Table UI-->
    
    <!--Bottom Table UI-->


</div>  
        
      </section>

      <section class=" p-1 p-lg-3 d-flex flex-column" id="education">
        <div class="my-auto bg-white border border-success text-success"  id="txtHint">  
          
        </div>
      </section>

    
     

            </div>
            
        </div>
    <div>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="myscript.js"></script>
<script>
  $('.status-provider').circleProgress({
    value: 1,
    size: 150,
    fill: {
      gradient: ["green", "black"]
    }
  });

   

  var table = $('#infotb').DataTable();
 
$('#infotb').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
   
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "showdetail.php?variable=" + data[3], true);
        xmlhttp.send();

   
} );

function DeleteCustomer(cid) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}






$(document).ready(function() {
    $('#infotb').DataTable();
} );

// var table = $('#infotb').DataTable();
 
//  $('#infotb').on( 'click', 'tr', function () {
//      var id = table.row( $(this).parents('th') ).data();
  
//      alert( 'Clicked row id '+id );
//  } );
// var table = $('#infotb').DataTable();
// table.rows().eq(0).each( function ( index ) {
//     var row = table.row( index );
 
//     var data = row.data();
//     alert( ''+data[1] );
//     // ... do something with data(), or row.node(), etc
// } );



$(document).ready(function () {
  $('.checkAll').on('click', function () {
    $(this).closest('table').find('tbody :checkbox')
      .prop('checked', this.checked)
      .closest('tr').toggleClass('selected', this.checked);
  });

  $('tbody :checkbox').on('click', function () {
    $(this).closest('tr').toggleClass('selected', this.checked); //Classe de seleção na row
  
    $(this).closest('table').find('.checkAll').prop('checked', ($(this).closest('table').find('tbody :checkbox:checked').length == $(this).closest('table').find('tbody :checkbox').length)); //Tira / coloca a seleção no .checkAll
  });
});  
</script>
    
</body>

</html>