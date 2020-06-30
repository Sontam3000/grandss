<?php 
require_once "connection.php";

$id = $_GET['id'];

$sql = "delete from jobs where jobs_id=$id";
$query = mysqli_query($conn,$sql);
?>
<script type="text/javascript"> 
			alert("Deleted Sucessfully!!"); location="jobs.php";
		</script>
				
			<?php
 ?>