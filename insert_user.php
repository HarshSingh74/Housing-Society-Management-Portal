<?php
   include 'connect_oop.php';
   include 'session.php';
   $name=$_POST["n"];
   $pass=$_POST["p"];
   $sid=$_POST["s"];
   $role=$_POST["r"];
   try {
    $sql = "INSERT INTO users
    VALUES(NULL,'$name','$pass','$role')";
    // use exec() because no results are returned
    $dbh->exec($sql);
    $s1="SELECT id,username,role FROM users WHERE username='$name' AND role='$role'";
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare($s1); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $v=$stmt->fetch(); 
    $a=$v['id'];
    $b=$v['username'];
    $c=$v['role'];
    
    $sql = "INSERT INTO members VALUES('$a','$b','$c','$sid')";
    $dbh->exec($sql);
    $ssql = "INSERT INTO payments VALUES('$a','$sid','$c',null,null,null,null)";
    $dbh->exec($ssql);
   /*if($c == "moderator")
   {
         $ssql = "INSERT INTO workers VALUES('$a','$b',null,'$sid')";
         $dbh->exec($ssql);
        }  */  
    echo "Request noted successfully ,  <a href='index.php'>click here for previous page!</a>";
    
    }
catch(PDOException $e)
    {
      echo "<br><h2>Please fill the form correctly<br>Entered username might be used</h2>";//$e->getMessage();
    }

$dbh = null;   
?>