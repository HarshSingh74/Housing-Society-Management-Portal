<?php
   // define database related variables
   $database = 'id101859_tutorial';
   $host = 'localhost';
   $user = 'id101859_root';
   $pass = 'password';

   // try to conncet to database
   $dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);
   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(!$dbh){

      echo "unable to connect to database";
   }
   
?>