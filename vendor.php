<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php
    require_once "include/header_script.php";

    function displayImage($imagePath, $defaultImage)
    {
        if (file_exists($imagePath)) {
            return $imagePath;
        } else {
            return $defaultImage;
        }
    }
    ?>
<style>
    /* Basic reset */
    body, h3, a {
        margin: 0;
        padding: 0;
        text-decoration: none;
    }

    /* Row styling */
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start; /* Align items to the left */
        margin: 0 -15px; /* Adjust for column spacing */
    }

    /* Column styling */
    .product-wrap {
        flex: 0 0 24%; /* 4 columns on large screens */
        box-sizing: border-box;
        padding: 15px; /* Column padding */
    }

    .product {
        border: 1px solid #ddd; /* Border for products */
        border-radius: 5px; /* Rounded corners */
        overflow: hidden; /* To contain floated elements */
        background-color: #fff; /* Background color */
        display: flex; /* Use flexbox to align items */
        flex-direction: column; /* Stack items vertically */
        height: 100%; /* Ensure all product boxes have equal height */
    }

    .product-media {
        flex: 1; /* Allow media to grow */
    }

    /* Fixed image dimensions */
    .product-media img {
        width: 100%; /* Full width */
        height: 160px; /* Fixed height */
        object-fit: cover; /* Maintain aspect ratio and cover */
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .product-wrap {
            flex: 0 0 32%; /* 3 columns on medium screens */
        }
    }

    @media (max-width: 768px) {
        .product-wrap {
            flex: 0 0 48%; /* 2 columns on small screens */
        }
    }

    @media (max-width: 576px) {
        .product-wrap {
            flex: 0 0 100%; /* 1 column on extra small screens */
        }
    }

    /* Button styling */
    .btn-product {
        display: inline-block;
        padding: 10px 15px;
        margin-top: 10px;
        background-color: #007bff; /* Button color */
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-product:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }
</style>
</head>

<body>
    <div class="page-wrapper">
        <?php
        require_once "include/header.php";
        if (isset($_SESSION) && !isset($_SESSION['user_id'])) {
            $_SESSION['error_msg'] = "Please Login First After View Vendor";
            header("location: login.php");
        }
        ?>
        <main class="main">
            <div class="page-header" style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3c63a4;">
                <h3 class="page-subtitle"></h3>
                <!-- <h1 class="page-title">vendor </h1> -->
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter">/</li>
                    <li><?php 
                        if(isset($_GET['cat_id']) AND !empty($_GET['cat_id'])){
                            $id = $_GET['cat_id'];
                            $qry1 = "SELECT name FROM category WHERE id=$id";
                            $res1 = mysqli_query($conn, $qry1);
                            $row2 = mysqli_fetch_array($res1);
                            echo $row2['name'];
                        }else{
                            echo "vendor"; 
                        }?> </li>
                </ul>
            </div>

            <div class="page-content mb-10 pb-6">
                <div class="container">
                    <div class="row main-content-wrap gutter-lg">
                        <div class="main-content">
                            <div class="row cols-1 cols-sm-3 cols-lg-4 product-wrapper mt-5">
                                <?php
                                if (isset($_GET["cat_id"])) {
                                    $get_catId = $_GET["cat_id"];
                                    $qry = "SELECT id, store_name, city_id, image, discount_id FROM vendor WHERE `category_id` = $get_catId";
                                    $res = mysqli_query($conn, $qry);
                                    // while ($row = mysqli_fetch_assoc($res)) {
                                    //     print_r($row);
                                    // }
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $like = "";
                                            // $vendor_id = $row['id'];
                                            // if (isset($_SESSION)) {
                                            //     if (!empty($_SESSION['user_id'])) {
                                            //         $user_id = $_SESSION['user_id'];
                                            //         $qry2 = "SELECT * FROM wishlist WHERE user_id = $user_id AND vendor_id = $vendor_id";
                                            //         $res2 = mysqli_query($conn, $qry2);
                                            //         if (mysqli_num_rows($res2) > 0) {
                                            //             $like = 1;
                                            //         }
                                            //     }
                                            // }
                                ?>
                                            <div class="product-wrap">
                                                <div class="product text-center shadow-media cart-full">
                                                    <figure class="product-media">
                                                        <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                            <img src="<?php echo displayImage("vendor/profile/" . $row['image'], 'images/images.png'); ?>" alt="product" width="280" height="315" />
                                                        </a>
                                                        <div class="product-label-group">
                                                            <label class="product-label label-new">new</label>
                                                        </div>
                                                        <div class="product-action-vertical">
                                                            <!-- <a href="#" class="btn-product-icon btn-wishlist"title="Add to wishlist">
                                                                <i class="d-icon-heart"></i>
                                                            </a> -->
                                                        </div>
                                                    </figure>
                                                    <div class="product-details">
                                                        <div class="product-cat">
                                                            <h3 class="product-name">
                                                                <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                                    <?php echo $row['store_name']; ?>
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <h3 class="product-name">
                                                            <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                                <?php
                                                                // $qry = "SELECT name FROM city WHERE id =" . $row['city_id'] . "";
                                                                // $res = mysqli_query($conn, $qry);
                                                                // if(mysqli_fetch_array($res)){
                                                                // $city = mysqli_fetch_array($res);
                                                                //     echo $city['name'];
                                                                // }
                                                                ?>
                                                            </a>
                                                        </h3>
                                                        <h3 class="product-name">
                                                            <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                                <?php
                                                                $qry2 = "SELECT name FROM discount WHERE id =" . $row['discount_id'] . "";
                                                                $res2 = mysqli_query($conn, $qry2);
                                                                $discount = mysqli_fetch_array($res2);
                                                                echo $discount['name'];
                                                                ?>
                                                            </a>
                                                        </h3>
                                                        <a href="single-product.php?shop_id=<?php echo $row['id']; ?>" class="btn-product" title="Visit Store"><i class="d-icon-bag"></i>Visit Store</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "<h4>No Any Vendor Available...<h4>";
                                    }
                                } else {
                                    if (isset($_GET["search"])) {
                                        $row = "";
                                        $search_term = $_GET['search'];
                                        $search_term = mysqli_real_escape_string($conn, $search_term); // Ensure safe input
                                        $query = "SELECT v.*, c.name as city_name, s.name as state_name
                                                    FROM `vendor` v
                                                    LEFT JOIN `city` c ON v.city_id = c.id
                                                    LEFT JOIN `state` s ON c.state_id = s.id
                                                    WHERE v.`name` LIKE '%$search_term%'
                                                    OR v.`store_name` LIKE '%$search_term%'
                                                    OR c.`name` LIKE '%$search_term%'
                                                    OR s.`name` LIKE '%$search_term%'
                                                    ORDER BY v.`name` ASC";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <div class="product-wrap">
                                                    <div class="product text-center shadow-media cart-full">
                                                        <figure class="product-media">
                                                            <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                                <img src="<?php echo displayImage("vendor/profile/" . $row['image'], 'images/images.png'); ?>" alt="product" width="280" height="315" />
                                                            </a>
                                                            <div class="product-label-group">
                                                                <label class="product-label label-new">new</label>
                                                            </div>
                                                            <div class="product-action-vertical">
                                                                <a href="#" class="btn-product-icon btn-wishlist <?php if ($like != "") {
                                                                                                                        echo "added remove-wishlist";
                                                                                                                    } else {
                                                                                                                        echo "add-wishlist";
                                                                                                                    } ?>" data-id="<?php echo $row['id']; ?>" title="Add to wishlist"><i class="d-icon-heart<?php if ($like != "") {
                                                                                                                                                    echo "-full";
                                                                                                                                                } ?>"></i></a>
                                                                <!-- d-icon-heart-full -->
                                                            </div>
                                                        </figure>
                                                        <div class="product-details">
                                                            <div class="product-cat">
                                                                <h3 class="product-name">
                                                                    <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                                        <?php echo $row['store_name']; ?>
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <h3 class="product-name">
                                                                <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                                    <?php
                                                                    echo $row['city_name'];
                                                                    ?>
                                                                </a>
                                                            </h3>
                                                            <?php
                                                            if (!empty($row['discount_id'])) {
                                                            ?>
                                                                <h3 class="product-name">
                                                                    <a href="single-product.php?shop_id=<?php echo $row['id']; ?>">
                                                                        <?php
                                                                        $qry2 = "SELECT name FROM discount WHERE id =" . $row['discount_id'] . "";
                                                                        $res2 = mysqli_query($conn, $qry2);
                                                                        $discount = mysqli_fetch_array($res2);
                                                                        echo $discount['name'];
                                                                        ?>
                                                                    </a>
                                                                </h3>
                                                            <?php } ?>
                                                            <a href="single-product.php?shop_id=<?php echo $row['id']; ?>" class="btn-product" title="Visit Store"><i class="d-icon-bag"></i>Visit Store</a>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php
                                            }
                                        } else {
                                            echo "<h4>No Any Vendor Available...<h4>";
                                        }
                                        // $query = "SELECT * FROM `vendor` WHERE `name` LIKE '%$search_term%' ORDER BY `name` ASC";
                                        // // Execute the query
                                        // $result = mysqli_query($conn, $query);
                                        // if (mysqli_num_rows($result) > 0) {
                                        // 	$row = mysqli_fetch_assoc($result);
                                        //     print_r($row);
                                        // } else {
                                        // 	$qry1 = "SELECT * FROM `city` WHERE `name` LIKE '%$search_term%' ORDER BY `name` ASC";
                                        // 	// Execute the query
                                        // 	$res1 = mysqli_query($conn, $qry1);

                                        // 	if (mysqli_num_rows($res1) > 0) {
                                        // 		$row = $res1;
                                        // 	}else{
                                        // 		$qry2 = "SELECT * FROM `state` WHERE `name` LIKE '%$search_term%'";
                                        // 		// Execute the query
                                        // 		$res2 = mysqli_query($conn, $qry2);
                                        // 		if (mysqli_num_rows($res2) > 0) {
                                        // 			echo "dfgdfg";
                                        // 			//$state_id = mysqli_fetch_assocs($res2);
                                        // 			print_r($state_id);
                                        // 			die();
                                        // 		}
                                        // 	}
                                        // }
                                    }
                                }
                                ?>
                            </div>
                            <!-- <nav class="toolbox toolbox-pagination">
                                <p class="show-info">Showing <span>12 of 56</span> Products</p>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                            aria-disabled="true"> <i class="d-icon-arrow-left"></i>Prev </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next"> Next<i
                                                class="d-icon-arrow-right"></i> </a>
                                    </li>
                                </ul>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php
        require_once "include/footer.php";
        ?>
    </div>
    <?php
    require_once "include/mobile-menu.php";
    require_once "include/footer_script.php";
    ?>
</body>

</html>