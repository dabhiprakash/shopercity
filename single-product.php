<?php
$vendor_id = "";
require_once "db/connection.php";
$row = "";
if (isset($_GET['shop_id'])) {
	$vendor_id = $_GET['shop_id'];
	$qry = "select * from vendor where id='$vendor_id'";
	$res = mysqli_query($conn, $qry);
	$row = mysqli_fetch_assoc($res);
	if(empty($row)){
		header('Location:index.php');
	}
	$descount_id = $row['discount_id'];
	$qry1 = "select * from discount where id='$descount_id'";
	$res1 = mysqli_query($conn, $qry1);
	$row1 = mysqli_fetch_assoc($res1);
	// print_r($row1);
	// die;
} else {
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	require_once "include/header_script.php";
	?>
	<style>
	.owl-stage{
		display: flex; align-items: center;
		}
	</style>
</head>

<body>
	<div class="page-wrapper">
		<?php
		require_once "include/header.php";
		?>
		<main class="main mt-8 single-product">
			<div class="page-content mb-10 pb-6">
				<div class="container">
					<div class="product product-single row mb-8">
						<div class="col-md-6">
							<div class="product-gallery pg-vertical">
								<div
									class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
									<figure class="product-image">
										<img src="vendor/profile/<?php echo $row['image']; ?>"
											data-zoom-image="images/product/product-2-1-800x900.jpg"
											alt="Women's Brown Leather Backpacks" width="800" height="900">
									</figure>
									<figure class="product-image">
										<img src="vendor/banner/<?php echo$row['banner']; ?>"
											data-zoom-image="images/product/product-2-1-800x900.jpg"
											alt="Women's Brown Leather Backpacks" width="800" height="900">
									</figure>
								</div>
							</div>
						</div>
						<div class="col-md-6 sticky-sidebar-wrapper">
							<div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">
								<div class="product-navigation">
									<ul class="breadcrumb breadcrumb-lg">
										<li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
										<li><a href="javascript:void();" class="active">Vendor</a></li>
										<li>
											<?php echo $row['store_name']; ?>
										</li>
									</ul>
								</div>
								<h1 class="product-name">
									<?php echo $row['store_name']; ?>
								</h1>
								<div class="product-meta">
									ADDRESS:<p class="product-sku"><?php echo $row['street']; ?>, 
									<?php 
									if($row['city_id']){
											$qry = "SELECT name FROM city WHERE id =" . $row['city_id'] . "";
											$res = mysqli_query($conn, $qry);
											$city = mysqli_fetch_array($res);
											echo $city['name'].','; 
									}
									if($row['state_id']){
											$qry = "SELECT name FROM state WHERE id =" . $row['state_id'] . "";
											$res = mysqli_query($conn, $qry);
											$state = mysqli_fetch_array($res); 
											echo $state['name'];
									}
									echo '-'.$row['zipcode'];
									?>
								</p>
									
								</div>
								<a href="tel:<?php echo $row['contact'];?>" class="product-meta">
									<i class="d-icon-phone"></i> <span class="product-brand"><?php echo $row['contact']; ?></span>
								</a>
								<div class="product-meta">
									<p><?php echo $row1['name']; ?></p>
									<?php echo $row['desc_1']; ?>
								</div>
								<?php
								if ($_SESSION['is_active'] == 1) {
									?>
								<div class="product-meta">
									<div>SHARE: <a href="javascript:void(0)" id="shareButton"><img  src="images/icons/share-icon.png" width="25" class="ml-2"></a></div>
								</div>
								<?php } ?>
								<!-- <p class="product-short-desc">
								</p> -->
								<hr class="product-divider">
							</div>
						</div>
					</div>
					<div class="tab tab-nav-simple product-tabs mb-4">
						<ul class="nav nav-tabs justify-content-center" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#product-tab-description">Product Or Services</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active in" id="product-tab-description">
								<div class="row mt-12">
									<div class="col-md-12">
										<?php echo $row['desc_2']; ?>
										<!-- <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5> -->
										<!-- <h5 class="description-title mb-3 font-weight-semi-bold ls-m">Specifications </h5> -->
										<div class="mt-4"></div>
										
									</div>
								</div>
							</div>
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
	require_once "include/footer_script.php"
		?>
	<script>
		document.getElementById('shareButton').addEventListener('click', function() {
		  if (navigator.share) {
			navigator.share({
			  title: 'Shoppercity',
			  text: 'Check out this awesome website!',
			  url: "https://shopercity.com/login.php"
			})
			.then(() => console.log('Successfully shared'))
			.catch((error) => console.log('Error sharing:', error));
		  } else {
			console.log('Web Share API is not supported.');
		  }
		});
	</script>
</body>

</html>