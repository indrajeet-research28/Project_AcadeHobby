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
<h1>Manage Pharmacist</h1></div>
<div id="main">

<div class="grid_7">
            	<a href="admin_insert_pharmacist.php" class="dashboard-module">
                	<img src="images/insert_icon.png" width="75" height="75" alt="edit" />
                	<span>Insert Pharmacist</span>
                </a>
                <a href="admin_view_pharmacist.php" class="dashboard-module">
                	<img src="images/view_icon.png"  width="75" height="75" alt="edit" />
                	<span>View Pharmacist</span>
                </a>
                
                <a href="admin_update_pharmacist.php" class="dashboard-module">
                	<img src="images/update_icon.png"  width="75" height="75" alt="edit" />
                	<span>Update Staff</span>
                </a>
                  
                <a href="admin_delete_pharmacist.php" class="dashboard-module">
                	<img src="images/delete_icon.png" width="75" height="75" alt="edit" />
                	<span>Delete Staff</span>
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