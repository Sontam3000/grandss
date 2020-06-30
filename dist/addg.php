<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');

include('connection.php');
if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$date = mysqli_real_escape_string($conn,$_POST['date']);
	$description = mysqli_real_escape_string($conn,$_POST['description']);
	$img_tmp = $_FILES['img']['tmp_name'];
    $img = $_FILES['img']['name'];
    $img_type = $_FILES['img']['type'];
    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

    if(in_array($img_type, $allowed_type)) {
        $path = 'upload/gallery/'.$img; 
    } else {
        $error[] = 'File type not allowed';
    }

	
	$query = mysqli_query($conn,"select * from gallerys where name='$name' and description='$description' ");
	$usecount=mysqli_num_rows($query);	
	if($usecount>0){
		echo "<script type='text/javascript'>alert(' Image Already Exist');
		window.location='addg.php';
</script>";
}else{
	

	$insertquery = "insert into gallerys( name,image,date,description) values('$name','$path','$date','$description')";
	move_uploaded_file($img_tmp, $path);
		$query1=mysqli_query($conn,$insertquery);
		if($query1){
			?>
			<script type="text/javascript"> 
			alert("Added!!"); 
            location="gallery.php";
		</script>
				
			<?php
			
		}else{
			?>
			<script type="text/javascript"> 
			alert("Not Added"); 
				location="addg.php";
		</script>
			
			<?php
			
		}	
}}	
?>
<li class="breadcrumb-item active">Add To Gallery</li></ol>
<!--form reg-->
 <div class="container" style="margin-top: 0px;">
                        <div class="row ">
                            <div class="col-md-9">
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header"><h3 class=" font-weight-light my-4">Add Image</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype='multipart/form-data'>
                                            
                                             <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="name">Name</label><input class="form-control py-4" id="name" name="name" type="text" placeholder="Enter Name" required=""></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="date">Date</label><input class="form-control py-4" id="date" name="date" type="datetime-local" placeholder="Enter date"></div>
                                                </div>                                             
                                            </div>
                                           
                                            <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="img">Image </label><input class="form-control "  id="img" name="img" type="file" required=""></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="description">Description</label><input class="form-control py-4" id="description" name="description" type="text" placeholder="Enter description" required=""></div>
                                                </div>                                             
                                            </div>
                                            
                                            <div class="form-group mt-4 mb-0 col-md-2">
                                                <input name="submit" value="Submit" id="submit" type="submit" class="btn btn-success btn-block"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<?php
include('footer.php');
?>