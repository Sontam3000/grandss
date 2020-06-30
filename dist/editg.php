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
					              $date=$_POST['date'];
                      	$description=$_POST['description'];
                      	

                      	$allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
					    if(in_array($img_type, $allowed_type)) {
					        $path = 'upload/'.$img; 
					    } else {
					        $error[] = 'File type not allowed';
					    }
              $sqledit= "update gallerys set name='$name', image='$path',date='$date',description='$description' where gallery_id='$id'  ";
                      
                        $query = mysqli_query($conn,$sqledit);
              

                 if($query){
                  move_uploaded_file($img_tmp, $path);
              ?>
              <script type="text/javascript"> 
              alert("Edited!!"); location="gallery.php";
            </script>
                
              <?php
              
            }else{
              ?>
              <script type="text/javascript"> 
              alert("Cannot Edit"); 
               n nlocation="editg.php";
            </script>
              
      <?php
      
    } 
                      }
            
             $id=$_GET['id'];
                        $sql= "select * from gallerys where gallery_id=$id ";
                        $query1 = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($query1);
                      

                       
                      ?> 
                      <li class="breadcrumb-item active">Edit Gallery</li></ol>
 <?php echo (isset($msg)) ?$msg:"" ?>
 <div class="container" style="margin-top: 0px;">
                        <div class="row ">
                            <div class="col-md-9">
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header"><h3 class=" font-weight-light my-4">Add Image</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype='multipart/form-data'>
                                            
                                             <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="name">Name</label><input class="form-control py-4" id="name" name="name" type="text" value="<?php echo $row['name']; ?>" required=""></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="date">Date</label><input class="form-control py-4" id="date" name="date" type="datetime-local" value="<?php echo $row['date']; ?>"></div>
                                                </div>                                             
                                            </div>
                                           
                                            <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="img">Image </label><input class="form-control "
                                                     src="<?php echo $row['image']; ?>" height='50px' width='auto'  id="img" name="img" type="file" required=""></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="description">Description</label><input class="form-control py-4" id="description" name="description" type="text" value="<?php echo $row['description']; ?>"  required=""></div>
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