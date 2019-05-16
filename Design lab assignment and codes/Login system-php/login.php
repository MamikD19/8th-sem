<?php
session_start();
  if(isset($_POST['submit']))
  {
		$conn =mysqli_connect("localhost","root","","stdntdb");
		if(!$conn)
		{
			die("Not able to connect");
		}
		
		$user=$_POST['user'];
		$pass=$_POST['pwd'];
		
		$sql="select `email`,`password` from `login&reg` where email='".$user."' && password='".$pass."'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result))
		{
			$_SESSION['username']=$user;
			header('location:home.php');
		}
		else
			echo '<span style="color:#ff0000;font-size:25px;">There is no record!!</span>';
  }

?>
<html>
<head>
<title>Sign in</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<form method="post" action="">
		<h1>Login Section</h1>
		
			<input type="text" name="user" placeholder="Enter username here"><br>
			<input type="password" name="pwd" placeholder="Enter password here"><br>
			<input type="submit" name="submit" value="Login">
			<br>
			<a href="signup.php">Click here to SignUp</a>
			<a href="forget.php">Forget Password</a>
			
			

</form>
</center>
</body>
</html>