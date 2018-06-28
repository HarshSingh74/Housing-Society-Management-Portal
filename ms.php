<?php
   include 'connect_oop.php';
   include 'session.php';
   $id=$_POST["id"];
   $stat=$_POST["stat"];
   $amt=$_POST["amt"];
   try {
       $q = "UPDATE payments SET amount='$amt',status='$stat' WHERE id='$id' AND sid='$society'";
     $stmt1 = $dbh->prepare($q);
$stmt1->execute();
    echo "Record Updated successfully ,  <a href='memberstat.php'>click here for previous page!</a><br><a href='admin.php'>click here for Home page!</a>";
    
    }
catch(PDOException $e)
    {
      echo "<br><h2>Please fill the form correctly<br>Entered username might be used</h2>";//$e->getMessage();
    }

$dbh = null;   
?>