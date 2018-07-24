
<!DOCTYPE html>
<?php 


session_start();
if ($_SESSION['userlogin'] == '') {
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
    <link rel="stylesheet" type="text/css"  href="node_modules/bootstrap/dist/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   
    <link rel="stylesheet" type="text/css" href="css/mycss.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"  >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
</head>
<body>
   
    <div class="container-fluid h-100">
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
                            $num_pid = array(0, 0, 0, 0, 0);
                            $query = mysqli_query($conn, "SELECT name,provider_id FROM provider");
                            $query1 = mysqli_query($conn, "SELECT provider_id FROM customer");
                            $k = 0;
                            while ($result = mysqli_fetch_array($query, MYSQLI_NUM)) {

                                while ($result1 = mysqli_fetch_array($query1, MYSQLI_NUM)) {

                                    if ($result[1] == $result1[0])
                                        $num_pid[0]++; //UIH
                                    else if ($result[1] == $result1[0]) {
                                        $num_pid[1]++; //Symphony
                                    } else if ($result[1] == $result1[0]) {
                                        $num_pid[2]++; //TOT
                                    } else if ($result[1] == $result1[0]) {
                                        $num_pid[3]++; //3BB
                                    } else {
                                        $num_pid[4]++; //CAT
                                    }
                                    $j++;
                                }

                                echo "
                                      <div class=\" block-progress p-2\">  
                                        <div class=\"progress-bar status-provider d-block\" id=\"progress\">
                                            <strong>" . $result[0] . "</strong>
                                        </div>
                                        <div class=\" d-block p-2 border border-success\" >
                                            <strong>" . $num_pid[$k] . "   user</strong>
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
            $query = mysqli_query($conn, "SELECT name FROM provider");
            while ($result = mysqli_fetch_array($query, MYSQLI_NUM)) {
                $i++;
                echo " <li><a href=\"#\" title=\"\"><span>" . $result[0] . "</span></a></li>";
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
                        <!-- <label class="form-check-label" for="checkbox1" class="label-table"></label> -->
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
                $query = mysqli_query($conn, "SELECT * FROM customer");
                $i = 0;

                while ($result = mysqli_fetch_array($query, MYSQLI_NUM)) {
                    $i++;
                    echo "<tr>";
                    echo "<th scope=\"row\" class=\"  text-center  \" ><input  type=\"checkbox\" id=\"checkbox1\">
                        <label class=\"form-check-label\" for=\"checkbox1\" class=\"label-table\"></label></th>";
                    echo "<td class=\" text-center  \">$i</td>";
                    echo "<td class=\" text-center  \">" . $result[0] . "</td>";
                    echo "<td class=\" text-center  \">" . $result[1] . "</td>";
                    echo "<td class=\" text-center  \">" . $result[3] . "</td>";
                    echo "<td class=\" text-center  \">" . $result[4] . "</td>";
                    echo "<td class=\" text-center  \">" . $result[5] . "</td>";
                    echo "<td class=\" text-center  \">
                          
                    <a href=\"\" class=\"dt_edit\" data-toggle=\"modal\" ><i class=\"material-icons\">&#xE254;</i></a>
                            <a href=\"\"  class=\"dt_delete\" title=\"Delete\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE872;</i></a>
                        </td>";
                    echo "</tr>";
                }
                $conn->close();
                ?>
                
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
        <div class="my-auto bg-success  text-white"  id="txtHint">  
          
        </div>

         <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form_edit">
                        <div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" required  placeholder="Customer Name" value ="">
						</div>
                        <div class="form-group">
							<label>CID</label>
							<input type="text" name="cid" class="form-control" required placeholder="Customer CID" value ="">
						</div>
                        <div class="form-group">
							<label>Bandwidth</label>
							<input type="text" name="bandwidth" class="form-control" required placeholder="Bandwidth(Mbps)" value ="">
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="start"  class="form-control" required value ="">
						</div>
						<div class="form-group">
							<label>Contract</label>
							<input class="form-control" name="contract" required placeholder="Type Your Contract" value=""></input>
						</div>
                        <div class="form-group">
							<label>Provider ID</label></br>
                            <select  id="pid" class=" selectpicker w-100 p-2" name="pid" placeholder="Select Your Provider ID" >
                                    <option></option>
                                    <option>UIH</option>
                                    <option>Symphony</option>
                                    <option>3BB</option>
                                    <option>CAT</option>
                                    <option>TOT</option>
                            </select>
						</div>		
						<div class="form-group">
							<label>IP Address</label>
                            <input id="ip1" class="form-control" name="ip1" placeholder="Type Your First IP Address" value=""></input>
                            <input id="ip2" class="form-control" name="ip2" placeholder="Type Your Second IP Address" value=""></input>
                            <input id="ip3" class="form-control" name="ip3" placeholder="Type Your Third IP Address" value=""></input>
							
						</div>
                    </form>					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit_edit">Save changes</button>
                </div>
                </div>
            </div>
            </div>
        </div>       
      </section>

        
            </div>
            
        </div>
    <div>
<script src="node_modules/jquery/dist/jquery.min.js"></script>

<script src="node_modules/popper.js/dist/popper.js"></script>
<script src="node_modules/jquery-circle-progress/dist/circle-progress.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script>
  $('.status-provider').circleProgress({
    value: 1,
    size: 150,
    fill: {
      gradient: ["green", "black"]
    }
  });

$(document).ready(function() {
    $('#infotb').DataTable();
    var table = $('#infotb').DataTable();
    
    $('#infotb').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    

        $.ajax({
        url:'showdetail.php',
        type:'GET',
        data:{
            'showdetail':1,
            'cid': data[3],
        },
        success: function(response){
            document.getElementById("txtHint").innerHTML = response;
        }
        });

    } );

    $('#infotb tbody').on( 'click', 'a.dt_delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        
        $.ajax({
        url: 'updel.php',
        type: 'GET',
        data: {
            'delete': 1,
            'cid': data[3],
        },
        success: function(response){
           
           
            alert("delete item successful");
        }
        });
       
    } );

     $('#infotb tbody').on( 'click', 'a.dt_edit', function () {
        
        var data = table.row( $(this).parents('tr') ).data();

         $.ajax({
        url:'showdetail.php',
        type:'GET',
        data:{
            'preditdetail':1,
            'cid': data[3],
        },
        success: function(response){
             $("[name='name']").val(response[0]);
        }
        });




       
        
        
        $("#updateModal").modal();
        
       
       
        //         var id = edit_id;
        //     var name = $('#name').val();
        //     var comment = $('#comment').val();
        //     $.ajax({
        //     url: 'server.php',
        //     type: 'POST',
        //     data: {
        //         'update': 1,
        //         'id': id,
        //         'name': name,
        //         'comment': comment,
        //     },
        //     success: function(response){
        //         $('#name').val('');
        //         $('#comment').val('');
        //         $('#submit_btn').show();
        //         $('#update_btn').hide();
        //         $edit_comment.replaceWith(response);
        //     }
        //     });		
        // });
       
       
    } );

    $('')

} );




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