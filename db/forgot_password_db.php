<?php
require_once 'connection.php';
if(isset($_REQUEST['forgot'])){
    $email  =   $_POST['email'];
    $sel_admin_qry = "select id, email, first_name, last_name from users where email='$email' and status='0'";
    $sel_admin = mysqli_query($conn, $sel_admin_qry);
    $fetch_row = mysqli_fetch_assoc($sel_admin);
    if ($fetch_row) {
        $new_password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789").time(), 0, 10);
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $mail   =    sendPasswordResetEmail($fetch_row['email'], $fetch_row['first_name'] .' '. $fetch_row['last_name'], $new_password);
        if($mail == 1) {
            $_SESSION['success_msg'] = 'Paasword link send successfully';
            header("location:../login.php");
            die;
        } else {
            $_SESSION['error_msg'] = 'Something went wrong!';
        }
    }   else {
        $_SESSION['error_msg'] = 'Wrong Email Or Password';
    }
    header("location:../forgot_password.php");
    die;
}

function sendPasswordResetEmail($userEmail, $userName, $resetLink) {
    $subject = "Password Reset Request";

    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@example.com" . "\r\n";
    $headers .= "Reply-To: support@example.com" . "\r\n";

    // HTML Email Template
    $message = "
    <!DOCTYPE html>
    <html lang='en-US'>
    <head>
        <meta charset='UTF-8'>
        <title>Password Reset Request</title>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f2f3f8; margin: 0; }
            .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; 
                        text-align: center; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            h2 { color: #333; }
            p { font-size: 14px; color: #555; }
            .button { background: #20e277; color: #fff; padding: 10px 20px; text-decoration: none; 
                      font-size: 16px; border-radius: 5px; display: inline-block; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Hello, $userName</h2>
            <p>You have requested to reset your password. Your password is</p>
            <span class='button'>".$resetLink."</span>
            <p>If you didn't request this, please ignore this email.</p>
        </div>
    </body>
    </html>";

    // Send email
    if(mail($userEmail, $subject, $message, $headers)){
        return 1;
    } else {
        return 0;
    }
}
?>