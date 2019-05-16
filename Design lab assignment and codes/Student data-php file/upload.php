	<?php
  if(isset($_REQUEST['upload']))
  {
		$conn =mysqli_connect("localhost","root","","stdntdb");
		if(!$conn)
		{
			die("Not able to connect");
		}
			
		$urol=$_REQUEST['uroll'];
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
	  
		if($urol!="" && $strm!="" && $name!="" && $gender!="" && $dob!="" && $address!="" && $eml!="" && $mob!="" && $tenthexam!="" && $tenthboard!="" && $tenthyear!="" && $tenthmarks!="" && $twlvthexam!="" && $twlvthboard!="" && $twlvthyear!="" && $twlvthmarks!="")
		{
			
			$sql="insert into stdntdata values('$urol','$strm','$name','$gender','$dob','$address','$eml','$mob','$tenthexam','$tenthboard','$tenthyear','$tenthmarks','$twlvthexam','$twlvthboard','$twlvthyear','$twlvthmarks')";
			$rows=mysqli_query($conn,$sql);
			if($rows==0)
			{
				echo '<span style="color:#fff;font-size:25px;">Cannot Upload Data!!</span>';
			}
			
			else
				echo '<span style="color:#fff;font-size:25px;">Data Uploaded Successfully!</span>';
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
<h1>Add Student Details</h1>
<form name=upload method="post" action="">

<p>Basic Information</p>
<a>University Roll No : <input type=text size=20 name="uroll"></a>
<a>Stream : <input list="stream" name="stream">
                 <datalist id="stream">
				 <option value="CSE">
				 <option value="CS">
				 <option value="ME">
				 <option value="EE">
				 <option value="ECE">
				 </datalist></a>		 
<a>Name : <input type=text size=20 name="name"></a>
<a>Gender : <input type="radio" name="gender" value="male" checked> Male
	<input type="radio" name="gender" value="female"> Female</a><br><br>
<a>Date Of Birth : <input type="date" name="dob"></a>
<a>Present Address : <input type=text size=30 name="address"></a>
<a>Email id : <input type=email size=20 name="email"></a>
<a>Mobile No : <input type=text size=10 name="no"></a>

<br>

<p>10th Standard</p>
<a>Exam Name : <input type=text size=15 name="tenthexam"></a>
<a>Board/Council : <input type=text size=20 name="tenthboard"></a>
<a>Year Of Passing : <input type=text size=4 name="tenthyear"></a><br><br>
<a>%Marks in Aggregate : <input type=text size=5 name="tenthmarks"></a>

<br>

<p>12th Standard</p>
<a>Exam Name : <input type=text size=15 name="twlvthexam"></a>
<a>Board/Council : <input type=text size=20 name="twlvthboard"></a>
<a>Year Of Passing : <input type=text size=4 name="twlvthyear"></a><br><br>
<a>%Marks in Aggregate : <input type=text size=5 name="twlvthmarks"></a>
<br><br><br>
   <div class="wrapper">
   <input type=submit name=upload value=Upload class="button">
	<input type="reset" class="button">
	<a href="main.php" class="button">Go Home</a>
	</div>
</form>
</body>
</html>