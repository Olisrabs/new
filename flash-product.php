<?php
include('session.php'); 
include('db_con.php');
$id = 1;
$sql="SELECT * FROM user WHERE id='$id'";
$result=mysqli_query($con,$sql)or die(mysqli_error($con));
$rows=mysqli_fetch_array($result);
?>

<?php
 include('db_con.php');
 if(isset($_REQUEST['prod_uin'])){
    $sql= "SELECT * FROM add_product WHERE prod_uin='$_REQUEST[prod_uin]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
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
    <title>KmEmpire - ONL_SHOPPING || Product Details Page</title>
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
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
        <!-- Back Button-->
        <div class="back-button me-2"><a href="shop-grid.php"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Product Details</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php')?>
    <?php
 include('db_con.php');
 if(isset($_REQUEST['prod_uin'])){
    $sql= "SELECT * FROM add_product WHERE prod_uin='$_REQUEST[prod_uin]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
?>
    <div class="page-content-wrapper">
      <div class="product-slide-wrapper">
        <!-- Product Slides-->
        <div class="product-slides owl-carousel">
          <!-- Single Hero Slide-->
          <div class="blog-details-post-thumbnail" style="background-image: url('admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>'); background-size: contain; background-position: center center; background-repeat: no-repeat;"></div>
          <!-- Single Hero Slide-->
          <div class="blog-details-post-thumbnail" style="background-image: url('admin_back_end/prod_image/<?php echo $row['prod_image'];?>'); background-size: contain; background-position: center center; background-repeat: no-repeat;"></div>
        </div>
        <!-- Video Button-->
         <!-- <a class="video-btn shadow-sm" id="singleProductVideoBtn" href="https://www.youtube.com/watch?v=lFGvqvPh5jI"><i class="ti ti-player-play"></i></a> -->
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container d-flex justify-content-between rtl-flex-d-row-r">
            <div class="p-title-price">
              <h5 class="mb-1"><?php echo $row['prod_name'];?></h5>
              <p class="sale-price mb-0 lh-1">&#8358;<?php echo number_format($row['prod_price'], 2);?><span>&#8358;<?php echo number_format($row['prod_oldprice'], 2);?></span></p>
            </div>
            <div class="p-wishlist-share">
            <form method="post">
            <?php
include("db_con.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Generate unique cart ID
$rand = rand(1000, 9999);
$today = date('dmyHis');
$CTID = $rand . $today;

if (isset($_REQUEST['addtowishlist'])) {
    // Get form data
    $user_id = $_REQUEST['user_id'];
    $cart_uin = $_REQUEST['cart_uin'];
    $prod_uin = $_REQUEST['prod_uin']; // Ensure the product UIN is passed correctly
    $prod_name = $_REQUEST['prod_name']; // Get product name from the request
    $prod_price = $_REQUEST['prod_price']; // Get product price from the request
    $prod_oldprice = $_REQUEST['prod_oldprice']; // Get the old price
    $prod_disc = $_REQUEST['prod_disc']; // Get product discount
    $size = $_REQUEST['size'];
    $color = $_REQUEST['color'];
    $quantity = (int)$_REQUEST['quant']; // Ensure quantity is an integer
    $init_quant = (int)$_REQUEST['quant2']; // Ensure quantity is an integer
    $total = $prod_price * $quantity;
    $prod_quant = $row['prod_quant'];
    $totaladd_quant = $prod_quant - $quantity;
    $status = 'Available';
    $prod_image1 = $_REQUEST['prod_image1']; // Get product image

    // Check for duplicate product in the cart
    $checkQuery = "SELECT * FROM cart WHERE prod_uin = '$prod_uin' AND prod_name = '$prod_name' AND `status` = 'Pending'";
    $checkResult = mysqli_query($con, $checkQuery);
    $checkRows = mysqli_num_rows($checkResult);

    if ($checkRows > 0) {
        echo "<script>alert('Product already in wishlist');</script>";
        echo "<script>window.location.href = 'wishlist-grid.php';</script>";
    } else {
      $sql="INSERT INTO cart (user_id, cart_uin, prod_uin, prod_name, prod_price, prod_oldprice, prod_disc, `size`, color, init_quant, quantity, total, `status`, prod_image1, `date`) VALUES ('$user_id','$cart_uin','$prod_uin','$prod_name','$prod_price','$prod_oldprice','$prod_disc','$size','$color','$init_quant','$quantity','$total','$status','$prod_image1',CURDATE())";
     
      $sql2 = "UPDATE add_product SET prod_quant='$totaladd_quant' WHERE prod_uin='$_REQUEST[prod_uin]'";

        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
        if($result && $result2){
      echo "<script>alert('Item successfully added to wishlist!')</script>";				
      echo "<script>window.open('wishlist-grid.php','_self')</script>";
      }
      }}
?>

              <input type="hidden" name="cart_uin" id="" value="<?php echo $CTID;?>">
              <input type="hidden" name="user_id" id="" value="<?php echo $session_user_id;?>">
              <input type="hidden" name="prod_name" id="" value="<?php echo $row['prod_name'];?>">
              <input type="hidden" name="prod_price" id="" value="<?php echo $row['prod_price'];?>">
              <input type="hidden" name="prod_oldprice" id="" value="<?php echo $row['prod_oldprice'];?>">
              <input type="hidden" name="prod_disc" id="" value="<?php echo $row['prod_disc'];?>">
              <!-- Single Radio Input-->
              <div class="form-check mb-0 me-2" hidden>
                  <input class="form-check-input" id="sizeRadio1" type="radio" name="size" Value="Small" checked="">
                  <label class="form-check-label" for="sizeRadio1">S</label>
              </div>
              <!-- Single Radio Input-->
              <div class="form-check mb-0" hidden>
                  <input class="form-check-input blue" id="colorRadio1" type="radio" Value="Blue" name="color" checked="">
                  <label class="form-check-label" for="colorRadio1"></label>
              </div>
              <input type="hidden" name="prod_image1" id="" value="<?php echo $row['prod_image1'];?>">
              <input class="form-control cart-quantity-input" type="hidden" step="1" name="quant" value="1">
              <input class="form-control cart-quantity-input" type="hidden" step="1" name="quant2" value="1">
            <button type="submit" name="addtowishlist" title="Wishlist" class="btn btn-danger ms-3"><i class="ti ti-heart"></i></button>
            </div>
              </form>
          </div>
          <!-- Ratings-->
          <!-- <div class="product-ratings">
            <div class="container d-flex align-items-center justify-content-between rtl-flex-d-row-r">
              <div class="ratings"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><span class="ps-1">3 ratings</span></div>
              <div class="total-result-of-ratings"><span>5.0</span><span>Very Good                                </span></div>
            </div>
          </div> -->
        </div>
        <!-- Flash Sale Panel-->
        <div class="flash-sale-panel bg-white mb-3 py-3">
          <div class="container">
            <!-- Sales Offer Content-->
            <div class="sales-offer-content d-flex align-items-end justify-content-between">
              <!-- Sales End-->
              <div class="sales-end">
                <p class="mb-1 font-weight-bold"><i class="ti ti-bolt-lightning lni-flashing-effect text-danger"></i>Available Quantity</p>
              </div>
              <!-- Sales Volume-->
              <div class="sales-volume text-end">
                <strong><p class="mb-1 font-weight-bold"><?php echo $row['prod_quant'];?> Left</p></strong>
                <div class="progress" style="height: 0.375rem;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 82%;" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flash-sale-panel bg-white mb-3 py-3">
          <div class="container">
            <!-- Sales Offer Content-->
            <div class="sales-offer-content d-flex align-items-end justify-content-between">
              <!-- Sales End-->
              <div class="sales-end">
                <p class="mb-1 font-weight-bold"><i class="ti ti-bolt-lightning lni-flashing-effect text-danger"></i> Flash sale end in</p>
                <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->
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

    <script>
    // Pass PHP expiry status to JavaScript
    let flashSalesExpired = <?php echo $flashSalesExpired ? 'true' : 'false'; ?>;

    if (flashSalesExpired) {
        // If Flash Sales have expired, hide the section
        document.getElementById("flash-sales-section").style.display = "none";
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
            }
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        window.onload = updateCountdown;
    }
    </script>
<?php else : ?>
    <script>
        // If Flash Sales expired, hide the section
        document.addEventListener("DOMContentLoaded", function() {
            let flashSalesSection = document.getElementById("flash-sales-section");
            if (flashSalesSection) {
                flashSalesSection.style.display = "none";
            }
        });
    </script>
<?php endif; ?>
              </div>
              <!-- Sales Volume-->
              <div class="sales-volume text-end">
                <p class="mb-1 font-weight-bold">(Only for flash sales products)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form method="post">
        <?php
include("db_con.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Generate unique cart ID
$rand = rand(1000, 9999);
$today = date('dmyHis');
$CTID = $rand . $today;

if (isset($_REQUEST['addtocart'])) {
    // Get form data
    $user_id = $_REQUEST['user_id'];
    $cart_uin = $_REQUEST['cart_uin'];
    $prod_uin = $_REQUEST['prod_uin']; // Ensure the product UIN is passed correctly
    $prod_name = $_REQUEST['prod_name']; // Get product name from the request
    $prod_price = $_REQUEST['prod_price']; // Get product price from the request
    $prod_oldprice = $_REQUEST['prod_oldprice']; // Get the old price
    $prod_disc = $_REQUEST['prod_disc']; // Get product discount
    $size = implode(',', $_REQUEST['size']);
    $color = implode(',', $_REQUEST['color']);
    $quantity = (int)$_REQUEST['quantity']; // Ensure quantity is an integer
    $total = $prod_price * $quantity;
    $prod_quant = $row['prod_quant'];
    $totaladd_quant = $prod_quant - $quantity;
    $status = 'Pending';
    $prod_image1 = $_REQUEST['prod_image1']; // Get product image

    if ($prod_quant <= 0) {
      echo "<script>alert('Product already out of stock');</script>";
    } 
    elseif($quantity > $prod_quant) {
      echo "<script>alert('Quantity picked not in store');</script>";
    } 
    else{
    // Check for duplicate product in the cart
    $checkQuery = "SELECT * FROM cart WHERE prod_uin = '$prod_uin' AND prod_name = '$prod_name' AND `status` = 'Pending'";
    $checkResult = mysqli_query($con, $checkQuery);
    $checkRows = mysqli_num_rows($checkResult);

    if ($checkRows > 0) {
        echo "<script>alert('Product already in cart');</script>";
        echo "<script>window.location.href = 'cart.php';</script>";
    } else {
      $sql="INSERT INTO cart (user_id, cart_uin, prod_uin, prod_name, prod_price, prod_oldprice, prod_disc, `size`, color, init_quant, quantity, total, `status`, prod_image1, `date`) VALUES ('$user_id','$cart_uin','$prod_uin','$prod_name','$prod_price','$prod_oldprice','$prod_disc','$size','$color','$quantity','$quantity','$total','$status','$prod_image1',CURDATE())";

      mysqli_query($con,$sql) or die (mysqli_error($con));
      $num=mysqli_insert_id($con);
      if(mysqli_affected_rows($con)!=1){
      $messagereg="Error inserting record into database";
      }
      else{
        $sql2 = "UPDATE add_product SET prod_quant='$totaladd_quant' WHERE prod_uin='$_REQUEST[prod_uin]'";
        }
        $result = mysqli_query($con, $sql2);
        if($result){
      echo "<script>alert('Item successfully added to cart!')</script>";				
      echo "<script>window.open('cart.php','_self')</script>";
      }
      }}};
?>

              <input type="hidden" name="cart_uin" id="" value="<?php echo $CTID;?>">
              <input type="hidden" name="user_id" id="" value="<?php echo $session_user_id;?>">
              <input type="hidden" name="prod_name" id="" value="<?php echo $row['prod_name'];?>">
              <input type="hidden" name="prod_price" id="" value="<?php echo $row['prod_price'];?>">
              <input type="hidden" name="prod_oldprice" id="" value="<?php echo $row['prod_oldprice'];?>">
              <input type="hidden" name="prod_disc" id="" value="<?php echo $row['prod_disc'];?>">
              <input type="hidden" name="prod_image1" id="" value="<?php echo $row['prod_image1'];?>">
        <!-- Selection Panel-->
        <div class="selection-panel bg-white mb-3 py-3">
          <div class="container d-flex align-items-center justify-content-between">
            <!-- Choose Color-->
            <div class="choose-color-wrapper">
              <p class="mb-1 font-weight-bold">Color</p>
              <div class="choose-color-radio d-flex align-items-center">
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input blue" id="colorRadio1" type="radio" Value="Blue" name="color[]" checked="">
                  <label class="form-check-label" for="colorRadio1"></label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input yellow" id="colorRadio2" type="radio" Value="Yellow" name="color[]">
                  <label class="form-check-label" for="colorRadio2"></label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input white" id="colorRadio4" type="radio" Value="White" name="color[]" style="color: whitesmoke;">
                  <label class="form-check-label" for="colorRadio4" style="color: whitesmoke;"></label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input green" id="colorRadio3" type="radio" Value="Green" name="color[]">
                  <label class="form-check-label" for="colorRadio3"></label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0">
                  <input class="form-check-input purple" id="colorRadio4" type="radio" Value="Red" name="color[]">
                  <label class="form-check-label" for="colorRadio4"></label>
                </div>
              </div>
            </div>
            <!-- Choose Size-->
            <div class="choose-size-wrapper text-end">
              <p class="mb-1 font-weight-bold">Size</p>
              <div class="choose-size-radio d-flex align-items-center">
                <!-- Single Radio Input-->
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio1" type="radio" name="size[]" Value="Small" checked="">
                  <label class="form-check-label" for="sizeRadio1">S</label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio2" type="radio" name="size[]" Value="Medium">
                  <label class="form-check-label" for="sizeRadio2">M</label>
                </div>
                <!-- Single Radio Input-->
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio3" type="radio" name="size[]" Value="Large">
                  <label class="form-check-label" for="sizeRadio3">L</label>
                </div>
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio3" type="radio" name="size[]" Value="Extra-Large">
                  <label class="form-check-label" for="sizeRadio3">XL</label>
                </div>
                <div class="form-check mb-0 me-2">
                  <input class="form-check-input" id="sizeRadio3" type="radio" name="size[]" Value="Double-Extra-Large">
                  <label class="form-check-label" for="sizeRadio3">2XL</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
          <div class="container">
            <div class="cart-form">
              <div class="order-plus-minus d-flex align-items-center">
                <div class="quantity-button-handler">-</div>
                <input class="form-control cart-quantity-input" type="text" step="1" name="quantity" value="1">
                <div class="quantity-button-handler">+</div>
              </div>
              <button class="btn btn-primary ms-3 ti ti-shopping-cart" type="submit" name="addtocart" title="Add To Cart">Add To Cart</button>
          </div>
        </div>
        </form></span>
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
          <div class="container">
            <h6>Specifications</h6>
            <p><?php echo $row['spec'];?></p>
          </div>
        </div>
        <!-- Product Video -->
        <div class="bg-img" style="background-image: url(img/product/18.jpg)">
          <div class="container">
            <div class="video-cta-content d-flex align-items-center justify-content-center">
              <div class="video-text text-center">
                <h4 class="mb-4">Summer Clothing</h4><a class="btn btn-primary rounded-circle" id="videoButton" href="https://www.youtube.com/watch?v=lFGvqvPh5jI"><i class="ti ti-player-play"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="pb-3"></div>
        <!-- Related Products Slides-->
        <div class="related-product-wrapper bg-white py-3 mb-3">
          <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between rtl-flex-d-row-r">
              <h6>Related Products</h6>
            </div>
            <div class="related-product-slide owl-carousel">
            <?php
                    include('db_con.php');
                    $sql= "SELECT * FROM add_product WHERE related='Added' ORDER by id DESC LIMIT 0, 7";
                    $result= mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) >0 ){
                    while($row= mysqli_fetch_array($result)){
                  ?>         
              <div class="card product-card bg-gray shadow-none">
                <div class="card-body">
                  <!-- Badge--><span class="badge rounded-pill badge-warning"><?php echo $row['prod_disc'];?></span>
                  <!-- Thumbnail --><a class="product-thumbnail d-block"><img class="mb-2" src="admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>" alt="Img">
                    <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                  </a>
                  <!-- Product Title --><a class="product-title" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><?php echo $row['prod_name'];?></a>
                  <!-- Product Price -->
                  <p class="sale-price"><?php echo $row['prod_price'];?><span><?php echo $row['prod_oldprice'];?></span></p>
                  <!-- Rating -->
                  <div class="product-rating"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i></div>
                  <!-- Add to Cart --><a class="btn btn-primary btn-sm" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><i class="ti ti-arrow-right" title="View product details"></i></a>
                </div>
                
              </div>
              <?php }};?> 
            </div>
          </div>
        </div>
        <!-- Rating & Review Wrapper -->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3 dir-rtl">
          <div class="container">
          <?php
              include('db_con.php');                                    
              $sql = "SELECT COUNT( * ) AS total_comm FROM prod_comm WHERE prod_uin='$_REQUEST[prod_uin]'";
              $result = mysqli_query($con, $sql);
               while($row= mysqli_fetch_array($result)){
              ?>
            <h6>Comments <span>(<?php echo $row['total_comm'];?>)</span></h6>
            <?php }?>
            <h6>Ratings &amp; Reviews</h6>
            <div class="rating-review-content">
              <ul class="ps-0">
                <!-- Single User Review -->
                <?php
                                          include('db_con.php');
                                          $sql= "SELECT * FROM prod_comm WHERE prod_uin='$_REQUEST[prod_uin]'";
                                          $result= mysqli_query($con, $sql);
                                          if (mysqli_num_rows($result) >0 ){
                                          while($row= mysqli_fetch_array($result)){
                                        ?>
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail"><img src="img/bg-img/7.jpg" alt=""></div>
                  <div class="rating-comment">
                    <div class="rating"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i></div>
                    <p class="comment mb-0"><?php echo $row['comment'];?></p><span class="name-date"><?php echo date('jS-F-Y',strtotime($row['time']));?></span>
                  </div>
                </li>
                <?php }}?>
              </ul>
            </div>
          </div>
        </div>
        <!-- Ratings Submit Form-->
        <div class="ratings-submit-form bg-white py-3 dir-rtl">
          <div class="container">
            <h6>Submit A Review</h6>
            <form method="post">
            <?php
              include('db_con.php');
              if(isset($_REQUEST['save'])){
              $prod_uin=trim(addslashes($_REQUEST["prod_uin"]));
              $name=trim(addslashes($_REQUEST["name"]));
              $comment=trim(addslashes($_REQUEST["comment"]));

              if (!empty($prod_uin) && !empty($name) && !empty($comment)) {

              $sql="INSERT INTO prod_comm(prod_uin, `name`, comment) VALUES ('$prod_uin','$name','$comment')";

              mysqli_query($con,$sql) or die (mysqli_error($con));
              $num=mysqli_insert_id($con);
              if(mysqli_affected_rows($con)!=1){
              $message="Error inserting record into database";
              }
              echo "<script>alert ('Your comment has been submitted!')
              location.href='single-product.php?prod_uin=$prod_uin'</script>";
              }else {
              echo "All fields are required!";
              }}
              ?>
              <div class="stars mb-3">
                <input class="star-1" type="radio" name="star" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="star" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="star" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="star" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="star" id="star5">
                <label class="star-5" for="star5"></label><span></span>
              </div>
              <div class="mb-3" hidden>
                <input type="text" name="prod_uin" id="" value="<?php echo $_REQUEST['prod_uin'];?>">
              </div>
              <div class="mb-3" hidden>
                <input type="text" name="name" id="" value="<?php echo $session_username;?>">
              </div>
              <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10" data-max-length="500" placeholder="Write your review..."></textarea>
              <button class="btn btn-primary" type="submit" name="save">Save Review</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php include('footer_bar.php')?>
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