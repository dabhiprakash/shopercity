<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User Resort</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Shopercity add user restoraant">
	<meta name="keyword" content="Add new user resort">
	<!--[ Favicon]-->
	<link rel="icon" type="image/x-icon" href="../assets/images/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/images/logo.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../assets/images/logo.png">
	<!--[ Template main css file ]-->
	<link rel="stylesheet" href="assets/css/summernote.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<style>
		@font-face {
			font-family: "summernote";
			src: url("assets/fonts/summernoted41d.eot?#iefix") format("embedded-opentype"),
			url("assets/fonts/summernote.woff2") format("woff2"),
			url("assets/fonts/summernote.woff") format("woff"),
			url("assets/fonts/summernote.ttf") format("truetype");
		}
		.error {
			color: red;
		}
		.note-editable{
			height: 100vh;
		}
	</style>

</head>

<body data-theme="theme-PurpleHeart" class="svgstroke-a bg-gradient">
	<main class="container-fluid px-0">
		<!-- start: page menu link -->
		<?php 
			require_once('include/nav.php');
			require_once('db/add_restaurants_db.php');
		?>
		<div class="content">
			<!-- start: page header -->
			<?php require_once "include/header.php"; ?>
			<!-- start: page header area -->
			<div class="px-xl-5 px-lg-4 px-3 py-2 page-header">
				<ol class="breadcrumb mb-0 bg-transparent">
					<li class="breadcrumb-item"><a href="index.php" title="home">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page" title="Add Resort">Add Resort</li>
				</ol>
			</div>
			<!-- start: page body area -->
			<div class="px-xl-5 px-lg-4 px-3 py-3 page-body">

				<h3 class="fw-bold">Add Employees</h3>
				<div class="card p-4">
					<form class="row g-3" method="post" action="" enctype='multipart/form-data' id="add_vendor">
						<div class="col-lg-6 col-12">
							<label class="form-label text-muted">Enter Vendor Name</label>
							<input type="text" name="v_name" class="form-control form-control-lg" placeholder="" value="<?php if(!empty($vendor_row['name'])){echo $vendor_row['name']; } ?>">
						</div>
						<div class="col-lg-6 col-12">
							<label class="form-label text-muted">Enter Store Name</label>
							<input type="text" name="store_name" class="form-control form-control-lg" placeholder="" value="<?php if(!empty($vendor_row['store_name'])){echo $vendor_row['store_name']; } ?>">
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Subscription Plan</label>
							<select class="form-select form-control-lg" name="plan">
								<option value="1">Select plan</option>
								<?php 
									while($row   =   mysqli_fetch_assoc($subscription)){
								?>
									<option value="<?php echo $row['id']; ?>" <?php if(!empty($vendor_row['plan_id']) && $vendor_row['plan_id'] == $row['id']) {echo "selected";  }?>><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Enter Email Address</label>
							<input type="text" class="form-control form-control-lg" name="email" placeholder="" value="<?php if(!empty($vendor_row['email'])){echo$vendor_row['email'];} ?>">
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Street</label>
							<input type="text" class="form-control form-control-lg" name="street" value="<?php if(!empty($vendor_row['street'])){echo$vendor_row['street'];} ?>">
						</div>
						<div class="col-xl-3 col-lg-6 col-sm-6">
							<label  class="form-label text-muted">City</label>
							<select class="form-select form-control-lg" name="city">
								<?php 
									while($row   =   mysqli_fetch_assoc($city)){
								?>
									<option value="<?php echo $row['id']; ?>" <?php if(!empty($vendor_row['city_id']) && $row['id']	==  $vendor_row['city_id']){echo"selected";} ?>><?php echo $row['name'];?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">State</label>
							<select class="form-select form-control-lg" name="state">
							<?php 
									while($row   =   mysqli_fetch_assoc($state)){
								?>
									<option value="<?php echo $row['id']; ?>" <?php if(!empty($vendor_row['state_id']) && $row['id']	==  $vendor_row['state_id']){echo"selected";} ?>><?php echo $row['name'];?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Country</label>
							<select class="form-select form-control-lg" name="country">
							<?php 
									while($row   =   mysqli_fetch_assoc($country)){
								?>
									<option value="<?php echo $row['id']; ?>" <?php if(!empty($vendor_row['country_id']) && $row['id']	==  $vendor_row['country_id']){echo"selected";} ?>><?php echo $row['name'];?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Zipcode</label>
							<input type="number" class="form-control form-control-lg" placeholder="" name="zipcode" value="<?php if(!empty($vendor_row['zipcode'])){echo $vendor_row['zipcode'];} ?>">
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Contact</label>
							<input type="number" class="form-control form-control-lg" placeholder="" name="contact" value="<?php if(!empty($vendor_row['contact'])){echo $vendor_row['contact'];} ?>">
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Enter Latitude</label>
							<input type="number" class="form-control form-control-lg" placeholder="" name="lat" value="<?php if(!empty($vendor_row['lat'])){echo $vendor_row['lat'];} ?>">
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Enter Latitude</label>
							<input type="number" class="form-control form-control-lg" placeholder="" name="log" value="<?php if(!empty($vendor_row['longitude'])){echo $vendor_row['longitude'];} ?>">
						</div>
						<div class="col-xl-3 col-lg-6 col-sm-6">
							<label  class="form-label text-muted">Category</label>
							<select class="form-select form-control-lg" name="category">
								<?php 
									while($row   =   mysqli_fetch_assoc($category)){
								?>
									<option value="<?php echo $row['id']; ?>" <?php if(!empty($vendor_row['category_id']) && $row['id']	==  $vendor_row['category_id']){echo"selected";} ?>><?php echo $row['name'];?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="col-xl-3 col-lg-6 col-sm-6">
							<label  class="form-label text-muted">Discount</label>
							<select class="form-select form-control-lg" name="discount">
								<?php 
									while($row   =   mysqli_fetch_assoc($discount)){
								?>
									<option value="<?php echo $row['id']; ?>" <?php if(!empty($vendor_row['discount_id'])&& $row['id']	==  $vendor_row['discount_id']){echo"selected";} ?>><?php echo $row['name'];?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Social Media Link</label>
							<input type="text" class="form-control form-control-lg" name="link" placeholder="" value="<?php  if(!empty($vendor_row['youtube_link'])){echo $vendor_row['youtube_link'];} ?>">
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Delivery</label>
							<div class="row">
								<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
									<input type="radio" class="btn-check" value="1" name="delivery" id="btnradio1" <?php if(!empty($vendor_row['delivery_status']) && $vendor_row['delivery_status'] == 1 ){echo "checked"; }else if(!isset($vendor_row['delivery_status'])){echo "checked";}  ?>>
									<label class="btn btn-outline-primary" for="btnradio1">Yes</label>
								
									<input type="radio" class="btn-check" value="0" name="delivery" id="btnradio2" <?php if(!empty($vendor_row['delivery_status']) && $vendor_row['delivery_status'] == 0 ){echo "checked"; } ?>>
									<label class="btn btn-outline-primary" for="btnradio2" >No</label>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Starting Date</label>
							<input type="date" class="form-control form-control-lg" name="s_date" value="<?php if(!empty($vendor_row['starting_date'])){echo $vendor_row['starting_date'];} ?>" placeholder="">
						</div>
						<div class="col-xl-3 col-lg-4 col-md-6">
							<label class="form-label text-muted">Ending Date</label>
							<input type="date" class="form-control form-control-lg" name="e_date" placeholder="" value="<?php if(!empty($vendor_row['end_date'])){echo $vendor_row['end_date'];} ?>">
						</div>
						<div class="col-12 row">
							<div class="col-12 col-md-12 col-lg-6">
								<label class="col-form-label">Discount Description</label>
								<textarea class="summernote" name="desc_1"><?php if(!empty($vendor_row['desc_1'])){echo $vendor_row['desc_1'];} ?></textarea>
							</div>
							<div class="col-12 col-md-12 col-lg-6">
								<label class="col-form-label">Product Description</label>
								<textarea class="summernote" name="desc_2"><?php if(!empty($vendor_row['desc_2'])){echo $vendor_row['desc_2'];} ?></textarea>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<label class="form-label text-muted">Upload Banner </label>
							<div class="form-group">
								<input type="file" name="banner" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<label class="form-label text-muted">Upload Image</label>
							<div class="form-group">
								<input type="file" name="image" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<?php
								if(!empty($vendor_row['banner'])){
							?>
							<img src="<?php echo URL.'vendor/banner/'.$vendor_row['banner']; ?>" class="w-25 rounded" alt="" srcset="">
							<?php
								}
							?>
						</div>
						<div class="col-lg-6 col-12">
							<?php
								if(!empty($vendor_row['image'])){
							?>
							<img src="<?php echo URL.'vendor/profile/'.$vendor_row['image']; ?>" class="w-25 rounded" alt="" srcset="">
							<?php
								}
							?>
						</div>					
						<div class="col-12">
							<button type="submit" name="add" class="btn btn-primary">Submit</button>
						</div>
					</form><!-- Row End -->
				</div>

			</div>
		</div>

	</main>

	<!--[ hotelair template vender js ]-->
	<script src="assets/bundles/libscripts.bundle.js"></script>
	<script src="assets/bundles/summernote.bundle.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    
	<!-- Template page js -->
	<script src="assets/js/main.js"></script>
	<script>
		$(document).ready(function() {
			$('.summernote').summernote();
			var noteBar = $('.note-toolbar');
			noteBar.find('[data-toggle]').each(function() {
				$(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
			});
		});

		$(document).ready(function () {
            // Initialize the jQuery Validation Plugin
            $("#add_vendor").validate({
				rules: {
                    // Category
                    category: {
                        required: true
                    },
                    // Vendor Name
                    v_name: {
                        required: true,
                        minlength: 3
                    },
                    // Store Name
                    store_name: {
                        required: true,
                        minlength: 3
                    },
                    // Contact Number (validate number format)
                    contact: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    // Email
                    email: {
                        required: true,
                        email: true
                    },
                    // Street
                    street: {
                        required: true
                    },
                    // City
                    city: {
                        required: true
                    },
                    // State
                    state: {
                        required: true
                    },
                    // Country
                    country: {
                        required: true
                    },
                    // Zipcode (validate number format)
                    zipcode: {
                        required: true,
                        digits: true,
                        minlength: 5,
                        maxlength: 10
                    },
                    // Latitude (validate number format)
                    lat: {
                        required: true,
                        number: true
                    },
                    // Longitude (validate number format)
                    log: {
                        required: true,
                        number: true
                    },
                    // Plan
                    plan: {
                        required: true
                    },
                    // Description 1
                    desc_1: {
                        required: true,
                        minlength: 5
                    },
                    // Description 2 (optional)
                    desc_2: {
                        minlength: 5
                    },
                    // Discount (ensure number is not negative)
                    discount: {
                        required: true,
                        min: 0
                    },
                    // Delivery (if checked, must be true)
                    delivery: {
                        required: false // No validation needed for checkbox if it's optional
                    },
                    // Link (URL format)
                    link: {
                        url: true
                    },
                    // Starting Date
                    s_date: {
                        required: true,
                        date: true
                    },
                    // End Date
                    e_date: {
                        required: true,
                        date: true,
                        // greaterThan: "#s_date" // Custom rule to ensure end date is after start date
                    },
					banner: {
						<?php if (empty($vendor_row['banner'])) { ?>
							required: true,
						<?php } ?>
						extension: "jpg|jpeg|png|gif", // File types
						filesize: 5242880 // Max file size: 5MB
					},
					// Image Validation (File type and size)
					image: {
						<?php if (empty($vendor_row['image'])) { ?>
							required: true,
						<?php } ?>
						extension: "jpg|jpeg|png|gif", // File types
						filesize: 5242880 // Max file size: 5MB
					}

                },
                messages: {
                    category: {
                        required: "Please select a category"
                    },
                    v_name: {
                        required: "Please enter vendor name",
                        minlength: "Vendor name must be at least 3 characters long"
                    },
                    store_name: {
                        required: "Please enter store name",
                        minlength: "Store name must be at least 3 characters long"
                    },
                    contact: {
                        required: "Please enter your contact number",
                        digits: "Please enter a valid phone number",
                        minlength: "Phone number must be at least 10 digits",
                        maxlength: "Phone number must be at most 15 digits"
                    },
                    email: {
                        required: "Please enter a valid email address",
                        email: "Please enter a valid email address"
                    },
                    street: {
                        required: "Please enter your street address"
                    },
                    city: {
                        required: "Please enter your city"
                    },
                    state: {
                        required: "Please enter your state"
                    },
                    country: {
                        required: "Please enter your country"
                    },
                    zipcode: {
                        required: "Please enter your zipcode",
                        digits: "Zipcode must be a number",
                        minlength: "Zipcode must be at least 5 digits",
                        maxlength: "Zipcode can be at most 10 digits"
                    },
                    lat: {
                        required: "Please enter latitude",
                        number: "Latitude must be a number"
                    },
                    log: {
                        required: "Please enter longitude",
                        number: "Longitude must be a number"
                    },
                    plan: {
                        required: "Please enter plan details"
                    },
                    desc_1: {
                        required: "Please provide a description",
                        minlength: "Description must be at least 5 characters long"
                    },
                    desc_2: {
                        minlength: "Description must be at least 5 characters long"
                    },
                    discount: {
                        required: "Please enter discount",
                        min: "Discount cannot be negative"
                    },
                    link: {
                        url: "Please enter a valid URL"
                    },
                    s_date: {
                        required: "Please select a starting date",
                        date: "Please enter a valid date"
                    },
                    e_date: {
                        required: "Please select an end date",
                        date: "Please enter a valid date",
                        greaterThan: "End date must be later than the starting date"
                    },
					// Banner file (Validate image)
					banner: {
                        required: "Please upload a banner image",
                        extension: "Allowed file types: jpg, jpeg, png, gif",
                        filesize: "File size must be less than 5MB"
                    },
                    image: {
                        required: "Please upload an image",
                        extension: "Allowed file types: jpg, jpeg, png, gif",
                        filesize: "File size must be less than 5MB"
                    }
                },
                submitHandler: function(form) {
                    // If the form is valid, submit the form (optional)
                    form.submit();
                }
            });

            // Custom validation rule to check that end date is later than the start date
            $.validator.addMethod("greaterThan", function(value, element, param) {
                var startDate = $(param).val();
                return new Date(value) > new Date(startDate);
            }, "End date must be after the start date.");
			 // Custom validation for file extension (using the extension rule)
			 $.validator.addMethod("extension", function(value, element, param) {
                var fileName = value.toLowerCase();
                return this.optional(element) || fileName.match(new RegExp("\\.(" + param + ")$"));
            }, "Invalid file type.");
        });

	</script>
</body>
</html>