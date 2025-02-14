<?php
    if (!defined('DIR')) {
        // Check if the environment is local or live
        if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
            // Local environment
            define('DIR', 'http://localhost/project/core_php/shopercity/'); // Use your local path
        } else {
            // Production environment
            define('DIR', 'https://shopercity.com/');
        }
    }
    
    if (!defined('URL')) {
        // Check if the environment is local or live
        if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
            // Local environment
            define('URL', 'http://localhost/project/core_php/shopercity/'); // Use your local path
        } else {
            // Production environment
            define('URL', 'https://shopercity.com/');
        }
    }
    
    if (isset($_POST['add'])) {
        // Get POST data and sanitize inputs to avoid SQL injection
        $category_id = mysqli_real_escape_string($conn, $_POST['category']);
        $name = mysqli_real_escape_string($conn, $_POST['v_name']);
        $store_name = mysqli_real_escape_string($conn, $_POST['store_name']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $street = mysqli_real_escape_string($conn, $_POST['street']);
        $city_id = mysqli_real_escape_string($conn, $_POST['city']);
        $state_id = mysqli_real_escape_string($conn, $_POST['state']);
        $country_id = mysqli_real_escape_string($conn, $_POST['country']);
        $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
        $lat = mysqli_real_escape_string($conn, $_POST['lat']);
        $longitude = mysqli_real_escape_string($conn, $_POST['log']);
        $plan_id = mysqli_real_escape_string($conn, $_POST['plan']); // assuming plan_id is in POST data
        $desc_1 = mysqli_real_escape_string($conn, $_POST['desc_1']);
        $desc_2 = mysqli_real_escape_string($conn, $_POST['desc_2']); // assuming desc_2 is in POST data
        $discount_id = mysqli_real_escape_string($conn, $_POST['discount']);
        $delivery_status = mysqli_real_escape_string($conn, $_POST['delivery']?$_POST['delivery']:0);
        $created_by = date("Y-m-d"); // You can replace with user or other context
        $modified_by = date("Y-m-d");
        $image = '';  // Placeholder if you don't upload an image
        $banner = ''; // Placeholder if you don't upload a banner
        $youtube_link = mysqli_real_escape_string($conn, $_POST['link']);
        $starting_date = mysqli_real_escape_string($conn, $_POST['s_date']);
        $end_date = mysqli_real_escape_string($conn, $_POST['e_date']);
        $status = 1; // You can modify the status value based on your requirement
        
        // File upload logic for banner
        if (isset($_FILES['banner']) && $_FILES['banner']['error'] === 0) {
            $banner = $_FILES['banner'];
            $banner_name = $banner['name'];
            $banner_tmp_name = $banner['tmp_name'];
            $banner_size = $banner['size'];
            $banner_error = $banner['error'];
            $banner_ext = pathinfo($banner_name, PATHINFO_EXTENSION);
    
            // File upload logic for image
            $image = $_FILES['image'];
            $image_name = $image['name'];
            $image_tmp_name = $image['tmp_name'];
            $image_size = $image['size'];
            $image_error = $image['error'];
            $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
            // Allowed file extensions
            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    
            // Check for valid file extensions for both files
            if (!in_array(strtolower($banner_ext), $allowed_ext) || !in_array(strtolower($image_ext), $allowed_ext)) {
                die("Invalid file extension for banner or image. Only jpg, jpeg, png, and gif are allowed.");
            }
    
            // Check for upload errors
            if ($banner_error !== 0 || $image_error !== 0) {
                die("Error uploading files.");
            }
    
            // Move uploaded files to the desired folder
            $banner_new_name = uniqid('', true) . "." . $banner_ext;
            $image_new_name = uniqid('', true) . "." . $image_ext;
            $banner_upload_path = "../vendor/banner/" . $banner_new_name;
            $image_upload_path = "../vendor/profile/" . $image_new_name;
    
            if (!move_uploaded_file($banner_tmp_name, $banner_upload_path)) {
                die("Error uploading banner.");
            }
    
            if (!move_uploaded_file($image_tmp_name, $image_upload_path)) {
                die("Error uploading image.");
            }
        }
    
        $user_id = $_SESSION['user_id'];
        $check_query = "SELECT * FROM vendor WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $check_query);
    
        if (mysqli_num_rows($result) > 0) {
            // Record exists, perform update
            $row = mysqli_fetch_assoc($result);
            $old_banner = $row['banner'];
            $old_image = $row['image'];
    
            // Only remove old files if a new one has been uploaded
            if (isset($_FILES['banner'])) {
                // Remove old banner file if a new one was uploaded
                if (file_exists("../vendor/banner/$old_banner")) {
                    unlink("../vendor/banner/$old_banner");
                }
            } else {
                $banner_new_name = $old_banner; // Keep old banner
            }
    
            if (isset($_FILES['image'])) {
                // Remove old image file if a new one was uploaded
                if (file_exists("../vendor/profile/$old_image")) {
                    unlink("../vendor/profile/$old_image");
                }
            } else {
                $image_new_name = $old_image; // Keep old image
            }
    
            // Perform the update with the new banner and image
            $update_query = "UPDATE vendor SET 
                category_id = '$category_id',
                name = '$name',
                store_name = '$store_name',
                contact = '$contact',
                email = '$email',
                street = '$street',
                city_id = '$city_id',
                state_id = '$state_id',
                country_id = '$country_id',
                zipcode = '$zipcode',
                lat = '$lat',
                longitude = '$longitude',
                plan_id = '$plan_id',
                desc_1 = '$desc_1',
                desc_2 = '$desc_2',
                discount_id = '$discount_id',
                delivery_status = '$delivery_status',
                modified_by = '$modified_by',
                image = '$image_new_name',
                banner = '$banner_new_name',
                status = '$status',
                youtube_link = '$youtube_link',
                starting_date = '$starting_date',
                end_date = '$end_date'
                WHERE user_id = '$user_id'";
            // print_r($update_query);
            // die;
            if (mysqli_query($conn, $update_query)) {
                echo "Record updated successfully!";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            // Construct SQL query to insert data into the database
            $query = "INSERT INTO vendor (user_id, category_id, name, store_name, contact, email, street, city_id, state_id, country_id, zipcode, lat, longitude, plan_id, desc_1, desc_2, discount_id, delivery_status, created_by, modified_by, image, banner, status, youtube_link, starting_date, end_date)
                    VALUES ('$user_id','$category_id', '$name', '$store_name', '$contact', '$email', '$street', '$city_id', '$state_id', '$country_id', '$zipcode', '$lat', '$longitude', '$plan_id', '$desc_1', '$desc_2', '$discount_id', '$delivery_status', '$created_by', '$modified_by', '$image_new_name', '$banner_new_name', '$status', '$youtube_link', '$starting_date', '$end_date')";
    
            // Execute query
            if (mysqli_query($conn, $query)) {
                echo "Data inserted successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        header("Location:add-restaurants.php");
    }
    
    

    $subscription_qry   =   "select * from subscription";
    $subscription       =   mysqli_query($conn, $subscription_qry);
    
    $city_qry   =   "select * from city";
    $city       =   mysqli_query($conn, $city_qry);
    
    
    $state_qry  =   "select * from state";
    $state      =   mysqli_query($conn, $state_qry);
    
    $country_qry    =   "select * from country";
    $country        =   mysqli_query($conn, $country_qry);
    
    $category_qry   =   "select * from category";
    $category       =   mysqli_query($conn, $category_qry);

    $discount_qry   =   "select * from discount";
    $discount       =   mysqli_query($conn, $discount_qry);
    
    $id             =   $_SESSION['user_id'];    
    $vendor_qry    =   "select * from vendor where user_id=$id";
    $vendor        =   mysqli_query($conn, $vendor_qry);
    $vendor_row    =   mysqli_fetch_assoc($vendor);
?>