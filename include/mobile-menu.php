<?php
if (isset($_POST['search'])) {
    $search_term = $_POST['search'];
    header("Location: vendor.php?search=$search_term");
    exit();
}
?>
<div class="sticky-footer sticky-content fix-bottom">
    <a href="index.php" class="sticky-link">
        <i class="d-icon-home"></i>
        <span>Home</span>
    </a>
    <a href="about.php" class="sticky-link">
        <!-- <img src="https://cdn-icons-png.flaticon.com/512/9424/9424604.png" alt="" width="23px"> -->
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
        </svg>
        <span>Notification</span>
    </a>
    <?php 
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    ?>
    <a href="account.php" class="sticky-link">
        <i class="d-icon-user"></i>
        <span>Account</span>
    </a>
    <a href="user/login.php" class="sticky-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
            <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z"/>
        </svg>
        <span>Add Resort</span>
    </a>
    <?php }else{ ?>
        <a href="login.php" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
    <?php 
    } ?>
    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="d-icon-search"></i>
            <span>Search</span>
        </a>
        <form action="#" class="input-wrapper" method="post">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit" title="submit-button">
                <i class="d-icon-search"></i>
            </button>
        </form>
    </div>
</div>
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>
<?php
    require_once "include/mobile-sidebar.php";
?>