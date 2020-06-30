<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');

include('connection.php');
if(isset($_POST['submit'])){
	$title = mysqli_real_escape_string($conn,$_POST['Title']);
	$category = mysqli_real_escape_string($conn,$_POST['Category']);
    $company = mysqli_real_escape_string($conn,$_POST['Company']);
	$country = mysqli_real_escape_string($conn,$_POST['Country']);
	$Peoplewanted = mysqli_real_escape_string($conn,$_POST['Peoplewanted']);
	$Basic_Salary = mysqli_real_escape_string($conn,$_POST['Basic_Salary']);
    $Posted_by = mysqli_real_escape_string($conn,$_POST['Posted_by']);
    $Description = mysqli_real_escape_string($conn,$_POST['Description']);

	

	
	   $query = mysqli_query($conn,"select * from jobs where Title='$title' and Country='$country' and Company='$company' ");
	   $usecount=mysqli_num_rows($query);	
	   if($usecount>0){
		echo "<script type='text/javascript'>alert(' Job Already Exist');
		window.location='jobsadd.php';
        </script>";
        }else{
	

	$insertquery = "insert into jobs( Title,Category,Country,Company,Peoplewanted,Basic_Salary,Posted_by,Description) values('$title','$category','$country','$company','$Peoplewanted',$Basic_Salary,'$Posted_by','$Description')";
	
		$query1=mysqli_query($conn,$insertquery);
		if($query1){
			?>
			<script type="text/javascript"> 
			alert("Added!!"); 
           location="jobs.php";
		</script>
		 <?php
         }else{   
			?>
			<script type="text/javascript"> 
			alert("Not Added"); 
				location="jobsadd.php";
		</script>
			
			<?php
			
		}	
}}
?>
 <li class="breadcrumb-item active">Add Jobs</li></ol>
<!--form reg-->
 <div class="container" style="margin-top: 0px;">
                        <div class="row ">
                            <div class="col-md-9">
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header"><h3 class=" font-weight-light my-4">Add Jobs</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype='multipart/form-data'>
                                            
                                             <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="Title">Title</label><input class="form-control py-4" id="Title" name="Title" type="text" placeholder="Enter Title" required=""></div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="Category">Category</label><input class="form-control py-4" id="Category" name="Category" type="text" placeholder="Enter Category" required=""></div>
                                                </div>                                             
                                           
                                        
                                                <div class="col-md-6 pl-3">
                                                    <div class="form-group"><label class="small mb-1" for="Country">Country</label><input class="form-control py-4" id="Country" name="Country" type="textCountry" placeholder="Enter Country" required=""></div>
                                         </div></div>
                                             <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="Company">Company</label><input class="form-control py-4" id="Company" name="Company" type="text" placeholder="Enter Company" required=""></div>
                                                </div>                                             
                                            
                                            <div class="col-md-6 pl-3">
                                                    <div class="form-group"><label class="small mb-1" for="Peoplewanted">People Wanted</label><input class="form-control py-4" id="Peoplewanted" name="Peoplewanted" type="text"  placeholder="Enter Peoplewanted" required=""></div>
                                                </div>                                             
                                            </div>
                                             <div class="form-row">
                                             <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="Basic_Salary">Basic Salary</label><input class="form-control py-4" id="Basic_Salary" name="Basic_Salary" type="text" placeholder="Enter Basic Salary" required=""></div>
                                                </div>                                             
                                            
                                            <div class="col-md-6 pl-3">
                                                    <div class="form-group"><label class="small mb-1" type="dropdown" for="Posted_by">Posted By</label>
                                                        <div class="dropdown">
                                                        <select class="form-control" name="Posted_by" style="height:48px;" id="Posted_by" >
                                                        <option class="dropdown-item" value="" >Select Staff</option>
                                                     <?php 
                                                     $sql = "select * from staffs";
                                                      $query = mysqli_query($conn,$sql);
                                                      if (mysqli_num_rows($query) > 0) {
                
                                                      while($row = mysqli_fetch_assoc($query)) {  
                                                     ?>
                                                     <option class="dropdown-item" value="<?php echo $row['name'];?>"  ><?php echo $row['name'];?></option>
                                                     <?php
                                             }}?>
                                         </select>
                                         </div>
                                                </div>
                                                </div>                                             
                                            </div>
                                            <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="Description"><span name="Description" id="Description">Description </span></label> 
                                        <textarea  class="form-control" placeholder="Enter description here..." name="Description" id="Description" rows="4"> </textarea> 
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