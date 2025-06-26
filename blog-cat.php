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
if(isset($_REQUEST['blogcat_name'])){
    $sql= "SELECT * FROM blog WHERE blogcateg_name='$_REQUEST[blogcat_name]'";
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
    <title>KmEmpire - ONL_SHOPPING || Blog List Page</title>
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
          <h6 class="mb-0">Category</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php')?>
    <div class="page-content-wrapper">
      <!-- Blog List -->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between rtl-flex-d-row-r">
            <h6>Blog category</h6>
            <!-- Layout Options-->
            <div class="layout-options"><a class="active" href="blog-list.php"><i class="ti ti-list-check"></i></a></div>
          </div>
          <div class="row g-2 rtl-flex-d-row-r">
            <!-- Single Blog Card-->
            <?php
              include('db_con.php');
              $sql= "SELECT * FROM blog WHERE blogcateg_name='$_REQUEST[blogcat_name]' ORDER by id DESC";
              $result= mysqli_query($con, $sql);
              if (mysqli_num_rows($result) >0 ){
              while($row= mysqli_fetch_array($result)){
            ?>
            <div class="col-12 col-md-6">
              <div class="card blog-card list-card">
                <!-- Post Image-->
                <div class="post-img"><img src="admin_back_end/blog_image1/<?php echo $row['blog_image1'];?>" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="ti ti-bookmark"></i></a>
                <!-- Read More Button--><a class="btn btn-primary btn-sm read-more-btn" href="blog-details.php?blog_uin=<?php echo $row['blog_uin'];?>">Read More</a>
                <!-- Post Content-->
                <div class="post-content">
                  <div class="bg-shapes">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                  </div>
                  <!-- Post Catagory--><a class="post-catagory d-block"><?php echo $row['blogcateg_name'];?></a>
                  <!-- Post Title--><a class="post-title" href="blog-details.php?blog_uin=<?php echo $row['blog_uin'];?>"><?php echo $row['blog_header'];?></a>
                  <!-- Post Meta-->
                  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap"><a href="#"><i class="ti ti-user"></i></i><?php echo $row['blog_upload'];?></a><span><i class="ti ti-calender"></i></span></div>
                </div>
              </div>
            </div>
            <?php }}?>
        <div class="container">
          <div class="section-heading pt-3 rtl-text-right">
            <h6>Read by category</h6>
          </div>
          <div class="row g-2 rtl-flex-d-row-r">
            <!-- Single Catagory-->
            <?php
              include('db_con.php');
              $sql= "SELECT * FROM blog_cat ORDER by id DESC";
              $result= mysqli_query($con, $sql);
              if (mysqli_num_rows($result) >0 ){
              while($row= mysqli_fetch_array($result)){
            ?>
            <div class="col-4">
              <div class="card blog-catagory-card">
                <div class="card-body"><a href="blog-cat.php?blogcat_name=<?php echo $row['blogcat_name'];?>"><i class="ti ti-category"></i><span class="d-block"><?php echo $row['blogcat_name'];?></span></a></div>
              </div>
            </div>
            <?php }}?>
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