<?php 
require_once "connection.php";

if(isset($_POST['deletedata'])){
$id = $_GET['delete_id'];

$sql = "delete from admins where admin_id=$id";
$query = mysqli_query($conn,$sql);
?>
<script type="text/javascript"> 
			alert("Deleted Sucessfully!!"); location="accounts.php";
		</script>
	

				
			<?php
		}else{
 ?>
 <script type="text/javascript"> 
			alert("Not Deleted !!"); location="accounts.php";
		</script>
		<?php } ?>