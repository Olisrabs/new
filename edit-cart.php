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
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM cart WHERE id='$_REQUEST[id]'";
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
    <title>KmEmpire - ONL_SHOPPING || Edit Category Page</title>
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
  <?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM cart WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
?>
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
          <h6 class="mb-0">Edit Cart Product</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php');?>
    <div class="page-content-wrapper">
      <div class="product-slide-wrapper">
        <!-- Product Slides-->
        <div class="product-slides owl-carousel">
          <!-- Single Hero Slide-->
          <div class="blog-details-post-thumbnail" style="background-image: url('admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>'); background-size: contain; background-position: center center; background-repeat: no-repeat;"></div>
          <!-- Single Hero Slide-->
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
        <form method="post">
            <?php
               include("db_con.php");
               error_reporting(E_ALL);
               $rand=rand(1000, 9999);
               $today=date('dmyHis');
               $CTID=$rand.$today; 
                if(isset($_REQUEST["updatecart"])){
                  $user_id = $_REQUEST['user_id'];
                  $cart_uin = $_REQUEST['cart_uin'];
                  $prod_name = $row['prod_name'];
                  $prod_price = $row['prod_price'];
                  $prod_oldprice = $row['prod_oldprice'];
                  $color = implode(',', $_REQUEST["color"]);
                  $size = implode(',', $_REQUEST["size"]);
                  $quantity = $_REQUEST['quantity'];
                  $total=$prod_price * $quantity;
                  $status='Pending';
                  $prod_image1=$row['prod_image1'];
                // $date = date("Y-m-d");
                                    
                  $sql="UPDATE cart SET color='$color', `size`='$size', init_quant='$quantity', quantity='$quantity', total='$total', `status`='$status', prod_image1='$prod_image1', `date`=CURDATE() WHERE id='$_REQUEST[id]'";

                  mysqli_query($con,$sql);
                  echo "<script>alert('Item successfully updated!')</script>";				
                  echo "<script>window.open('cart.php','_self')</script>";
                  }
              ?>
              <input type="hidden" name="cart_uin" id="" value="<?php echo $CTID;?>">
              <input type="hidden" name="user_id" id="" value="<?php echo $session_user_id;?>">
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
                <input class="form-control cart-quantity-input" type="text" step="1" name="quantity" value="<?php echo $row['quantity'];?>">
                <div class="quantity-button-handler">+</div>
              </div>
              <button class="btn btn-primary ms-3" type="submit" name="updatecart">Update Cart</button>
            </form>
          </div>
        </div><br>
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
        
      </div>
    </div>
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