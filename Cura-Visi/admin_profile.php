<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['admin_id'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['admin_name'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html");
exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Adminitration</title>
		<link rel="stylesheet" type="text/css" href="style/mystyle.css">
		<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
		<link href="one_source.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		</style>
	</head>
	
	<body>
		
		<div style="background-color:black;color:white;padding:15px;">
		<center><span id="heading">Cura-Visi</span></center>
		</div>
		<div>
		<ul>
			<li style="float:left"><a class="active" href="#login.html">Login</a></li>
			<li style="float:right"><a class="active" href="logout.php">Logout</a></li>
			
			<li><a href="admin_profile.php">Dashboard</a></li>
			<li><a href="#about.html">About</a></li>
			<li><a href="#registration.html">Registration</a></li>
			<li><a href="#contact.html">Contact Us</a></li>	
		</ul>
		</div>
		<div class="banner">
		<div id="content">
<div id="header">
<h1>Administration</h1></div>

<div id="main">
    
 <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="#admin.php" class="dashboard-module">
                	<img src="images/admin_icon.jpg" width="75" height="75" alt="edit" />
                	<span>Profile</span>
                </a>
                <a href="admin_pharm.php" class="dashboard-module">
                	<img src="images/pharmacist_icon.png"  width="75" height="75" alt="edit" />
                	<span>Pharmacist</span>
                </a>
                
                <a href="#admin_manager.php" class="dashboard-module">
                	<img src="images/user_patient_icon.png"  width="75" height="75" alt="edit" />
                	<span>User/Patient</span>
                </a>
                  
                <a href="#admin_cashier.php" class="dashboard-module">
                	<img src="images/doctor_icon.png" width="75" height="75" alt="edit" />
                	<span>Doctor</span>
                </a>
				
				<a href="logout.php" class="dashboard-module">
                	<img src="images/logout_icon.png" width="75" height="75" alt="edit" />
                	<span>Logout</span>
                </a>
			</div>
</div>

<div id="footer" align="Center"> </div>
</div>
		</div>
	</body>
</html>