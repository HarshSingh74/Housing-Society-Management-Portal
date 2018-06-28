<?php
   include 'connect_oop.php';
   include 'session.php';
   $id=$_SESSION["id"];
   try {
        echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Your Id</th><th>Your Society ID</th><th>Role</th><th>Due Amount</th><th>Status</th><th>Complain</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
     try{
          $stmt = $dbh->prepare("SELECT id,sid,role,amount,status,complain FROM payments WHERE id='$id' AND sid='$society' AND role='$login_role'"); 
          $stmt->execute();
           $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
     } catch (Exception $ex) {
          echo "Error: " . $e->getMessage();
     }
              
    echo "<h2> <a href='user.php'>click here for Home page!</a></h2><br>";
    
    }
catch(PDOException $e)
    {
      echo "<br><h2>Please fill the form correctly<br>Entered username might be used</h2>";//$e->getMessage();
    }

$dbh = null;   
?>