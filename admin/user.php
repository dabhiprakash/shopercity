<?php
require_once "../db/connection.php";
if (isset ($_POST['submit'])) {
  $user_id = $_POST['user_id'];
  $status = $_POST['status'];
  $qry = "UPDATE users SET status ='$status'  WHERE id = '$user_id'";
  $res = mysqli_query($conn, $qry);
}
if(isset($_GET['delete_id'])){
    $user_id = $_GET['delete_id'];
    $qry = "DELETE FROM users  WHERE id = '$user_id'";
    $res = mysqli_query($conn, $qry);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Projects</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include ("nav.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include ("sidebar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Name
                                </th>
                                <th style="width: 5%">
                                    email
                                </th>
                                <th style="width: 20%">
                                    mobile
                                </th>
                                <th style="width: 20%">
                                    address
                                </th>
                                <th style="width: 20%">
                                    date
                                </th>
                                <?php
                                    if(isset($_SESSION['type']) && $_SESSION['type'] == 0){
                                        ?>
                                        <th style="width: 20%">
                                            user status
                                        </th>
                                <?php
                                    }
                                ?>
                                <th style="width: 20%">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              $i = 0;
              $type = 0;
              if(isset($_GET['type'])){
                $type = 1;
              }
              $center = $conn->query("SELECT * FROM users WHERE is_active=$type");
              while ($row = $center->fetch()) {
                $i++;
                ?>
                            <tr>
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $row['first_name'] . ' ' . $row['last_name']; ?>
                                </td>
                                <td>
                                    <?= $row['email']; ?>
                                </td>
                                <td>
                                    <?= $row['mobile']; ?>
                                </td>
                                <td>
                                    <?= $row['address'] . ' ' . $row['city'] . ' ' . $row['state'] . ' ' . $row['country']; ?>
                                </td>
                                <td>
                                    <?= $row['created_at']; ?>
                                </td>
                                <?php 
                                    if(isset($_SESSION['type']) && $_SESSION['type'] == 0){
                                ?>
                                <td>
                                    <form action="user.php" method="post">
                                        <select name="status" class="form-control">
                                            <option value="0" <?php if ($row['status'] == 0) {
                          echo "selected";
                        } ?>>Active
                                            </option>
                                            <option value="1" <?php if ($row['status'] == 1) {
                          echo "selected";
                        } ?>>
                                                Deactive</option>
                                        </select>
                                        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                                        <input type="submit" class="btn btn-primary mt-2" name="submit" value="Update">
                                    </form>
                                    
                                </td>
                                <td>
                                    <a href="user.php?delete_id=<?= $row['id']; ?>" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </a>
                                </td>
                                <?php 
                                    }else{
                                        ?>
                                        <td>
                                        <a href="user.php?delete_id=<?= $row['id']; ?>" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </a>
                                        </td>
                                        <?php
                                    }
                                ?>
                            </tr>
                            <?php
              }
              ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0-pre
        </div>
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>