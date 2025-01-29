<?php
if (isset($_POST['search'])) {
    $search_term = $_POST['search'];
    // Redirect to search-results.php with the search term as a URL parameter
    header("Location: vendor.php?search=$search_term");
    exit(); // Ensure that no further code is executed after the redirect
}
?>
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <div class="mobile-menu-container scrollable">
        <form action="" method="post" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit" title="submit-button">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <ul class="mobile-menu mmenu-anim">
            <li class="<?php if ($activePage == 'index') {
                echo "active";
            } ?>">
                <a href="index.php">Home</a>
            </li>
            <li class="<?php if ($activePage == 'about') {
                echo "active";
            } ?>">
                <a href="about.php">About</a>
            </li>
            <?php if($_SESSION['is_active'] != 1){ ?>
            <li class="<?php if ($activePage == 'plan') {
                echo "active";
            } ?>">
                <a href="plan.php">Plan</a>
            </li>
            <?php
            }
            if (isset ($_SESSION)) {
                if (!empty ($_SESSION['user_id'])) {
                    ?>
                    <li class="<?php if ($activePage == 'account') {
                        echo "active";
                    } ?>">
                        <a href="account.php">Account</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="<?php if ($activePage == 'login') {
                        echo "active";
                    } ?>">
                        <a href="login.php">Login</a>
                    </li>
                    <?php
                }
            }
            ?>
            <li class="<?php if ($activePage == 'contact-us') {
                echo "active";
            } ?>">
                <a href="contact-us.php">Contact Us</a>
            </li>

        </ul>
    </div>
</div>