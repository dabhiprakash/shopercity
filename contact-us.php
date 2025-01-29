<!DOCTYPE html>
<html lang="en">
<head>
   <?php
        require_once "include/header_script.php";
        require_once "contact_db.php";
   ?>
   <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
</head>

<body class="contact-us">
    <div class="page-wrapper">
    <?php
        require_once "include/header.php";
    ?>

        <main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </nav>
            <div class="page-header" style="background-image: url(images/page-header/contact-us.jpg)">
                <h1 class="page-title font-weight-bold text-capitalize ls-l">Contact Us</h1>
            </div>
            <div class="page-content mt-10 pt-7">
                <section class="contact-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 ls-m mb-4">
                                <div class="grey-section d-flex align-items-center h-100">
                                    <div>
                                        <h4 class="mb-2 text-capitalize">Address</h4>
                                        <p>Vasana, Ahmedabad - 380051</p>
                                        <h4 class="mb-2 text-capitalize">Phone Number</h4>
                                        <p>
                                            <a href="tel:9265744500">+91 92657 44500</a><br>
                                            <a href="tel:9909503062">+91 99095 03062</a>
                                        </p>
                                        <h4 class="mb-2 text-capitalize">Support</h4>
                                        <p class="mb-4">
                                            <a href="mailtp:shopercity2020@gmail.com"><span class="__cf_email__">shopercity2020@gmail.com</span></a><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-6 d-flex align-items-center mb-4">
                                <div class="w-100">
                                    <form class="pl-lg-2" action="" data-parsley-validate method="post">
                                        <h4 class="ls-m font-weight-bold">Let’s Connect</h4>
                                        <p>Your email address will not be published. Required fields are
                                            marked *</p>
                                        <div class="row mb-2">
                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="text" data-parsley-trigger="change"  name="bissness_name" placeholder="Bissness Name *" required>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="email" data-parsley-trigger="change"  name="email" placeholder="Email *" required>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="number" data-parsley-trigger="change" name="mobile_number"  placeholder="Mobile Number *" required>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <input class="form-control" type="text" data-parsley-trigger="change"  name="city" placeholder="city *" required>
                                            </div>

                                            <div class="col-12 mb-4">
                                                <textarea class="form-control" required data-parsley-trigger="change"  name="note" placeholder="Comment*"></textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-dark btn-rounded" type="submit" name="add">Submit<i
                                                class="d-icon-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- <section class="store-section mt-6 pt-10 pb-8">
                    <div class="container">
                        <h2 class="title title-center mb-7 text-normal">Our store</h2>
                        <div class="row cols-sm-2 cols-lg-4">
                            <div class="store">
                                <figure class="banner-radius">
                                    <img src="images/subpages/store-1.jpg" alt="store" width="280" height="280">
                                    <h4 class="overlay-visible">New York</h4>
                                    <div class="overlay overlay-transparent">
                                        <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                                data-cfemail="224f434b4e624c47555b4d5049504b4d464751564d50470c414d4f">shopercity2020@gmail.com</span></a>
                                        <a href="tel:#">Phone: +919909503062</a>
                                        <div class="social-links mt-1">
                                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                            <div class="store">
                                <figure class="banner-radius">
                                    <img src="images/subpages/store-2.jpg" alt="store" width="280" height="280">
                                    <h4 class="overlay-visible">London</h4>
                                    <div class="overlay overlay-transparent">
                                        <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                                data-cfemail="4b262a22270b2724252f24253922242f2e383f24392e65282426">[email&#160;protected]</span></a>
                                        <a href="tel:#">Phone: (123) 456-7890</a>
                                        <div class="social-links mt-1">
                                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                            <div class="store">
                                <figure class="banner-radius">
                                    <img src="images/subpages/store-3.jpg" alt="store" width="280" height="280">
                                    <h4 class="overlay-visible">Oslo</h4>
                                    <div class="overlay overlay-transparent">
                                        <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                                data-cfemail="680509010428071b04071a01070c0d1b1c071a0d460b0705">[email&#160;protected]</span></a>
                                        <a href="tel:#">Phone: (123) 456-7890</a>
                                        <div class="social-links mt-1">
                                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                            <div class="store">
                                <figure class="banner-radius">
                                    <img src="images/subpages/store-4.jpg" alt="store" width="280" height="280">
                                    <h4 class="overlay-visible">Stockholm</h4>
                                    <div class="overlay overlay-transparent">
                                        <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                                data-cfemail="2b464a42476b585f444840434447465942444f4e585f44594e05484446">[email&#160;protected]</span></a>
                                        <a href="tel:#">Phone: (123) 456-7890</a>
                                        <div class="social-links mt-1">
                                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </section> -->


                <!-- <div class="grey-section google-map" id="googlemaps" style="height: 386px"></div> -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script>

        var mapMarkers = [{
            address: "New York, NY 10017",
            html: "<strong>New York Office<\/strong><br>New York, NY 10017",
            popup: true
        }];

        // Map Initial Location
        var initLatitude = 40.75198;
        var initLongitude = -73.96978;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: !window.Riode.isMobile,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 11
        };
        var map = $('#googlemaps').gMap(mapSettings);
        // Map text-center At
        var mapCenterAt = function (options, e) {
            e.preventDefault();
            $('#googlemaps').gMap("centerAt", options);
        }

    </script>
</body>
</html>