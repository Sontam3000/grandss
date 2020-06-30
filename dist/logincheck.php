<?php

include('connection.php');

$db = mysqli_select_db($conn,'grands');
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$epass = md5($password);
 	if(empty($username) || empty($password)){
?>
			<script type="text/javascript"> 
			alert("Fill All The Field!!"); location="login.php";
		</script>
				
			<?php
 }
 else{

	$sql = "select * from admins where username='$username' and password='$epass' or password='$password'";
	$query = mysqli_query($conn,$sql);
	if(mysqli_num_rows($query)>0){
		while($row = mysqli_fetch_assoc($query)){
			$username = $row["username"];
			session_start();
			echo "login successfull";
			$_SESSION['username']=$username;
		}
			header('location:admindex.php');
		}
		else{
			echo"login failed";
			header('location:login.php');
		}
	
}}
?>
