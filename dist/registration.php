<?php
session_start();
include('connection.php');

if(isset($_POST['submit'])){
	$email = mysqli_real_escape_string($conn,$_POST['remail']);
	$username = mysqli_real_escape_string($conn,$_POST['uname']);
	$password = mysqli_real_escape_string($conn,$_POST['rpass']);
	$cpassword = mysqli_real_escape_string($conn,$_POST['rcpass']);

	
	$query = mysqli_query($conn,"select * from admins where username='$username'");
	$usecount=mysqli_num_rows($query);

	if($usecount>0){
		echo "<script type='text/javascript'>alert(' Username Exists');
		window.location='register.php';
</script>";
			
	}else{
	if($password=== $cpassword){
		$epass=md5($password);
		$insertquery = "insert into admins( email,username,password) values('$email','$username','$epass')";
		$query1=mysqli_query($conn,$insertquery);
		if($query1){
			?>
			<script type="text/javascript"> 
			alert("Registered!!"); location="admindex.php";
		</script>
				
			<?php
			// header('location:login.php');
		}else{
			?>
			<script type="text/javascript"> 
			alert("Not Registered"); 
				location="register.php";
		</script>
			
			<?php
			// header('location:register.php');
		}
		
}
	else{
		?>
			<script type="text/javascript"> 
			alert("Password Not Matched");
location="register.php";
			 </script>
			
			<?php
	//header('location:register.php');
	}
}
}