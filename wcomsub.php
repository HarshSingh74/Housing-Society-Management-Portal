<?php
   include 'connect_oop.php';
   include 'session.php';
   $id=$_SESSION["id"];
   $c=$_POST["c"];
   try {
       $q = "UPDATE payments SET complain='$c' WHERE id='$id' AND sid='$society'";
     $stmt1 = $dbh->prepare($q);
$stmt1->execute();
    echo "Complain Filed successfully ,<br><a href='moderator.php'>click here for Home page!</a>";
    
    }
catch(PDOException $e)
    {
      echo "<br><h2>Please fill the form correctly<br>Entered username might be used</h2>";//$e->getMessage();
    }

$dbh = null;   
?>