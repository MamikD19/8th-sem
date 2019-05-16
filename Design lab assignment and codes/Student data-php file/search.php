<html>
<head>
<title>search profile</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Search Student</h1>
<form name=search method="post" action="">
 <a>University Roll No : <input type=text size=20 name="uroll" id="urol"></a>
 <input type=submit name=search value=Search class="button">
 
<br><br><br><br>
</form>
  
<?php
$conn =mysqli_connect("localhost","root","","stdntdb");
if(!$conn)
	{
		die("Not able to connect");
	}
	if(isset($_REQUEST['search']))
	{
		$urol=$_REQUEST['uroll'];
		
		if($urol!="") 
		{
			$query="select * from stdntdata where uroll='$urol'";
			$query_run=mysqli_query($conn,$query);
	
			while($row=mysqli_fetch_array($query_run))
			{
				?>
					<form action="" method="POST">
						<p>Student Details</p>
						<a>University Roll No : <input type=text name="uroll" disabled value="<?php echo $row['uroll']?>"></a>
						<a>Stream : <input type=text name="stream" disabled value="<?php echo $row['stream']?>"></a>		 
						<a>Name : <input type=text name="name" disabled value="<?php echo $row['name']?>"></a>
						<a>Gender : <input type=text name="gender" disabled value="<?php echo $row['gender']?>"></a><br><br>
						<a>Date Of Birth : <input type=text name="dob" disabled value="<?php echo $row['dob']?>"></a>
						<a>Present Address : <input type=text name="address" disabled value="<?php echo $row['address']?>"></a>
						<a>Email id : <input type=email name="email" disabled value="<?php echo $row['email']?>">
						<a>Mobile No : <input type=text name="no" disabled value="<?php echo $row['phone']?>"></a>

						<br>

						<p>10th Standard</p>
						<a>Exam Name : <input type=text name="tenthexam" disabled value="<?php echo $row['10examName']?>"></a>
						<a>Board/Council : <input type=text name="tenthboard" disabled value="<?php echo $row['10examBoard']?>"></a>
						<a>Year Of Passing : <input type=text name="tenthyear" disabled value="<?php echo $row['10examYear']?>"></a><br><br>
						<a>%Marks in Aggregate : <input type=text name="tenthmarks" disabled value="<?php echo $row['10examMarks']?>"></a>

						<br>

						<p>12th Standard</p>
						<a>Exam Name : <input type=text name="twlvthexam" disabled value="<?php echo $row['12examName']?>"></a>
						<a>Board/Council : <input type=text name="twlvthboard" disabled value="<?php echo $row['12examBoard']?>"></a>
						<a>Year Of Passing : <input type=text name="twlvthyear" disabled value="<?php echo $row['12examYear']?>"></a><br><br>
						<a>%Marks in Aggregate : <input type=text name="twlvthmarks" disabled value="<?php echo $row['12examMarks']?>"></a>
						<div class="wrapper">
							<a class="button" href="update.php?update=<?php echo $row['uroll'] ?>">Update Data</a>
							<a class="button" href="search.php?delete=<?php echo $row['uroll'] ?>" onclick="return confirm('Are You Sure You Want to Delete this?')">Delete</a><br><br>
						</div>
					</form>
				
				<?php
				
			}
		}
		else
		{
			echo '<span style="color:#fff;font-size:25px;text-align: center;">All Fields Required !!</span>';
		}
	}
		
	?>	
<div class="wrapper">
	<a href="main.php" class="button">Go Home</a>
</div>
</body>
</html>
 
<?php
	$conn =mysqli_connect("localhost","root","","stdntdb");
	if(!$conn)
	{
		die("Not able to connect");
	}
		
		$id="";
		if(isset($_GET['delete']))
		$id = $_GET['delete'];
	
			//echo $id;
		$query1="delete from stdntdata where uroll= '$id'";
		$run=mysqli_query($conn,$query1);
		if($run)
		{
			if(mysqli_affected_rows($conn)>0)
			{
				echo '<span style="color:#fff;font-size:25px;">Deleted successfully..!!</span>';
			}
			else
			{
				//echo "Sorry,Permission Denied";
			}
		}
		
?>