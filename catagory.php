﻿<?php
include('db_con.php');
if(isset($_REQUEST['cat_name'])){
    $sql= "SELECT * FROM add_product WHERE categ_name='$_REQUEST[cat_name]'";
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
    <title>KmEmpire - ONL_SHOPPING || Product Category Page</title>
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
        <div class="back-button me-2"><a href="home.php"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Product Category</h6>
        </div>
        <!-- Filter Option-->
        <div class="filter-option ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaFilterOffcanvas" aria-controls="suhaFilterOffcanvas"><i class="ti ti-adjustments-horizontal"></i></div>
      </div>
    </div>
    <div class="offcanvas offcanvas-start suha-filter-offcanvas-wrap" tabindex="-1" id="suhaFilterOffcanvas" aria-labelledby="suhaFilterOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body py-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <!-- Catagory-->
              <div class="widget catagory mb-4">
                <h6 class="widget-title mb-2">Brand</h6>
                <div class="widget-desc">
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="zara" type="checkbox" checked="">
                    <label class="form-check-label" for="zara">Zara</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Gucci" type="checkbox">
                    <label class="form-check-label" for="Gucci">Gucci</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Addidas" type="checkbox">
                    <label class="form-check-label" for="Addidas">Addidas</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Nike" type="checkbox">
                    <label class="form-check-label" for="Nike">Nike</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Denim" type="checkbox">
                    <label class="form-check-label" for="Denim">Denim</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- Color-->
              <div class="widget color mb-4">
                <h6 class="widget-title mb-2">Color Family</h6>
                <div class="widget-desc">
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Purple" type="checkbox" checked="">
                    <label class="form-check-label" for="Purple">Purple</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Black" type="checkbox">
                    <label class="form-check-label" for="Black">Black</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="White" type="checkbox">
                    <label class="form-check-label" for="White">White</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Red" type="checkbox">
                    <label class="form-check-label" for="Red">Red</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Pink" type="checkbox">
                    <label class="form-check-label" for="Pink">Pink</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- Size-->
              <div class="widget size mb-4">
                <h6 class="widget-title mb-2">Size</h6>
                <div class="widget-desc">
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="XtraLarge" type="checkbox" checked="">
                    <label class="form-check-label" for="XtraLarge">Xtra Large</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Large" type="checkbox">
                    <label class="form-check-label" for="Large">Large</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="medium" type="checkbox">
                    <label class="form-check-label" for="medium">Medium</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="Small" type="checkbox">
                    <label class="form-check-label" for="Small">Small</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="ExtraSmall" type="checkbox">
                    <label class="form-check-label" for="ExtraSmall">Extra Small</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- Ratings-->
              <div class="widget ratings mb-4">
                <h6 class="widget-title mb-2">Ratings</h6>
                <div class="widget-desc">
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="5star" type="checkbox" checked="">
                    <label class="form-check-label" for="5star"><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i></label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="4star" type="checkbox">
                    <label class="form-check-label" for="4star"><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-secondary"></i></label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="3star" type="checkbox">
                    <label class="form-check-label" for="3star"><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-secondary"></i><i class="ti ti-star-filled text-secondary"></i></label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="2star" type="checkbox">
                    <label class="form-check-label" for="2star"><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-secondary"></i><i class="ti ti-star-filled text-secondary"></i><i class="ti ti-star-filled text-secondary"></i></label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="1star" type="checkbox">
                    <label class="form-check-label" for="1star"><i class="ti ti-star-filled text-warning"></i><i class="ti ti-star-filled text-secondary"></i><i class="ti ti-star-filled text-secondary"></i><i class="ti ti-star-filled text-secondary"></i><i class="ti ti-star-filled text-secondary"></i></label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- Payment Type-->
              <div class="widget payment-type mb-4">
                <h6 class="widget-title mb-2">Payment Type</h6>
                <div class="widget-desc">
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="cod" type="checkbox" checked="">
                    <label class="form-check-label" for="cod">Cash On Delivery</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="paypal" type="checkbox">
                    <label class="form-check-label" for="paypal">Paypal</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="checkpayment" type="checkbox">
                    <label class="form-check-label" for="checkpayment">Check Payment</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="payonner" type="checkbox">
                    <label class="form-check-label" for="payonner">Payonner</label>
                  </div>
                  <!-- Single Checkbox-->
                  <div class="form-check">
                    <input class="form-check-input" id="mobbanking" type="checkbox">
                    <label class="form-check-label" for="mobbanking">Mobile Banking</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- Price Range-->
              <div class="widget price-range mb-4">
                <h6 class="widget-title mb-2">Price Range</h6>
                <div class="widget-desc">
                  <!-- Min Value-->
                  <div class="row g-2">
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" id="floatingInput" type="text" placeholder="1" value="1">
                        <label for="floatingInput">Min</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" id="floatingInput" type="text" placeholder="1" value="5000">
                        <label for="floatingInput">Max</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- Apply Filter-->
              <div class="apply-filter-btn"><a class="btn btn-lg btn-success w-100" href="#">Apply Filter</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <!-- Catagory Banner-->
      <div class="pt-3">
        <div class="container">
          <div class="catagory-single-img" style="background-image: url('img/bg-img/5.jpg')"></div>
        </div>
      </div>
      <!-- Product Catagories-->
      <div class="product-catagories-wrapper py-3">
        <div class="container">
          <div class="section-heading rtl-text-right">
            <h6>Sub Category</h6>
          </div>
          <div class="product-catagory-wrap">
            <div class="row g-2 rtl-flex-d-row-r">
              <!-- Catagory Card -->
              <?php
                    include('db_con.php');
                    $sql= "SELECT * FROM sub_cat";
                    $result= mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) >0 ){
                    while($row= mysqli_fetch_array($result)){
                  ?>          
              <div class="col-3">
                <div class="card catagory-card">
                  <div class="card-body px-2"><a href="sub-catagory.php?subcat_name=<?php echo $row['subcat_name'];?>"><img src="admin_back_end/subcat_image/<?php echo $row['subcat_image'];?>" alt=""><span><?php echo $row['subcat_name'];?></span></a></div>
                </div>
              </div>
              <?php }}?>
            </div>
          </div>
        </div>
      </div>
      <!-- Top Products-->
      <div class="top-products-area pb-3">
        <div class="container">
          <div class="section-heading rtl-text-right">
            <h6>Products</h6>
          </div>
          <div class="row g-2 rtl-flex-d-row-r">
            <!-- Product Card -->
            <?php
                include('db_con.php');
                $sql= "SELECT * FROM add_product WHERE categ_name='$_REQUEST[cat_name]'";
                $result= mysqli_query($con, $sql);
                if (mysqli_num_rows($result) >0 ){
                while($row= mysqli_fetch_array($result)){
             ?>
            <div class="col-6 col-md-4">
              <div class="card product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge rounded-pill badge-warning"><?php echo $row['prod_disc'];?></span>
                  <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i class="ti ti-heart"></i></a>
                  <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><img class="mb-2" src="admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>" alt=""></a>
                  <!-- Product Title --><a class="product-title" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><?php echo $row['prod_name'];?></a>
                  <!-- Product Price -->
                  <p class="sale-price">&#8358;<?php echo number_format($row['prod_price'], 2);?><span><span>&#8358;<?php echo number_format($row['prod_oldprice'], 2);?></span></p>
                  <!-- Rating -->
                  <div class="product-rating"><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i></div>
                  <!-- Add to Cart --><a class="btn btn-primary btn-sm" href="#"><i class="ti ti-plus"></i></a>
                </div>
              </div>
            </div><?php }}?>
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