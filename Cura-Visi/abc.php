<?php 
		include_once('connect_db.php');

		
			$sql="select * from pharmacist";	
			$result=mysqli_query($con,$sql);

			$num_rows=mysqli_num_rows($result);
			if($num_rows>0)
			{
			echo "<table border=3>
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
		}
	?>