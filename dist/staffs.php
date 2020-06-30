<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');
?>
 <li class="breadcrumb-item active">Staffs</li></ol>
 <div >
                        <table class="table table-dark">
                        <thead >
                            <tr>
                            <th>Name</th>
                            <th>Post</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Image</th>
                            <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class=" table table-light">
                            <?php
                            include('connection.php');
                           // $db = mysqli_select_db($conn,'grands');
                            $sql = "select * from staffs";
                            $query = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($query) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($query)) {  
                                ?>

                            <tr>
                                
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['post'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['contact'] ?><br>
                                	<?php echo $row['contact_no'] ?>
                                </td>
                                <td><?php echo "<img src='".$row['image']."' height='50px' width='auto'>" ?></td>
                                <td><a type="submit" href="staffedit.php?id=<?php  echo $row['staff_id']?>"><i  class="fa fa-edit mt-3 ml-3" ></i></a> || <a href="#" ><i class="fa fa-trash" id="btn-confirm" data-toggle="modal" data-target="#mymodal"></i></a>



                              <div class="modal" tabindex="-1" id="mymodal" role="dialog">
                                      <div class="modal-dialog" role="document">
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

                                 <form method= post action="test.php?id=deleteID()">
                                            <button type="submit" class="btn btn-danger" >Yes</button></form>
                                            <button type="button" class="btn btn-dark"  id="modal-btn-No" data-dismiss="modal">No</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div></td>
                           </tr> 
                         <?php
                            }
                           
                                } 
                            function deleteID(){
                                 $id= $row['staff_id'];
                                $_SESSION['id'] = $id;
                               header('Location: test.php?id='.$id);
                            }
                            ?>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>
                     <div>
                   <a href="addstaff.php" class="btn btn-success ml-4" > Add Staffs </a>
                   </div>
                   
                   
      
<?php
include('footer.php');
?>
