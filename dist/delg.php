<?php 
require_once "connection.php";

$id = $_GET['id'];

$sql = "delete from gallerys where gallery_id=$id";
$query = mysqli_query($conn,$sql);
?>
<script type="text/javascript"> 
			alert("Deleted Sucessfully!!"); location="gallery.php";
		</script>
				
			<?php
 ?>