<html>
<head><title>Make Changes</title></head>
<body>
    <center>
        <hr> <a href='admin.php'>click here for HOME page!</a><hr>
          <center>
<h3><font color="blue">Change Details of the Workers shown in list at bottom of the page :-</font></h3><br>
 
                 <form action="ws.php" method="post">
                      
                    ID :-<input type="text" placeholder="Enter ID of the worker" name="id"><br><br>
        
                   Remuneration status :-<select name="stat">
                <option value="NOT PAID">NOT PAID</option>
                <option value="PAID">PAID</option>
                <option value="PARTIALLY PAID">PARTIALLY PAID</option>
                               </select><br><br>
                Amount Left To pay the worker:-<input type="text" placeholder="Enter society ID form List Below" name="amt"><br><br>               
                     
                     <input type="submit" value="Submit">
                 </form>
                 </center>      <hr>
              <h3><u>Workers of the Society :-</u></h3>
              <?php
                  include 'connect_oop.php';
                  include 'session.php';
                  echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Name</th><th>Role</th><th>Amount to be Paid</th><th>Status</th><th>Complain</th></tr>";

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
          $stmt = $dbh->prepare("SELECT members.id,name,payments.role,amount,status,complain FROM members,payments WHERE members.id=payments.id AND members.sid=payments.sid AND payments.sid='$society' AND payments.role='moderator'"); 
          $stmt->execute();
           $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
     } catch (Exception $ex) {
          echo "Error: " . $e->getMessage();
     }
              ?>
              <br>
              
              </body>
              
              </html>