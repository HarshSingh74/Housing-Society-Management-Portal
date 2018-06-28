<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
include("session.php");
//Redirect to Admin page
if($login_role=='admin'){
header('location:admin.php');
}
//Redirect To Moderator Page
if($login_role=='moderator'){
header('location:moderator.php');
}
?>
        <h1>Welcome To Portal Society Member !</h1><?php echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");?><br>
<link rel="stylesheet" href="style.css" type="text/css"/>

   <div id="profile">
       <h2>User name is: <?php echo $login_session;?> and Your Role is :<?php echo $login_role;?><br>Society ID is : <?php echo $society;?></h2>
         <ul class="nav navbar-nav navbar-right">
            
            <li><a href="paystat.php">Check Your Maintence Payment Status</a></li>
            <li><a href="complain.php">File a Complain !</a></li>
            
            
          </ul>
<div id="logout">
    <a href="logout.php">Click here to Logout</a>
</div></div>
    </body>
</html>
