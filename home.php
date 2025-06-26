<?php
include('session.php'); 
include('db_con.php');
$id = 1;
$sql="SELECT * FROM user WHERE id='$id'";
$result=mysqli_query($con,$sql)or die(mysqli_error($con));
$rows=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#625AFA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>KmEmpire - ONL_SHOPPING || Home Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tabler-icons.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only"></div>
      </div>
    </div>
     <!-- Header Area -->
     <?php include('navbar.php');?>
  <?php include('sidebar.php')?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Greeting Message</title>
    <style>
        /* Styles for the modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 9999; /* Ensure it appears on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Darker background */
            padding-top: 100px;
        }

        /* Modal content */
        .modal-content {
            background-color: #f4f7f6;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 50%;  /* Control the width */
            max-width: 600px;
            text-align: center;
            font-family: 'Arial', sans-serif;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        /* Styling for the greeting text */
        .greeting-message {
            font-size: 18px;
            color: #333;
            line-height: 1.5;
        }

        .greeting-time {
            font-weight: 300;
            color: #007BFF;
            font-size: 15px;
        }

        /* Button to close the modal */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- The Modal -->
    <div id="greetingModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="greetingMessage"></p>
        </div>
    </div>

    <script type="text/javascript">
        // Check if the greeting has already been shown in this session
        if (!sessionStorage.getItem("greetingShown")) {
            const now = new Date();
            const hour = now.getHours();
            const period = hour >= 12 ? 'PM' : 'AM';
            const formattedHour = hour % 12 || 12;
            const min = now.getMinutes().toString().padStart(2, '0'); // Ensures two-digit minutes
            // Get the current time in local format
            const currentTime = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            let greetingMessage = "Dear <strong><?php echo $session_fullname;?></strong>, <span class='greeting-time'>Welcome to KmEmpire - Online Shopping</span>. "; 

            // Set time-based greeting
            if (hour >= 0 && hour < 12) {
                greetingMessage += "GOOD MORNING!!!";
            } else if (hour >= 12 && hour < 16) {
                greetingMessage += "GOOD AFTERNOON!!!";
            } else if (hour >= 16 && hour < 19) {
                greetingMessage += "GOOD EVENING!!!";
            } else {
                greetingMessage += "GOOD NIGHT!!!";
            }

            // Display greeting in the modal
            document.getElementById("greetingMessage").innerHTML = greetingMessage;

            // Show the modal
            const modal = document.getElementById("greetingModal");
            modal.style.display = "block";

            // Close the modal when the user clicks on the "X" button
            const closeButton = document.getElementsByClassName("close")[0];
            closeButton.onclick = function() {
                modal.style.display = "none";
            }

            // Set a flag in sessionStorage to prevent further alerts in this session
            sessionStorage.setItem("greetingShown", "true");
        }
    </script>

</body>
</html>

    <!-- PWA Install Alert -->
    <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
      <div class="toast-body">
        <div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
          <h6 class="mb-0">Add to Home Screen</h6>
          <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div><span class="mb-0 d-block">Click the<strong class="mx-1">Add to Home Screen</strong>button &amp; enjoy it like a regular app.</span>
      </div>
    </div>
    <div class="page-content-wrapper">
      <!-- Search Form-->
      <!-- Search Form-->
      <div class="container">
        <div class="search-form pt-3 rtl-flex-d-row-r">
          <form action="#" method="">
            <input class="form-control" type="search" placeholder="Search in Suha">
            <button type="submit"><i class="ti ti-search"></i></button>
          </form>
          <!-- Alternative Search Options -->
          <div class="alternative-search-options">
            <div class="dropdown"><a class="btn btn-primary dropdown-toggle" id="altSearchOption" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-adjustments-horizontal"></i></a>
              <!-- Dropdown Menu -->
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="altSearchOption">
                <li><a class="dropdown-item" href="#"><i class="ti ti-microphone"> </i>Voice</a></li>
                <li><a class="dropdown-item" href="#"><i class="ti ti-layout-collage"> </i>Image</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Hero Wrapper -->
      <div class="hero-wrapper">
        <div class="container">
          <div class="pt-3">
            <!-- Hero Slides-->
            <div class="hero-slides owl-carousel">
              <!-- Single Hero Slide-->
              <div class="single-hero-slide" style="background-image: url('assets/images/banner/2.png')">
                <div class="slide-content h-100 d-flex align-items-center">
                  <div class="slide-text">
                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms"></h4>
                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms"></p><a class="btn btn-primary" href="shop-grid.php" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms" style="margin-top: 150px;">Shop Now</a>
                  </div>
                </div>
              </div>
              <!-- Single Hero Slide-->
              <div class="single-hero-slide" style="background-image: url('img/bg-img/2.jpg')">
                <div class="slide-content h-100 d-flex align-items-center">
                  <div class="slide-text">
                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Light Candle</h4>
                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">Now only &#8358;7,000</p><a class="btn btn-primary" href="shop-grid.php" data-animation="fadeInUp" data-delay="500ms" data-duration="1000ms">Shop Now</a>
                  </div>
                </div>
              </div>
              <!-- Single Hero Slide-->
              <div class="single-hero-slide" style="background-image: url('img/bg-img/3.jpg')">
                <div class="slide-content h-100 d-flex align-items-center">
                  <div class="slide-text">
                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Fancy Chair</h4>
                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3 years warranty</p><a class="btn btn-primary" href="shop-grid.php" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Product Catagories -->
      <div class="product-catagories-wrapper py-3">
        <div class="container">
          <div class="row g-2 rtl-flex-d-row-r">
            <!-- Catagory Card -->
            <?php
                    include('db_con.php');
                    $sql= "SELECT * FROM addnew_cat";
                    $result= mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) >0 ){
                    while($row= mysqli_fetch_array($result)){
                  ?>          
            <div class="col-3">
              <div class="card catagory-card">
                <div class="card-body px-2"><a href="catagory.php?cat_name=<?php echo $row['cat_name'];?>"><img src="admin_back_end/cat_image/<?php echo $row['cat_image'];?>" alt="img"><span><?php echo $row['cat_name'];?></span></a></div>
              </div>
            </div>
            <?php }}?>
          </div>
        </div>
      </div>
      <!-- Flash Sale Slide -->
      <div class="flash-sale-wrapper">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between rtl-flex-d-row-r">
            <h6 class="d-flex align-items-center rtl-flex-d-row-r"><i class="ti ti-bolt-lightning me-1 text-danger lni-flashing-effect"></i>Flash Sales</h6>
            <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
            <?php
include('db_con.php'); // Ensure this file correctly establishes a MySQLi connection

try {
    // Prepare the SQL query to get the latest expiry_date
    $stmt = $con->prepare("SELECT expiry_date FROM add_product WHERE prod_sec = 'Flash Sales' ORDER BY expiry_date DESC LIMIT 1");

    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    // Execute the query
    $stmt->execute();

    // Bind result
    $stmt->bind_result($targetDate);

    // Fetch the result
    if (!$stmt->fetch()) {
        // If no data is found, use a fallback value
        $targetDate = '2025-02-19 14:21:59';
    }

    // Close the statement
    $stmt->close();

    // Convert expiry date to timestamp for validation
    $expiryTimestamp = strtotime($targetDate);
    $currentTimestamp = time();

    // If the Flash Sales has expired, set a flag
    $flashSalesExpired = $currentTimestamp > $expiryTimestamp;

} catch (Exception $e) {
    // Log the error and display a user-friendly message
    error_log("Database error: " . $e->getMessage());
    die("Something went wrong. Please try again later.");
}

// Output the target date for debugging (optional)
echo "<script>console.log('flashSalesExpired: " . json_encode($flashSalesExpired) . "');</script>";
?>

<?php if (!$flashSalesExpired) : ?>
    <div id="flash-sales-section">
        <h2 hidden>Flash Sales</h2>
        <ul class="sales-end-timer ps-0 d-flex align-items-center rtl-flex-d-row-r">
            <li><span class="days">00</span> Days</li>
            <li><span class="hours">00</span> Hours</li>
            <li><span class="minutes">00</span> Minutes</li>
            <li><span class="seconds">00</span> Seconds</li>
        </ul>
        <!-- Flash sales products go here -->
    </div>
    <a class="btn btn-sm btn-light" href="flash-sale.php">View all<i class="ms-1 ti ti-arrow-right"></i></a>
    <script>
    // Pass PHP expiry status to JavaScript
    let flashSalesExpired = <?php echo $flashSalesExpired ? 'true' : 'false'; ?>;

    if (flashSalesExpired) {
        // If Flash Sales have expired, hide the section and the "View all" button
        document.getElementById("flash-sales-section").style.display = "none";
        document.querySelector(".btn-light").style.display = "none"; // Hide the "View all" button
    } else {
        // Countdown logic only if Flash Sales haven't expired
        let countdownDate = new Date("<?php echo $targetDate; ?>").getTime();

        function updateCountdown() {
            let now = new Date().getTime();
            let timeLeft = countdownDate - now;

            if (timeLeft > 0) {
                let days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                let hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                document.querySelector(".days").innerText = days;
                document.querySelector(".hours").innerText = hours;
                document.querySelector(".minutes").innerText = minutes;
                document.querySelector(".seconds").innerText = seconds;
            } else {
                document.querySelector(".sales-end-timer").innerHTML = "<li>Time's up!</li>";
                document.getElementById("flash-sales-section").style.display = "none"; // Hide Flash Sales
                document.querySelector(".btn-light").style.display = "none"; // Hide the "View all" button
                
                // Make the products section inaccessible by disabling clicks and making it visually disabled
                let flashSalesProducts = document.querySelector("#flash-sales-section");
                flashSalesProducts.style.pointerEvents = "none"; // Disable interaction
                flashSalesProducts.style.opacity = "0.5"; // Make it visually appear disabled
            }
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        window.onload = updateCountdown;
    }
</script>
<?php else : ?>
    <script>
        // If Flash Sales expired, hide the section and disable interactions
        document.addEventListener("DOMContentLoaded", function() {
            let flashSalesSection = document.getElementById("flash-sales-section");
            if (flashSalesSection) {
                flashSalesSection.style.display = "none"; // Hide the Flash Sales section
            }
        });
    </script>
<?php endif; ?>
          </div>
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">
            <!-- Flash Sale Card -->
            <?php
                    include('db_con.php');
                    $sql= "SELECT * FROM add_product WHERE prod_sec='Flash Sales' ORDER by id DESC LIMIT 0, 6";
                    $result= mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) >0 ){
                    while($row= mysqli_fetch_array($result)){
                  ?>        
            <div class="card flash-sale-card">
              <div class="card-body"><a href="flash-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><img src="admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>" alt=""><span class="product-title"><?php echo $row['prod_name'];?></span>
                  <p class="sale-price">&#8358;<?php echo number_format($row['prod_price'], 2);?><span class="real-price">&#8358;<?php echo number_format($row['prod_oldprice'], 2);?></span></p><span class="progress-title"><?php echo $row['prod_quant'];?> Left </span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
            <?php
            }}?>
          </div>
        </div>
      </div>
      <!-- Dark Mode -->
      <div class="container">
        <div class="dark-mode-wrapper mt-3 bg-img p-4 p-lg-5">
          <p class="text-white">You can change your display to a dark background using a dark mode.</p>
          <div class="form-check form-switch mb-0">
            <label class="form-check-label text-white h6 mb-0" for="darkSwitch">Switch to Dark Mode</label>
            <input class="form-check-input" id="darkSwitch" type="checkbox" role="switch">
          </div>
        </div>
      </div>
      <!-- Top Products -->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>New Arrivals</h6><a class="btn btn-sm btn-light" href="shop-grid.php">View all<i class="ms-1 ti ti-arrow-right"></i></a>
          </div>
          <div class="row g-2">  
            <!-- Product Card -->
            <?php
                    include('db_con.php');
                    $sql= "SELECT * FROM add_product WHERE prod_sec='New Arrivals' ORDER by id DESC LIMIT 0, 6";
                    $result= mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) >0 ){
                    while($row= mysqli_fetch_array($result)){
                  ?>          
            <div class="col-6 col-md-4">
              <div class="card product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge rounded-pill badge-danger"><?php echo $row['prod_disc'];?></span>
                  <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i class="ti ti-heart"></i></a>
                  <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><img class="mb-2" src="admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>" alt="Img"></a>
                  <!-- Product Title --><a class="product-title" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><?php echo $row['prod_name'];?></a>
                  <!-- Product Price -->
                  <p class="sale-price">&#8358;<?php echo number_format($row['prod_price'], 2);?><span>&#8358;<?php echo number_format($row['prod_oldprice'], 2);?></span></p>
                  <!-- Rating -->
                  <div class="product-rating"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i></div>
                  <!-- Add to Cart --><a class="btn btn-primary btn-sm" href="#"><i class="ti ti-plus"></i></a>
                </div>
              </div>
            </div>
            <?php }}?>  
            <!-- Product Card -->
            
          </div>
        </div>
      </div>
      <!-- CTA Area -->
      <div class="container">
        <div class="cta-text dir-rtl p-4 p-lg-5">
          <div class="row">
            <div class="col-9">
              <h5 class="text-white">20% discount on women's care items.</h5><a class="btn btn-primary" href="shop-grid.php">Grab this offer</a>
            </div>
          </div><img src="img/bg-img/make-up.png" alt="">
        </div>
      </div>
      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Weekly Best Sellers</h6><a class="btn btn-sm btn-light" href="shop-grid2.php">
               View all<i class="ms-1 ti ti-arrow-right"></i></a>
          </div>
         <div class="row g-2">
  <!-- Weekly Product Card -->
  <?php
    include('db_con.php');
    $sql = "SELECT * FROM add_product WHERE best_selling = 'Best Sale' ORDER BY id DESC LIMIT 6";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $prod_uin = $row['prod_uin'];

        // Get comment count for this product
        $comm_sql = "SELECT COUNT(*) AS total_comm FROM prod_comm WHERE prod_uin = ?";
        $stmt = mysqli_prepare($con, $comm_sql);
        mysqli_stmt_bind_param($stmt, "s", $prod_uin);
        mysqli_stmt_execute($stmt);
        $comm_result = mysqli_stmt_get_result($stmt);
        $comm_row = mysqli_fetch_assoc($comm_result);
        $total_comments = $comm_row['total_comm'];
  ?>
  <div class="col-12">
    <div class="card horizontal-product-card">
      <div class="d-flex align-items-center">
        <div class="product-thumbnail-side">
          <!-- Thumbnail -->
          <a class="product-thumbnail d-block" href="single-product.php?prod_uin=<?php echo $prod_uin; ?>">
            <img src="admin_back_end/prod_image1/<?php echo $row['prod_image1']; ?>" alt="">
          </a>
        </div>
        <div class="product-description">
          <!-- Product Title -->
          <a class="product-title d-block" href="single-product.php?prod_uin=<?php echo $prod_uin; ?>">
            <?php echo $row['prod_name']; ?>
          </a>
          <!-- Price -->
          <p class="sale-price">
            <i class="ti ti-currency-dollar"></i>&#8358;<?php echo number_format($row['prod_price'], 2); ?>
            <span>&#8358;<?php echo number_format($row['prod_oldprice'], 2); ?></span>
          </p>
          <!-- Rating -->
          <div class="product-rating">
            <i class="ti ti-star-filled"></i>4.88
            <span class="ms-1">(<?php echo $total_comments; ?> Reviews)</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
      } // end while
    } // end if
  ?>
</div>
      <!-- Discount Coupon Card-->
      <div class="container">
        <div class="discount-coupon-card p-4 p-lg-5 dir-rtl">
          <div class="d-flex align-items-center">
            <div class="discountIcon"><img class="w-100" src="img/core-img/discount.png" alt=""></div>
            <div class="text-content">
              <h5 class="text-white mb-2">Get 20% discount!</h5>
              <p class="text-white mb-0">To get discount, enter the<span class="px-1 fw-bold">GET20</span>code on the checkout page.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Featured Products Wrapper-->
      <div class="featured-products-wrapper py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Recommended Products</h6><a class="btn btn-sm btn-light" href="recommended-products.php">View all<i class="ms-1 ti ti-arrow-right"></i></a>
          </div>
          <div class="row g-2">
            <!-- Featured Product Card-->
            <?php
                    include('db_con.php');
                    $sql= "SELECT * FROM add_product WHERE prod_sec='Recommended Products' ORDER by id DESC LIMIT 0, 6";
                    $result= mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) >0 ){
                    while($row= mysqli_fetch_array($result)){
                  ?>          
            <div class="col-4">
              <div class="card featured-product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge badge-warning custom-badge"><i class="ti ti-star-filled"></i></span>
                  <div class="product-thumbnail-side">
                    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><img src="admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>" alt=""></a>
                  </div>
                  <div class="product-description">
                    <!-- Product Title --><a class="product-title d-block" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><?php echo $row['prod_name'];?></a>
                    <!-- Price -->
                    <p class="sale-price">&#8358;<?php echo number_format($row['prod_price'], 2);?><span>&#8358;<?php echo number_format($row['prod_oldprice'], 2);?></span></p>
                  </div>
                </div>
              </div>
            </div>
            <?php }}?>
            </div>
          </div>
        </div>
      </div>
      <div class="pb-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Collections</h6>
            <!-- <a class="btn btn-sm btn-light" href="#">
               View all<i class="ms-1 ti ti-arrow-right"></i></a> -->
          </div>
          <!-- Collection Slide-->
          <div class="collection-slide owl-carousel">
            <!-- Collection Card-->
            <div class="card collection-card"><img src="img/product/17.jpg" alt="">
              <div class="collection-title"><span>Women</span><span class="badge bg-danger">9</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><img src="img/product/19.jpg" alt="">
              <div class="collection-title"><span>Men</span><span class="badge bg-danger">29</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><img src="img/product/21.jpg" alt="">
              <div class="collection-title"><span>Kids</span><span class="badge bg-danger">4</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><img src="img/product/22.jpg" alt="">
              <div class="collection-title"><span>Gadget</span><span class="badge bg-danger">11</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><img src="img/product/23.jpg" alt="">
              <div class="collection-title"><span>Foods</span><span class="badge bg-danger">2</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><img src="img/product/24.jpg" alt="">
              <div class="collection-title"><span>Sports</span><span class="badge bg-danger">5</span></div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- Elfsight AI Chatbot | Online support  -->
<script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-7b0c5371-ad4c-48ba-9b71-c63738ecdfe7" data-elfsight-app-lazy></div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php include('footer_bar.php');?>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/theme-switching.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
  </body>
</html>