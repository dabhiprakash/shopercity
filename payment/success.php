<?php
require_once "../db/connection.php";
if (isset($_POST['code']) && $_POST['code'] == "PAYMENT_SUCCESS") {
  $order_id = $_POST['transactionId'];
  $qry_order = "SELECT id, transaction_id, user_id FROM pay_transaction WHERE transaction_id = '$order_id'";
  $res_order = mysqli_query($conn, $qry_order);
  $rows_orders = mysqli_fetch_array($res_order);

  if ($rows_orders) {
    $row_order_id = $rows_orders['transaction_id'];
    if ($order_id == $row_order_id) {
      $user_id = $rows_orders['user_id'];
      $sel_admin_qry = "SELECT * FROM users WHERE id = $user_id";
      $sel_admin = mysqli_query($conn, $sel_admin_qry);
      $fetch_row = mysqli_fetch_assoc($sel_admin);

      if ($fetch_row) {
        $_SESSION['user_id'] = $fetch_row['id'];
        $_SESSION['first_name'] = $fetch_row['first_name'];
        $_SESSION['last_name'] = $fetch_row['last_name'];
        $_SESSION['email'] = $fetch_row['email'];
        $_SESSION['mobile'] = $fetch_row['mobile'];
        $_SESSION['address'] = $fetch_row['address'] ?? "";
        $_SESSION['city'] = $fetch_row['city'] ?? "";
        $_SESSION['state'] = $fetch_row['state'] ?? "";
        $_SESSION['country'] = $fetch_row['country'] ?? "";
        $_SESSION['old_img'] = $fetch_row['image'] ?? "";
        $_SESSION['pincode'] = $fetch_row['pincode'] ?? "";
        $_SESSION['referral_id'] = $fetch_row['referral_id'] ?? "";
        $_SESSION['aadhar_number'] = $fetch_row['aadhar_number'] ?? "";
        $_SESSION['is_active'] = 1;

        $upd_ord_qry = "UPDATE pay_transaction SET status = 1 WHERE id = '$user_id'";
        mysqli_query($conn, $upd_ord_qry);

        $created_at = date("Y-m-d H:i:s");

        // Define commission percentages for each level
        $level1_percentage = 0.25; // 25% for direct upline
        $level2_percentage = 0.10; // 10% for second level upline
        $level3_percentage = 0.10; // 10% for third level upline

        // Calculate commission amounts
        $total_payment = 1; // Total payment
        $level1_commission = $total_payment * $level1_percentage;
        $level2_commission = $total_payment * $level2_percentage;
        $level3_commission = $total_payment * $level3_percentage;

        // Insert transaction for the user
        $sql = "INSERT INTO transaction (order_id, user_id, balance, created_at) VALUES ('$order_id', '$user_id', '$total_payment', '$created_at')";
        $qry = "UPDATE users SET is_active = 1 WHERE id = $user_id";
        $_SESSION['is_active'] = 1;
        mysqli_query($conn, $qry);
        if ($conn->query($sql) === TRUE) {
          // Update user balance with level 1 commission
          $qry1 = "SELECT upline_id FROM users WHERE id='$user_id'";
          $res = mysqli_query($conn, $qry1);
          $rows = mysqli_fetch_array($res);
          $dirst_level_upline_id = $rows['upline_id'];

          $update_balance_sql = "UPDATE users SET balance = balance + $level1_commission WHERE id = '$dirst_level_upline_id'";
          $qry2 = "INSERT INTO transaction (order_id, user_id, balance, created_at) VALUES ('$order_id', '$dirst_level_upline_id', '$level1_commission', '$created_at')";
          $conn->query($qry2);
          $conn->query($update_balance_sql);

          // Get user's upline (level 1)
          $level1_upline_sql = "SELECT upline_id FROM users WHERE id = '$dirst_level_upline_id'";
          $level1_upline_result = $conn->query($level1_upline_sql);

          if ($level1_upline_result->num_rows > 0) {
            $level1_upline_row = $level1_upline_result->fetch_assoc();
            $level1_upline_id = $level1_upline_row['upline_id'];

            // Update level 1 upline's balance with level 2 commission
            $update_level2_balance_sql = "UPDATE users SET balance = balance + $level2_commission WHERE id = '$level1_upline_id'";
            $conn->query($update_level2_balance_sql);
            $qry3 = "INSERT INTO transaction (order_id, user_id, balance, created_at) VALUES ('$order_id', '$level1_upline_id', '$level2_commission', '$created_at')";
            $conn->query($qry3);

            // Get level 2 upline
            $level2_upline_sql = "SELECT upline_id FROM users WHERE id = '$level1_upline_id'";
            $level2_upline_result = $conn->query($level2_upline_sql);

            if ($level2_upline_result->num_rows > 0) {
              $level2_upline_row = $level2_upline_result->fetch_assoc();
              $level2_upline_id = $level2_upline_row['upline_id'];
              $update_level3_balance_sql = "UPDATE users SET balance = balance + $level3_commission WHERE id = '$level2_upline_id'";
              $qry4 = "INSERT INTO transaction (order_id, user_id, balance, created_at) VALUES ('$order_id', '$level2_upline_id', '$level3_commission', '$created_at')";
              $conn->query($qry4);
              $conn->query($update_level3_balance_sql);
            }
          }
        }
      }
    }
  }
}
?>
<html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
  body {
    text-align: center;
    padding: 40px 0;
    background: #EBF0F5;
  }

  h1 {
    color: #88B04B;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-weight: 900;
    font-size: 40px;
    margin-bottom: 10px;
  }

  p {
    color: #404F5E;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-size: 20px;
    margin: 0;
  }

  i {
    color: #9ABC66;
    font-size: 100px;
    line-height: 200px;
    margin-left: -15px;
  }

  .card {
    background: white;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 3px #C8D0D8;
    display: inline-block;
    margin: 0 auto;
  }
</style>

<body>
  <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark">✓</i>
    </div>

    <h1>Success</h1>
    <p>Transaction ID : <?php print_r($_POST['transactionId']); ?></p>
    <p>Amount : <?php echo $_POST['amount'] / 100; ?></p>
    <p>We received your purchase request;<br /> we'll be in touch shortly!</p>
  </div>
</body>
<script>
    function redirectPage() {
      window.location.href = "https://www.shopercity.com/";
    }
    setTimeout(redirectPage, 5000);
</script>
</html>