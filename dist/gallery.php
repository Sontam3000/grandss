<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');
?>
 <li class="breadcrumb-item active">Gallery</li></ol>
 <div >


   <table class=" table table-dark">
                        <thead >
                            <tr>
                            <th>Name</th>
                             <th>Image</th>
                           <th>Uploaded On</th>
                            <th>Description</th>
 							<th>Operation</th>
                            
                            </tr>
                        </thead>
                        <tbody class=" table table-light">
                            <?php
                            include('connection.php');
                           // $db = mysqli_select_db($conn,'grands');
                            $sql = "select * from gallerys";
                            $query = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($query) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($query)) {  
                                ?>

                            <tr>
                            	  <td><?php echo $row['name'] ?></td>
                                <td><?php echo "<img src='".$row['image']."' height='50px' width='auto'>" ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['description'] ?></td>

                                 <td><a type="submit" href="editg.php?id=<?php  echo $row['gallery_id']?>"><i  class="fa fa-edit mt-3 ml-3" ></i></a> || <a href="delg.php?id=<?php  echo $row['gallery_id']?>" ><i class="fa fa-trash" ></i></a></td>
                                 <!-- id="btn-confirm" data-toggle="modal" data-target="#mymodal" -->
                             </tr> 
                              <?php
                            }
                           
                                } 
                            ?>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>

  <div>
       <a href="addg.php" class="btn btn-success ml-4" > Add Images </a>
       </div>

                   
      
<?php
include('footer.php');
?>
