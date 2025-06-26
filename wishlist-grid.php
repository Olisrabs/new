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
    <title>KmEmpire - ONL_SHOPPING || Wishlist Page</title>
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
          <h6 class="mb-0">Wishlist</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php')?>
    <div class="page-content-wrapper">
      <div class="py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between rtl-flex-d-row-r">
            <h6>Wishlist Items</h6>
            <!-- Layout Options -->
            <div class="layout-options"><a class="active" href="wishlist-grid.php"><i class="ti ti-border-all"></i></a><a href="wishlist-list.php?user_id=<?php echo $session_user_id;?>"><i class="ti ti-list-check"></i></a></div>
          </div>
          <div class="row g-2 rtl-flex-d-row-r">
            <!-- Product Card -->
            <?php
                                          include('db_con.php');
                                          $sql = "SELECT * FROM cart WHERE `status`='Available' AND user_id='$session_user_id' ORDER BY id DESC";
                                          $result= mysqli_query($con, $sql);
                                          if (mysqli_num_rows($result) >0 ){
                                          while($row= mysqli_fetch_array($result)){
                                        ?>
            <div class="col-6 col-md-4">
              <div class="card product-card">
                <div class="card-body">
                  <!-- Badge--><span class="badge rounded-pill badge-warning"><?php echo $row['prod_disc'];?></span>
                  <!-- Delete Button--><a class="delete-btn" href="delete_wishlist.php?id=<?php echo $row['id'];?>"><i class="ti ti-trash" title="Delete Wishlist"></i></a>
                  <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><img class="mb-2" src="admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>" alt=""></a>
                  <!-- Product Title --><a class="product-title" href="single-product.php?prod_uin=<?php echo $row['prod_uin'];?>"><?php echo $row['prod_name'];?></a>
                  <!-- Product Price -->
                  <p class="sale-price">&#8358;<?php echo number_format($row['prod_price'], 2);?><span>&#8358;<?php echo number_format($row['prod_oldprice'], 2);?></span></p>
                  <!-- Rating -->
                  <div class="product-rating" ><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i></div>
                  <!-- Add to Cart --><a class="btn btn-primary btn-sm" href="move_cart.php?id=<?php echo $row['id'];?>"><i class="ti ti-plus" title="Add to cart"></i></a>
                </div>
              </div>
            </div>
            <?php
            }}?>
            <!-- Select All Products-->
            <div class="col-12">
              <form method="post">
            <?php
               include("db_con.php");
               error_reporting(E_ALL);
                if(isset($_REQUEST["addall"])){
								$user_id = $_REQUEST['user_id'];
                $cart_uin = $_REQUEST['cart_uin'];
                $prod_uin = $row['prod_uin'];
                $prod_name = $row['prod_name'];
                $prod_price = $row['prod_price'];
                $prod_disc = $row['prod_disc'];
                $prod_oldprice = $row['prod_oldprice'];
                $color = implode(',', $_REQUEST["color"]);
                $size = implode(',', $_REQUEST["size"]);
                $quantity = $_REQUEST['quant'];
                $total=$prod_price * $quantity;
                $status='Available';
                $prod_image1=$row['prod_image1'];
                $spec=$row['spec'];
                // $date = date("Y-m-d");
                                        
                $sql="UPDATE cart SET `status`='Pending'";
                if(mysqli_query($con, $sql)){
                echo "<script>alert('Item successfully added to cart!')</script>";				
                echo "<script>window.open('cart.php','_self')</script>";
                }
                }
              ?>
              <div class="select-all-products-btn mt-2"><button type="submit" class="btn btn-primary btn-lg w-100" name="addall"><i class="ti ti-circle-check me-1 h6"></i>Add all items to cart</button></div>
              </form>
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