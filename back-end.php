<!DOCTYPE html>
<html>
<head>
    <title>The Chengdu Bus Company (CBC)</title>
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
$dbuser="384b42c3dfd9";
$dbpass="72362cd8cff8bd36";
$dbname="l5k2c";

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
$query  = "SELECT id, c_id, s_id, b_id, t_id, m_id, star, end, date, cusidno, pay "; 
$query .= "FROM back ";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("query is wrong");
}

?>

<html>
    <head>
        <title>CBC back-end management</title>
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
                      <th>The backend ID</th>
                      <th>Customer ID</th>
                      <th>Employee ID</th>
                      <th>Bus ID</th>
                      <th>Ticket ID</th>
                      <th>Meal ID</th>
                      <th>Bus departure</th>
                      <th>Bus destination</th>  
                      <th>Departure date</th>
                      <th>Customer identity card</th>
                      <th>Payment</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                     <?php

// 3. use/show data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["c_id"] . "</td>";
    echo "<td>" . $row["s_id"] . "</td>";
    echo "<td>" . $row["b_id"] . "</td>";
    echo "<td>" . $row["t_id"] . "</td>";
    echo "<td>" . $row["m_id"] . "</td>";
    echo "<td>" . $row["star"] . "</td>";
    echo "<td>" . $row["end"] . "</td>";
    echo "<td>" . $row["date"] . "</td>";
     echo "<td>" . $row["payment"] . "</td>";
    echo "<td><a href='upb.php?id="  .$row["id"] . "'>Update Information</a></td>";  
    echo "<td><a href='deb.php?id="  .$row["id"]  ."'>Delete Information</a></td>";
    echo "</tr>";
}        
            
?>            
                    
       
                </table>
 <a href="ab.php">Add a new!</a>           
              

<?php

// 4. free results
mysqli_free_result($result);

// 5. close db connection
mysqli_close($connection);

?>