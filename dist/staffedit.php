<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');
?>


                      <?php
                      include('connection.php');
                      if(isset($_POST['submit'])){

                        $id=$_GET['id'];
                      	$name=$_POST['name'];
                      	$img_tmp = $_FILES['img']['tmp_name'];
					              $img = $_FILES['img']['name'];
					              $img_type = $_FILES['img']['type'];
					              $post=$_POST['post'];
                      	$contact=$_POST['contact'];
                      	$email=$_POST['email'];
                      	$acontact=$_POST['acontact'];

                      	$allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
					    if(in_array($img_type, $allowed_type)) {
					        $path = 'upload/'.$img; 
					    } else {
					        $error[] = 'File type not allowed';
					    }
                        if($acontact==0){
                          $sqledit= "update staffs set name='$name', image='$path',post='$post',email='$email',contact='$contact', contact_no=Null where staff_id='$id'  ";
                        }else{
                      	$sqledit= "update staffs set name='$name', image='$path',post='$post',email='$email',contact='$contact',contact_no='$acontact' where staff_id='$id'  ";
                      }
                      	$query = mysqli_query($conn,$sqledit);
					    

				         if($query){
				         	move_uploaded_file($img_tmp, $path);
							?>
							<script type="text/javascript"> 
							alert("Edited!!"); location="staffs.php";
						</script>
								
							<?php
							
						}else{
							?>
							<script type="text/javascript"> 
							alert("Cannot Edit"); 
								location="staffedit.php";
						</script>
							
			<?php
			
		}	
                      }
						
						 $id=$_GET['id'];
                      	$sql= "select * from staffs where staff_id=$id ";
                      	$query1 = mysqli_query($conn,$sql);
                    	$row = mysqli_fetch_array($query1);
                      

                       
                      ?> 
                      <li class="breadcrumb-item active">Edit Staffs</li></ol>
                      <?php echo (isset($msg)) ?$msg:"" ?>
                      <div class="container" style="margin-top: 0px;">
                        <div class="row ">
                            <div class="col-md-9">
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header"><h3 class=" font-weight-light my-4">Edit Staffs</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype='multipart/form-data'>
                                            
                                             <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="name">Name</label><input class="form-control py-4" id="name" name="name" type="text" value="<?php echo $row['name']; ?> "required=""></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="uname">Post</label><input class="form-control py-4" id="post" name="post" type="text" value="<?php echo $row['post']; ?> "required=""></div>
                                                </div>                                             
                                           
                                           
                                                <div class="col-md-6 pl-3">
                                                    <div class="form-group"><label class="small mb-1" for="uname">Email</label><input class="form-control py-4" id="email" name="email" type="email" value="<?php echo $row['email']; ?> "required=""></div>
                                         </div></div>
                                             <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="rpass">Contact</label><input class="form-control py-4" id="contact" name="contact" type="tel" value="<?php echo $row['contact']; ?>" required=""></div>
                                                </div>                                             
                                            
                                            <div class="col-md-6 pl-3">
                                                    <div class="form-group"><label class="small mb-1" for="rcpass">Another Contact</label><input class="form-control py-4" id="acontact" name="acontact" type="tel"  value="<?php echo $row['contact_no']; ?>" ></div>
                                                </div>                                             
                                            </div>
                                           <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="name">Image </label><input class="form-control " src="<?php echo $row['image']; ?>" height='50px' width='auto' id="img" name="img" type="file" required=""></div>
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