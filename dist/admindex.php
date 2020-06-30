<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include('header.php');
?>
<li class="breadcrumb-item active">Admindex</li></ol>

<?php
include('footer.php');
?>


                       
                       
                