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
if(isset($_POST['submit'])=='submit'){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['username'];
$pas=$_POST['password'];


$sql1="SELECT * FROM pharmacist WHERE username='$user'";

$result1=mysqli_query($con,$sql1)or die(mysqli_error());
 $result=mysqli_fetch_array($result1);
if($result>0){
$message1= "<font color=blue><center>sorry the username entered already exists</center></font>";
 }else{
	 
$sql="INSERT INTO pharmacist(first_name,last_name,staff_id,postal_address,phone,email,username,password,date)VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas',NOW())";
	 
$result2=mysqli_query($con,$sql);
if($result2>0)
{
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_view_pharmacist.php");
}
else{
$message= "<font color=red><center>Registration Failed, Try again</center></font>";
}
	}}
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
<h1>Insert Pharmacist</h1></div>
<div id="main">

<div class="grid_7">
				<br/><br/><br/><br/>
				     <div class="insert" >
		
		<center><form action="#" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" /></td></tr>
				<tr><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" /></td></tr>
				<tr><td align="center"><input name="staff_id" type="text" style="width:170px" placeholder="Staff ID" required="required" id="staff_id"/></td></tr>  
				<tr><td align="center"><input name="postal_address" type="text" style="width:170px" placeholder="Address" required="required" id="postal_address" /></td></tr>  
				<tr><td align="center"><input name="phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="phone" /></td></tr>  
				<tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" /></td></tr>   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr>
				<tr><td align="center"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form></center>
		<?php echo $message;
			  echo $message1;
		?>
</div>
</div>
</div>
<div id="footer" align="Center"> </div>
</body>
</html>