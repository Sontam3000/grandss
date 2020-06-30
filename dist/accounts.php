<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');
?>

 <li class="breadcrumb-item active">Accounts</li></ol>


                      <!--table div-->
                      <div >
                        <table class="table table-dark">
                        <thead >
                            <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class=" table table-light">
                            <?php
                            include('connection.php');
                           // $db = mysqli_select_db($conn,'grands');
                            $sql = "select admin_id, email, username from admins";
                            $query = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($query) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($query)) {  
                                ?>

                            <tr>
                                
                                <td><?php echo $row['admin_id'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['username'] ?></td>

                                <?php if ($row['admin_id'] == 4) {
                                ?><td>None</td>
                                  <?php continue;
                                } 
                                  elseif($row['username'] == $_SESSION['username']){
                                    ?>
                                        <td ><u style="color: green;">Logged In</u></td>
                                        <?php continue; } 
                                  else{ ?>
                                     <td><button class="btn btn-danger deletebtn"  id="btn-confirm" data-toggle="modal" data-target="#mymodal" >Delete</button> </td> </tr> 
                                    

                                   


                             <?php   }
                            }}
                           
                            ?>

                            </tbody>
                            
                        </table>
                    </div> 
   <!--modal ---------------->
       <div class="modal" tabindex="-1" id="mymodal" role="dialog">
                                      <div class="modal-dialog" role="document" >
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Confirm Delete!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="deleteac.php" method="POST">
                                            <input type="hidden" name="delete_id" id="delete_id">
                                            
                                          <div class="modal-body">
                                            <p>Are You Sure To Delete?</p>
                                          </div>
                                          <div class="modal-footer">
                                           

                                            <button type="button" class="btn btn-danger" name="deletedata" id="modal-btn-Yes">Yes</button></a> 
                                            <button type="button" class="btn btn-dark"  id="modal-btn-No" data-dismiss="modal">No</button>
                                          </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
 <?php
 include('footer.php');
 ?>