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
$first_name="";
$last_name="";
$staff_id="";
$postal_address="";
$phone="";
$email="";
$username="";
$password="";

if(isset($_POST['search']))
{
	$posts=array();
	$posts[0]=$_POST['first_name'];
	$posts[1]=$_POST['last_name'];
	$posts[2]=$_POST['staff_id'];
	$posts[3]=$_POST['postal_address'];
	$posts[4]=$_POST['phone'];
	$posts[5]=$_POST['email'];
	$posts[6]=$_POST['username'];
	$posts[7]=$_POST['password'];
	
	$p=$_REQUEST['search_pharmacist'];
	
	$searchquery="Select * from pharmacist where staff_id='$p'";

	$search_result=mysqli_query($con,$searchquery);
	if($search_result)
	{
		if(mysqli_num_rows($search_result))
		{
			while($row=mysqli_fetch_array($search_result))
			{
				
				$fname=$row['first_name'];
				$lname=$row['last_name'];
				$sid=$row['staff_id'];
				$postal=$row['postal_address'];
				$phone=$row['phone'];
				$email=$row['email'];
				$username=$row['username'];
				$pas=$row['password'];
			}
		}else{
			$message1="<center><font color=red>Data Not Found !!!</font></center>";
		}
	}else{
			$message1="<center><font color=red>Error, Try again</font></center>";
	}
	}
if(isset($_POST['submit'])=='submit'){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_POST['username'];
$pas=$_POST['password'];
 
$sql="UPDATE pharmacist SET first_name='$fname', last_name='$lname', staff_id='$sid',postal_address='$postal',phone='$phone',email='$email',username='$username', password='$pas' WHERE staff_id='$sid'";
mysqli_select_db('curavisi');
$retval = mysqli_query( $con ,$sql);

if(! $retval )
{
        die('Could not update data: ' . mysql_error());
		$message1="<center><font color=red>Update Failed, Try again</font></center>";
}else{
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_view_pharmacist.php");
}
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
<h1>Update Pharmacist</h1></div>
<div id="main">

<div class="grid_7">
				<br/><br/><br/><br/>
				     <div class="insert" >
		
		<center><form action="#" method="post" >
			<table width="220" height="106" border="0" >	
				
				<tr><td align="center"><input name="search_pharmacist" type="text" style="width:170px" placeholder="Search Pharmacist" id="Search Pharmacist" /></td></tr>
				<tr><td align="center"><input name="search" type="submit" value="Search"/></td></tr>
				
				
				<tr><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" value="<?php include_once('connect_db.php'); echo "$fname";?>" id="first_name" /></td></tr>
				<tr><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" id="last_name" value="<?php include_once('connect_db.php'); echo "$lname";?>" /></td></tr>
				<tr><td align="center"><input name="staff_id" type="text" style="width:170px" placeholder="Staff ID" id="staff_id" value="<?php include_once('connect_db.php'); echo "$sid"?>" /></td></tr>  
				<tr><td align="center"><input name="postal_address" type="text" style="width:170px" placeholder="Address" id="postal_address" value="<?php include_once('connect_db.php'); echo "$postal";?>" /></td></tr>  
				<tr><td align="center"><input name="phone" type="text" style="width:170px" placeholder="Phone" id="phone" value="<?php include_once('connect_db.php'); echo "$phone";?>" /></td></tr>  
				<tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" id="email"value="<?php include_once('connect_db.php'); echo "$email"?>" /></td></tr>   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" id="username"value="<?php include_once('connect_db.php'); echo "$username";?>" /></td></tr>
				<tr><td align="center"><input name="password" type="text" placeholder="Password" id="password"value="<?php include_once('connect_db.php'); echo "$pas"?>"type="password" style="width:170px"/></td></tr>
				<tr><td align="center"><input name="submit" type="submit" value="Update"/></td></tr>
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