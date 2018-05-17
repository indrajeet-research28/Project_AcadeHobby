<?php
$db="curavisi";

error_reporting (1);
$con=mysqli_connect('localhost','root','')or die("cannot connect to server");
mysqli_select_db($con,$db)or die("cannot connect to database");


if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':

$sql="SELECT admin_id, admin_name FROM admin WHERE admin_name='$username' AND admin_pass='$password'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['admin_name']=$row[1];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_profile.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Pharmacist':
$result=mysql_query("SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['pharmacist_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Cashier':
$result=mysql_query("SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['cashier_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Manager':
$result=mysql_query("SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['manager_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
?>
