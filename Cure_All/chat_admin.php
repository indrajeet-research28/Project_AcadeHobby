<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?>Cure All</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<link rel='stylesheet' href='cb.css'>
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}

</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/header_title.png"></a></h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Pharmacist</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="chat_admin.php">Let's Talk</a></li>		
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
    
 <!-- Dashboard icons -->
      <div id="container">
	<div id="chatResults">
	</div>

		<div id="chat">
			UserName :<input type="text" id="author" name="author" style="height: 30px; width:250px;"><br><br>
			Message  :&nbsp;&nbsp;&nbsp;<textarea id="text" name="text" style="height: 180px; width:250px;" ></textarea><br><br>
			<center><input type="submit" value="Talk!" id="submitter"></center>
		</div>
</div>
<script type="text/javascript" src="jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="cb.js"></script>

		</div>

</div>
<div id="footer" align="Center"> Cure-All@Copyright All Rights Reserved</div>
</div>
</body>
</html>
