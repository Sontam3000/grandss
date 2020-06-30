<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');

include('connection.php');
if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$post = mysqli_real_escape_string($conn,$_POST['post']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$acontact = $_POST['acontact'];
	$img_tmp = $_FILES['img']['tmp_name'];
    $img = $_FILES['img']['name'];
    $img_type = $_FILES['img']['type'];
    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

    if(in_array($img_type, $allowed_type)) {
        $path = 'upload/'.$img; 
    } else {
        $error[] = 'File type not allowed';
    }

	
	$query = mysqli_query($conn,"select * from staffs where name='$name' and post='$post' ");
	$usecount=mysqli_num_rows($query);	
	if($usecount>0){
		echo "<script type='text/javascript'>alert(' Staff Already Exist');
		window.location='addstaff.php';
</script>";
}else{
	
    if($acontact==0){
        $insertquery = "insert into staffs( name,image,post,email,contact) values('$name','$path','$post','$email','$contact')";
    }else{
	$insertquery = "insert into staffs( name,image,post,email,contact,contact_no) values('$name','$path','$post','$email','$contact',$acontact)";
}
	move_uploaded_file($img_tmp, $path);
		$query1=mysqli_query($conn,$insertquery);
		if($query1){
			?>
			<script type="text/javascript"> 
			alert("Added!!"); location="staffs.php";
		</script>
				
			<?php
			
		}else{
			?>
			<script type="text/javascript"> 
			alert("Not Added"); 
				location="addstaff.php";
		</script>
			
			<?php
			
		}	
}}	



?>
 <li class="breadcrumb-item active">Add Staffs</li></ol>
<!--form reg-->
 <div class="container" style="margin-top: 0px;">
                        <div class="row ">
                            <div class="col-md-9">
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header"><h3 class=" font-weight-light my-4">Add Staffs</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype='multipart/form-data'>
                                            
                                             <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="name">Name</label><input class="form-control py-4" id="name" name="name" type="text" placeholder="Enter Name" required=""></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="post">Post</label><input class="form-control py-4" id="post" name="post" type="text" placeholder="Enter Post" required=""></div>
                                                </div>                                             
                                           
                                           
                                                <div class="col-md-6 pl-3">
                                                    <div class="form-group"><label class="small mb-1" for="email">Email</label><input class="form-control py-4" id="email" name="email" type="email" placeholder="Enter Email" required=""></div>
                                         </div></div>
                                             <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="contact">Contact</label><input class="form-control py-4" id="contact" name="contact" type="tel" placeholder="Enter Contact" required=""></div>
                                                </div>                                             
                                            
                                            <div class="col-md-6 pl-3">
                                                    <div class="form-group"><label class="small mb-1" for="acontact">Another Contact</label><input class="form-control py-4" id="acontact" name="acontact"  type="tel"  placeholder="Enter Contact If Available" ></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="img">Image </label><input class="form-control "  id="img" name="img" type="file" required=""></div>
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