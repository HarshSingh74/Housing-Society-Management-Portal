<html>
    <head>
        <title>KrishAgni Round-2</title>
    </head>
<body>    

<center><h2>Housing Society Management Portal</h2></center>
<hr>
<link rel="stylesheet" href="style.css" type="text/css"/>
<form method="POST" action="">
<center><label>UserName:</label>
    <input type="text" name="username"/></center>
<center>
  <label>Password:</label>
  <input type="password" name="password"/></center>
  <center>
<input type="submit" name="submit" value="LogIn"/></center>
</form>
<center><a href="register.php">New to Society ? Register Here !</a></center>
<?php
session_start();
include("connect.php");
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
//Protect MySQL Injection
$username=stripcslashes($username);
$username=mysql_real_escape_string($username);
$username=htmlspecialchars($username);
$password=stripcslashes($password);
$password=mysql_real_escape_string($password);
$password=htmlspecialchars($password);
//Run Query to Database
$sql="SELECT*FROM users WHERE username='$username' AND password='$password'";
$result=mysql_query($sql);
//Counting Numbers of MySQL row [if user Found row must be 1]
$row=mysql_num_rows($result);
//Fetching User Informaiton from Database
$userinfo=mysql_fetch_assoc($result);
$role=$userinfo['role'];
if($row==1){
//Initilizing SESSION with Differents user Role
$_SESSION['login_user']=$username;
$_SESSION['role']=$role;
if($role=='admin'){
header('location:http://shubhamkale.webutu.com/round2/admin.php');
echo "<meta http-equiv='refresh' content='0;admin.php'>";
    
}
if($role=='user'){
header('location:http://shubhamkale.webutu.com/round2/user.php');
echo "<meta http-equiv='refresh' content='0;user.php'>";
}
if($role=='moderator'){
header('location:http://shubhamkale.webutu.com/round2/moderator.php');
echo "<meta http-equiv='refresh' content='0;moderator.php'>";

}
}else{
echo "No User Found by Given Information";
}
}
?>
<hr>
<center><h3>Use the following username and password combination for testing the portal</h3></center>
<center>
 <table class="col-md-6 col-md-offset-3" style="width:50%">
            <thead>
                <th>&nbsp;</th><th>Username</th><th>Password</th>
            </thead>
            <tbody>
                <tr><th>For Member</th><td>kumar</td><td>12345</td></tr>
                <tr><th>For Secretary</th><td>shubham</td><td>12345</td></tr>
                <tr><th>For Worker in Society</th><td>ramukaka</td><td>12345</td></tr>
            </tbody>
          </table></center><hr>
            <center> <h3><font color="red">Project By</font></h3>
                                
                                    <h4><a target="_blank" href="http://shubhamkale.webutu.com/p">Shubham S Kale</a></h4></center>
</body>
</html>