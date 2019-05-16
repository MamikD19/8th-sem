<?php
session_start();

$conn =mysqli_connect("localhost","root","","stdntdb");
	if(!$conn)
	{
		die("Not able to connect");
	}
	
	if(isset($_POST['reset']))
	{
		$eml=$_POST['mail'];
			
		$query="SELECT * FROM `login&reg` WHERE `email`='".$eml."'";
		$query_run=mysqli_query($conn,$query);
		
		$row=mysqli_fetch_array($query_run);
		
		$password=$row['password'];
	
		$to =(string)$eml;
		$pass=(string)$password;
		$subject = "Forget Password";
		$message = "your username is: ".$to."\n"."Your password: ".$pass;
		$headers = 'FRom: hackers.hack.555@gmail.com';
			
		if(mail($to, $subject, $message, $headers))
		{
			echo "A mail has been send to ".$to;
		}
		else
		{
			echo "Can not send mail";
		}
	}
?>


<html>
<head>
<title>Reset Password</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<form method="post" action="">
		<h1>Reset Password</h1>
		
			<input type="email" name="mail" placeholder="example@example.com"><br>
			<input type="submit" name="reset" value="Send">
			<br>
			<a href="login.php">Login Here</a>
</form>
</center>
</body>
</html>