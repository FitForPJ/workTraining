<?php 
include "database/config.php";

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
