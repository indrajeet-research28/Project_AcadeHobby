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
<h1>View Pharmacist</h1></div>
<div id="main">

<div class="grid_7">
            <?php 
			include_once('connect_db.php');

			if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
  //we give the value of the starting row to 0 because nothing was found in URL
  $startrow = 0;
//otherwise we take the value from the URL
} else {
  $startrow = (int)$_GET['startrow'];
}
		
			$sql="select * from pharmacist LIMIT $startrow, 10";	
			$result=mysqli_query($con,$sql);

			$num_rows=mysqli_num_rows($result);
			if($num_rows>0)
			{
			echo "<table border=3 width=115%>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Staff Id</th>
					<th>Postal Address</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Username</th>
				</tr>";
			while($row=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>".$row['first_name']."</td>";
				echo "<td>".$row['last_name']."</td>";
				echo "<td>".$row['staff_id']."</td>";
				echo "<td>".$row['postal_address']."</td>";
				echo "<td>".$row['phone']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "</tr>";
			}	
			echo "</table>";
		}
		echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'"><p align=center>Next|</a>';

$prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">|Previous</a>';
	?>
</div>
</div>
<div id="footer" align="Center"> </div>
</body>
</html>