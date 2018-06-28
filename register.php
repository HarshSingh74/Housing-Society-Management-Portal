<html>
<head><title>Registration</title></head>
<body>
    <center>
<h3><font color="blue">Register for a Society</font></h3><br>
       <hr>
                 <form action="insert_user.php" method="post">
                      
                    Name:-<input type="text" placeholder="It will be username also!" name="n"><br><br>
                Password:-<input type="text" placeholder="Enter a secure password" name="p"><br><br>
          Society Number:-<input type="text" placeholder="Enter society ID form List Below" name="s"><br><br>
          <br><h4>Choose role as "user" if you are member of the society & "moderator" if you are a worker in the society</h4><br>
                   Role :-<select name="r">
                <option value="user">user</option>
                <option value="moderator">moderator</option>                 
                               </select>
                     
                     <input type="submit" value="Submit">
                 </form>
                 </center>
                <hr><br>
              <h3><u>Societies Available on the Portal :-</u></h3>
              <?php
                  include 'connect_oop.php';
                  echo "<table style='border: solid 1px black;'>";
echo "<tr><th>SId</th><th>Name</th><th>No. of Shops</th><th>No. of Flats</th><th>No. of Workers</th><th>Address</th></tr>";

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
          $stmt = $dbh->prepare("SELECT * FROM society"); 
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