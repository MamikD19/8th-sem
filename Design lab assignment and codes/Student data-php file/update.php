<?php
	 $update_val="";
		if(isset($_GET['update']))
		$update_val = $_GET['update'];
	
	//echo $update_val;
	?>
	
	<?php
	if(isset($_REQUEST['up']))
	{
		$conn =mysqli_connect("localhost","root","","stdntdb");
		if(!$conn)
		{
			die("Not able to connect");
		}	
	  
		$strm=$_REQUEST['stream'];
		$name=$_REQUEST['name'];
		$gender=$_REQUEST['gender'];
		$dob=$_REQUEST['dob'];
		$address=$_REQUEST['address'];
		$eml=$_REQUEST['email'];
		$mob=$_REQUEST['no'];
		$tenthexam=$_REQUEST['tenthexam'];
		$tenthboard=$_REQUEST['tenthboard'];
		$tenthyear=$_REQUEST['tenthyear'];
		$tenthmarks=$_REQUEST['tenthmarks'];
		$twlvthexam=$_REQUEST['twlvthexam'];
		$twlvthboard=$_REQUEST['twlvthboard'];
		$twlvthyear=$_REQUEST['twlvthyear'];
		$twlvthmarks=$_REQUEST['twlvthmarks'];
	  
		if($strm!="" && $name!="" && $gender!="" && $dob!="" && $address!="" && $eml!="" && $mob!="" && $tenthexam!="" && $tenthboard!="" && $tenthyear!="" && $tenthmarks!="" && $twlvthexam!="" && $twlvthboard!="" && $twlvthyear!="" && $twlvthmarks!="")
		{
			
			$sql="update stdntdata set stream='$strm',name='$name',gender='$gender',dob='$dob',address='$address',email='$eml',phone='$mob',10examName='$tenthexam',10examBoard='$tenthboard',10examYear='$tenthyear',10examMarks='$tenthmarks',12examName='$twlvthexam',12examBoard='$twlvthboard',12examYear='$twlvthyear',12examMarks='$twlvthmarks' where uroll= '$update_val'";
			$rows=mysqli_query($conn,$sql);
			if(!$rows)
			{
				echo '<span style="color:#fff;font-size:25px;">Cannot Update Data!!</span>';
			}
			else
				echo '<span style="color:#fff;font-size:25px;">Data Updated Successfully!</span>';
	  }
	  else
		{
			echo '<span style="color:#fff;font-size:25px;text-align: center;">All Fields Required !!</span>';
		}
 }
  ?>
	
	
<html>
<head>
<title>upload profile</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Update Student Details</h1>
<form name=update method="post" action="">

<!--<p>Basic Information</p>
<a>University Roll No : <input type=text size=20 name="uroll" disabled value="<?php echo $update_val ?>"></a>
-->
<?php
$conn =mysqli_connect("localhost","root","","stdntdb");
if(!$conn)
	{
		die("Not able to connect");
	}
	if(isset($_REQUEST['update']))
	{
		//$urol=$_REQUEST['uroll'];
		
		if($update_val!="") 
		{
			$query="select * from stdntdata where uroll='$update_val'";
			$query_run=mysqli_query($conn,$query);
			
			while($row=mysqli_fetch_array($query_run))
			{
				?>
					<form action="" method="POST">
						<p>Student Details</p>
						<a>University Roll No : <input type=text name="uroll" disabled value="<?php echo $row['uroll']?>"></a>
						<a>Stream : <input list="stream" name="stream" value="<?php echo $row['stream']?>">
									<datalist id="stream">
								<option value="CSE">
								<option value="CS">
								<option value="ME">
								<option value="EE">
								<option value="ECE">
								</datalist></a>		 
						<a>Name : <input type=text name="name" value="<?php echo $row['name']?>"></a>
						<a>Gender : <input type=text name="gender" value="<?php echo $row['gender']?>"></a><br><br>
						<a>Date Of Birth : <input type=date name="dob" value="<?php echo $row['dob']?>"></a>
						<a>Present Address : <input type=text name="address" value="<?php echo $row['address']?>"></a>
						<a>Email id : <input type=email name="email" value="<?php echo $row['email']?>">
						<a>Mobile No : <input type=text name="no" value="<?php echo $row['phone']?>"></a>

						<br>

						<p>10th Standard</p>
						<a>Exam Name : <input type=text name="tenthexam" value="<?php echo $row['10examName']?>"></a>
						<a>Board/Council : <input type=text name="tenthboard" value="<?php echo $row['10examBoard']?>"></a>
						<a>Year Of Passing : <input type=text name="tenthyear" value="<?php echo $row['10examYear']?>"></a><br><br>
						<a>%Marks in Aggregate : <input type=text name="tenthmarks" value="<?php echo $row['10examMarks']?>"></a>

						<br>

						<p>12th Standard</p>
						<a>Exam Name : <input type=text name="twlvthexam" value="<?php echo $row['12examName']?>"></a>
						<a>Board/Council : <input type=text name="twlvthboard" value="<?php echo $row['12examBoard']?>"></a>
						<a>Year Of Passing : <input type=text name="twlvthyear" value="<?php echo $row['12examYear']?>"></a><br><br>
						<a>%Marks in Aggregate : <input type=text name="twlvthmarks" value="<?php echo $row['12examMarks']?>"></a>
						<div class="wrapper">
							<input type=submit name=up value=Update class="button">
							<a class="button" href="main.php">Go Home</a>
							<a class="button" href="search.php">Search Another</a><br>
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

</body>
</html>

