<?php
  if(isset($_REQUEST['submit']))
  {
		$conn =mysqli_connect("localhost","root","","stdntdb");
		if(!$conn)
		{
			die("Not able to connect");
		}
		
		$name=$_REQUEST['name'];
		$dob=$_REQUEST['dob'];
		$eml=$_REQUEST['email'];
		$mob=$_REQUEST['phone'];
		$conpwd=$_REQUEST['conpwd'];
		
		if($name!="" && $eml!="" && $dob!="" && $mob!="" && $conpwd!="")
		{
			$sql="INSERT INTO `login&reg`(`name`, `email`, `dob`, `phone`, `password`) VALUES ('".$name."', '".$eml."', '".$dob."', '".$mob."', '".$conpwd."')";
			$rows=mysqli_query($conn,$sql);
			if($rows==0)
			{
				echo '<span style="color:#ff0000;font-size:25px;">Cannot Upload Data!!</span>';
			}
			
			else
			{
				header('location:login.php');
			}
		}
		else
		{
			echo '<span style="color:#ff0000;font-size:25px;text-align: center;">All Fields Required !!</span>';
		}
 }
 
?>

<html>
<head>
<title>Sign up</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<form method="post" action="">
<h1>Registration Pannel</h1>
<input type="text" name="name" placeholder="enter fullname"><br>
<input type="email" name="email" placeholder="enter email"><br>
<input type="date" name="dob"/><br>
<input type="text" name="phone" placeholder="enter phone no"/><br>
<input id="password" type="password" name="password" placeholder="enter password" onkeyup='check();' /><br>
<input id="conpwd" type="password" name="conpwd" placeholder="re-enter password" onkeyup='check();' />
<span id='message'></span><br>
<input type="submit" name="submit" value="Register">
			<br>
			<a href="login.php">Already have an account? click here to login</a>
</form>
</center>
<script>
	var check = function()
	{
		if(document.getElementById('password').value == document.getElementById('conpwd').value)
		{
			document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = 'Matched';
		}
		else
		{
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Not matched';
		}
	}
</script>
</body>
</html>