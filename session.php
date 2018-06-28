<?php
include("connect.php");
session_start();
$user_check=$_SESSION['login_user'];
$sql="SELECT * FROM users WHERE username='$user_check'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$_SESSION["name"]=$row['username'];
$_SESSION["id"]=$row['id'];
$login_session=$_SESSION["name"];
$_SESSION["role"]=$row['role'];
$login_role=$_SESSION["role"];
$sql="SELECT members.sid FROM users,members WHERE username='$user_check' AND users.id=members.id";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$_SESSION["sid"]=$row['sid'];
$society=$_SESSION["sid"];
if(!isset($login_session)){
mysql_close;
header('location:index.php');
}
?>