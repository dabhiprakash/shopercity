<?php 
if (empty ($_SESSION['user_id'])) {
    header("location:../login.php");
}else {
    header('location:vendor.php'); 
}
?>