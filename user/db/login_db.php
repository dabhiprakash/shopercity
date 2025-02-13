<?php
require_once '../db/connection.php';
if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  // SQL query to check if the user exists   
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $sel_admin_qry = "select * from users where email='$email' and status='0'";
  $sel_admin = mysqli_query($conn, $sel_admin_qry);
  $fetch_row = mysqli_fetch_assoc($sel_admin);
  if ($fetch_row) {
    if (password_verify($password, $fetch_row['password'])) {
      $_SESSION['user_id']      =   $fetch_row['id'];
      $_SESSION['first_name']   =   $fetch_row['first_name'];
      $_SESSION['last_name']    =   $fetch_row['last_name'];
      $_SESSION['email']        =   $fetch_row['email'];
      $_SESSION['mobile']       =   $fetch_row['mobile'];
      $_SESSION['address']      =   $fetch_row['address'] != null ? $fetch_row['address'] : "";
      $_SESSION['city']         =   $fetch_row['city'] != null ? $fetch_row['city'] : "";
      $_SESSION['state']        =   $fetch_row['state'] != null ? $fetch_row['state'] : "";
      $_SESSION['country']      =   $fetch_row['country'] != null ? $fetch_row['country'] : "";
      $_SESSION['old_img']      =   $fetch_row['image'] != null ? $fetch_row['image'] : "";
      $_SESSION['pincode']      =   $fetch_row['pincode'] != null ? $fetch_row['pincode'] : "";
      $_SESSION['referral_id']  =   $fetch_row['referral_id'] != null ? $fetch_row['referral_id'] : "";
      $_SESSION['aadhar_number']=   $fetch_row['aadhar_number'] != null ? $fetch_row['aadhar_number'] : "";
      $_SESSION['is_active']    =   $fetch_row['is_active'] != null ? $fetch_row['is_active'] : "";
      $_SESSION['success_msg']  =   "Login Successfully";
      header("location:add-restaurants.php");
      die;
    } else {
      $_SESSION['error_msg'] = 'Wrong Email Or Password';
      header("location:login.php");
      die;
    }
  } else {
    $_SESSION['error_msg'] = 'user Not Found.';
    header("location:login.php");
    die;
  }
} else {

}
?>