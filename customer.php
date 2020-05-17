<?php

//$pagelevel = 1;

//require_once('includes/logincheck.php');
require_once('includes/db.php');
//require ('worker.html');

// 2. Do a query
$query  = "SELECT id, name, gender, idno "; 
$query .= "FROM customer ";

//echo $query;

$result = mysqli_query($connection, $query);

if (!$result) {
    die("query is wrong");
}

//require_once('includes/header.php');

?>

<html>
    

    <body>

 <table width="80%" border="double" cellpadding="10" cellspacing="10" align="center" border = "10">
     <tr>
         <td><h4>ID</h4></td>
         <td><h4>Name</h4></td>
         <td><h4>Gender</h4></td>
         <td><h4>ID card NO.</h4></td>
         <td><h4>Delete</h4></td>
         <td><h4>Update</h4></td>
     </tr>
     
<?php

// 3. use/show data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["gender"] . "</td>";
    echo "<td>" . $row["idno"] . "</td>";
    
    echo "<td><a href='decus.php?id=" . 
        $row["id"] . "'>Delete</a></td>";    
    echo "<td><a href='upcus.php?id=" . 
        $row["id"] . "'>Update</a></td>";

    echo "</tr>";
}
    
?>
  </table>
    
        <a href="addcus.php">
        <input name = "Add" type="button" value="Add" style="margin-left:140px;margin-top:20px"; >
        </a>
        
        
    </body>
</html>   
    
<?php

// 4. free results
mysqli_free_result($result);

// 5. close db connection
mysqli_close($connection);

require_once('includes/footer.php');

?>
