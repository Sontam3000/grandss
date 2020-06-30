<?php 
require_once "connection.php";

$id = $_GET['id'];

$sql = "delete from staffs where staff_id=$id";
$query = mysqli_query($conn,$sql);
?>
<script type="text/javascript"> 
			alert("Deleted Sucessfully!!"); location="staffs.php";
		</script>
				
			<?php
 ?>