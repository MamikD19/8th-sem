<?php
session_start();
error_reporting(0);
$userpro=$_SESSION['username'];
$conn =mysqli_connect("localhost","root","","stdntdb");
		if(!$conn)
		{
			die("Not able to connect");
		}
	
		$query="SELECT * FROM `login&reg` WHERE `email`='".$userpro."'";
		$query_run=mysqli_query($conn,$query);
			
			while($row=mysqli_fetch_array($query_run))
			{
				?>
					<center>
					<h1>Welcome</h1>
					<h2> <?php echo $_SESSION['username']?></h2>
					<form action="" method="post">
					<h2>Your Dashboard:</h2>
					<input type="text" name="name" value="<?php echo $row['name']?>"/><br>
					<input type="text" name="dob" value="<?php echo $row['dob']?>"/><br>
					<input type="text" name="phone" value="<?php echo $row['phone']?>"/><br>
					<input type="text" name="password" value="<?php echo $row['password']?>"/>
					</form>
					<a href="logout.php">Log Out</a>
					</center>
				<?php
			}
	//echo "Welcome ".$_SESSION['username'];
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Dashboard</title>
</head>
<body>

</body>
</html>