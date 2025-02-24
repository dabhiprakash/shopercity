<?php 
    require_once "../db/connection.php";
    if (empty ($_SESSION['user_id'])) {
        header("location:../login.php");
    }
?>
<aside class="ps-xl-5 ps-lg-4 ps-3 pe-2 py-3 sidebar sticky-top" data-bs-theme="none">
    <nav class="navbar navbar-expand-xl py-0">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas_Navbar">
            <div class="offcanvas-header">
                <span class="fw-bold fs-5 text-gradient">HotelAir</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-column custom_scroll ps-4 ps-xl-0">
                <div class="d-flex align-items-start mb-4">
                    <!-- <img class="avatar lg rounded-circle border border-3" src="assets/images/profile_av.png" alt="avatar"> -->
                    <div class="ms-3 mt-1">
                        <h4 class="mb-0 text-gradient title-font"><?php if(isset($_SESSION) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {echo $_SESSION['first_name'] .' '. $_SESSION['last_name']; } ?></h4>
                        <!-- <span class="text-muted">Super Admin</span> -->
                    </div>
                </div>
                <!-- start: Menu content -->
                <div class="tab-content">
                    <!-- start: HR tab -->
                    <div class="tab-pane fade active show" id="tab_hrms" role="tabpanel">
                        <!-- <h6 class="fl-title title-font ps-2 small text-uppercase text-muted" style="--dynamic-color: var(--theme-color1)">Usual</h6> -->
                        <ul class="list-unstyled mb-4 menu-list">
                        <li>
                                <a href="vendor.php" aria-label="HRMS Dashboard">
                                    <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M10 12h4v4h-4z"></path>
                                    </svg>
                                    <span class="mx-3">All Business</span>
                                </a>
                            </li>
                            <?php 
                                $user_id    =   $_SESSION['user_id'];
                                $qry = "SELECT id FROM vendor WHERE   `user_id` = $user_id";
                                $res = mysqli_query($conn, $qry);
                                if (mysqli_num_rows($res) == 0) {
                            ?>
                            <li>
                                <a href="add-vendor.php" aria-label="HRMS Dashboard">
                                    <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M10 12h4v4h-4z"></path>
                                    </svg>
                                    <span class="mx-3">Add Resort</span>
                                </a>
                            </li>
                            <?php 
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</aside>
