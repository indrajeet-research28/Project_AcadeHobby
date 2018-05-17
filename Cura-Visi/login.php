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
$message="<center><font color=white>Invalid login Try Again</font></center>";
}
break;
case 'Pharmacist':
$sql="SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['pharmacist_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist_profile.php");
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

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link href="one_source.css" rel="stylesheet" type="text/css">

		<style type="text/css">


		</style>
	</head>

	<body action="#" method="#" >
		<div style="background-color:black;color:white;padding:15px;">
		<center><span id="heading">Cura-Visi</span></center>
		</div>
		<div>
		<ul>
			<li style="float:left"><a class="active" href="login.php">Login</a></li>
			<li style="float:right"><a class="active" href="#cura-visi">Cura-Visi</a></li>

			<li><a href="index.html">Home</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="registration.html">Registration</a></li>
			<li><a href="contact.html">Contact Us</a></li>
		</ul>
		</div>
		<div class="banner">
		</br></br></br></br></br>
		<div id="main">

  <section class="container" align="Center">

     <div class="login">
	 <p align="center"><img src="images/login_ad.png" style="width:230px;height:80px;"></p>

      <form method="post" action="#">

		<p align="center"><input type="text" name="username" value="" placeholder="Username" required></p>
        <p align="center"><input type="password" name="password" value="" placeholder="Password" required></p>
		<p align="center"><select name="position">
		<option>--Select position--</option>
			<option>Admin</option>
			<option>Pharmacist</option>
			<option>User</option>
			<option>Doctor</option>
			</select></p>
        <p align="center"><input type="submit" name="submit" value="Login">
		<input type="Reset" name="reset" value="Reset"></p>

      </form>
		<?php
		echo $message;
		?>
    </div>
    </section>
</div>

	</body>
</html>