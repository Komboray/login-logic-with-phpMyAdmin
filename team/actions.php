<?php
//import the contents of the other page
include("connect.php");

$name = "john";
$pass = "toto";
//insert into table_name(col1, col2) values(val1, val2)
$sql = "INSERT INTO credentials (name, password) VALUES('$name','$pass')";
$result = mysqli_query($conn, $sql);

?>