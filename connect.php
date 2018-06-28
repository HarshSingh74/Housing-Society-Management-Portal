<?php
$host="localhost";//Host Name
$username="id101859_root"; //MySQL username. root is Default.
$password="password"; //MySQL Password
$dbname="id101859_tutorial"; //Your Database Name
//Connecting To The Server
mysql_connect("$host","$username","$password")or die("Failed To Connect");
//Selecting Database
mysql_select_db("$dbname")or die("Failed to select database");
?>

