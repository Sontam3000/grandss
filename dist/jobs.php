<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');
?>
 <li class="breadcrumb-item active">Jobs</li></ol>
 <div >
                        <table class=" table table-dark">
                        <thead >
                            <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Country</th>
                            <th>Company</th>
                            <th>No. Of People</th>
                            <th>Basic Salary</th>
                            <th>Posted By</th>
                            <th>Description</th>
                            <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class=" table table-light">
                            <?php
                            include('connection.php');
                           // $db = mysqli_select_db($conn,'grands');
                            $sql = "select * from jobs";
                            $query = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($query) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($query)) {  
                                ?>

                            <tr>
                                
                                <td><?php echo $row['Title'] ?></td>
                                <td><?php echo $row['Category'] ?></td>
                                <td><?php echo $row['Country'] ?></td>
                                <td><?php echo $row['Company'] ?></td>
                                <td><?php echo $row['Peoplewanted'] ?></td>
                                 <td><?php echo $row['Basic_Salary'] ?></td>
                                  <td><?php echo $row['Posted_by'] ?></td>
                                   <td><?php echo $row['Description'] ?></td>
                                
                                <td><a type="submit" href="jobsedit.php?id=<?php  echo $row['jobs_id']?>"><i  class="fa fa-edit mt-3 ml-3" ></i></a> || <a href="#" ><i class="fa fa-trash" id="btn-confirm" data-toggle="modal" data-target="#mymodal"></i></a></td>
                             </tr> 
                             <div class="modal" tabindex="-1" id="mymodal" role="dialog">
                                      <div class="modal-dialog" role="document" >
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Confirm Delete!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Are You Sure To Delete?</p>
                                          </div>
                                          <div class="modal-footer">
                                           <a href="test.php?id=<?php echo $row['jobs_id']?>">

                                            <button type="button" class="btn btn-danger" id="modal-btn-Yes">Yes</button></a> 
                                            <button type="button" class="btn btn-dark"  id="modal-btn-No" data-dismiss="modal">No</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                         <?php
                            }
                           
                                } 
                            ?>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>
                    <div>
                   <a href="jobsadd.php" class="btn btn-success ml-4" > Add Jobs </a>
                   </div>

                   
      
<?php
include('footer.php');
?>
