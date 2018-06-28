<?php
        include "funds.php";
        include "connect_oop.php";
        include "session.php";
      try{
        $id=$_SESSION["id"];
        $d=$_POST['date'];
        $amt=$_POST['amt'];
        $role=$_SESSION["role"];
        /* $sql = "DELETE FROM payments WHERE id='$id' AND sid='$society'";

    // use exec() because no results are returned
    $dbh->exec($sql);*/
    $q = "UPDATE payments SET duedate='$d' WHERE sid='$society'";
     $stmt1 = $dbh->prepare($q);
$stmt1->execute();
    // execute the query
   
    // use exec() because no results are returned
      $q1 = "UPDATE payments SET amount='$amt' WHERE role='user' AND sid='$society'";
       $stmt2 = $dbh->prepare($q1);
$stmt2->execute();
    // execute the query
   
    // use exec() because no results are returned
      $q2 = "UPDATE payments SET status='NOT PAID' WHERE sid='$society'";
       $stmt = $dbh->prepare($q2);
      if($stmt->execute()){
    // execute the query
   
    // use exec() because no results are returned
   
          echo "<h2>Notice Declared Successfully</h2>";
         echo "<br><br><a href='admin.php'>click here for Home page!</a>";}
        // $sql = "UPDATE payments SET duedate='$d' AND amount='$amt' WHERE role='user' AND sid='$society'";
    // Prepare statement
    //$stmt = $dbh->prepare($sql);
    // execute the query
      }catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
        ?>