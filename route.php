<!DOCTYPE html>
<html>
<head>
    <title>Hospital Inpatient Department</title>
<style type="text/css">
html {
    
		background: url("https://tse1-mm.cn.bing.net/th/id/OIP.LL01ok_-21bZZ7WZ-yjlFAHaDt?w=300&h=150&c=7&o=5&dpr=1.57&pid=1.7") no-repeat center center fixed;
		-webkit-background-size:cover;
		-moz-background-size:cover;
		-o-background-size:cover;
		background-size: cover;
		}
ul
{
list-style-type:none;
margin:0;
padding:0;
overflow:hidden;
}
li
{
float:left;
}
a:link,a:visited
{
display:block;
width:200px;
font-weight:bold;
color:#000000;
background-color:#bebebe;
text-align:center;
padding:20px;
text-decoration:none;
text-transform:uppercase;
background:rgba(255,255,0,0.01);
}
a:hover,a:active
{
background-color:#cc0000;
}

</style>
</head>


    
</html>


<?php

// 1. Open database connection
$dbhost="localhost";
$dbuser="feng-weilu";
$dbpass="dszxdz00";
$dbname="2201713130131";

//connection to the database
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

//Test if connection is ok
if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")" 
    );
}

// 2. Do a query
$query  = "SELECT line, time, stop, atime, price, star, end "; 
$query .= "FROM route ";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("query is wrong");
}

?>

<html>
    <head>
        <title>Route</title>
        <link type="text/css" rel="stylesheet" >
        <style>
            .hello tr:hover {
        background-color:gainsboro;
            }
        
        </style>
    </head>
    
    <body>
<table width="80%" border="double" cellpadding="2" cellspacing="1" align="center" class="hello">
                  <thead>
                    <tr>
                      <th>Line no.</th>
                      <th>Departure time</th>
                      <th>Stop along the way</th>
                      <th>Arrival time</th>
                      <th>Ticket Price</th>
                      <th>Departure Station</th>
                      <th>Terminus</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                     <?php

// 3. use/show data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["line"] . "</td>";
    echo "<td>" . $row["time"] . "</td>";
    echo "<td>" . $row["stop"] . "</td>";
    echo "<td>" . $row["atime"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["star"] . "</td>";
    echo "<td>" . $row["end"] . "</td>";
    echo "<td><a href='upr.php?id="  .$row["id"] . "'>Update Information</a></td>";  
    echo "<td><a href='der.php?id="  .$row["id"]  ."'>Delete Information</a></td>";
    echo "</tr>";
}        
            
?>            
                    
       
                </table>
 <a href="addr.php">Add a new route!</a>           
              

<?php

// 4. free results
mysqli_free_result($result);

// 5. close db connection
mysqli_close($connection);

?>