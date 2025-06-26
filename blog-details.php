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
if(isset($_REQUEST['blog_uin'])){
    $sql= "SELECT * FROM blog WHERE blog_uin='$_REQUEST[blog_uin]'";
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
    <title>Suha - Multipurpose Ecommerce Mobile HTML Template</title>
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
        <div class="back-button me-2"><a href="blog-grid.php"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">  
          <h6 class="mb-0">Blog Details</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php');?>
      <div class="blog-details-post-thumbnail" style="background-image: url('admin_back_end/blog_image1/<?php echo $row['blog_image1'];?>'); background-size: contain; background-position: center center; background-repeat: no-repeat;">
        <div class="container">
          <div class="post-bookmark-wrap">
            <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="ti ti-bookmark"></i></a>
          </div>
        </div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3 dir-rtl">
          <div class="container">
            <h5 class="post-title"><?php echo $row['blog_header'];?></h5><a class="post-catagory mb-3 d-block"><?php echo $row['blogcateg_name'];?></a>
            <div class="post-meta-data d-flex align-items-center justify-content-between"><a class="d-flex align-items-center">Uploaded By<span><?php echo $row['blog_upload'];?></span></a><span class="d-flex align-items-center">
            <svg class="bi bi-calendar me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg>
<?php echo date('jS-F-Y',strtotime($row['date']));?></span></div>
          </div>
        </div>
        <div class="post-content bg-white py-3 mb-3 dir-rtl">
          <div class="container">
          <p><?php echo $row['blog_detail'];?></p>
          </div>
        </div>
        <!-- All Comments-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3 dir-rtl">
          <div class="container">
          <?php
              include('db_con.php');                                    
              $sql = "SELECT COUNT( * ) AS total_comm FROM blog_comm WHERE blog_uin='$_REQUEST[blog_uin]'";
              $result = mysqli_query($con, $sql);
               while($row= mysqli_fetch_array($result)){
              ?>
            <h6>Comments <span>(<?php echo $row['total_comm'];?>)</span></h6>
            <?php }?>
            <h6 id="ratings-reviews-heading" style="cursor: pointer;">
  Show Reviews
  <span id="dropdown-arrow" style="font-size: 16px; margin-left: 10px;">&#9660;</span>
</h6>

<div id="rating-review-container" class="rating-review-content" style="display: none;">
  <ul class="ps-0">
    <?php
      include('db_con.php');
      $sql = "SELECT * FROM blog_comm WHERE blog_uin='$_REQUEST[blog_uin]'";
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
    ?>
    <li class="single-user-review d-flex">
      <div class="user-thumbnail mt-0">
        <img src="passport/<?php echo $session_passport?>" alt="">
      </div>
      <div class="rating-comment">
        <p class="comment mb-0"><?php echo $row['name']; ?></p>
        <strong><p class="comment mb-0"><?php echo $row['comment']; ?></p></strong>
        <p class="comment mb-0"><?php echo date('jS-F-Y', strtotime($row['time'])); ?></p>
      </div>
    </li>
    <?php }} ?>
  </ul>
</div>

<!-- JavaScript to toggle the reviews display and arrow rotation -->
<script>
  document.getElementById('ratings-reviews-heading').addEventListener('click', function() {
    var reviewContainer = document.getElementById('rating-review-container');
    var arrow = document.getElementById('dropdown-arrow');
    
    if (reviewContainer.style.display === 'none' || reviewContainer.style.display === '') {
      reviewContainer.style.display = 'block';  // Show the reviews
      arrow.innerHTML = '&#9650;';  // Change arrow to up
    } else {
      reviewContainer.style.display = 'none';  // Hide the reviews
      arrow.innerHTML = '&#9660;';  // Change arrow to down
    }
  });
</script>
  
        <!-- Comment Form-->
        <div class="ratings-submit-form bg-white py-3 dir-rtl">
          <div class="container">
            <h6>Submit A Comment</h6>
            <form method="post">
            <?php
              include('db_con.php');
              if(isset($_REQUEST['submit'])){
              $blog_uin=trim(addslashes($_REQUEST["blog_uin"]));
              $name=trim(addslashes($_REQUEST["name"]));
              $comment=trim(addslashes($_REQUEST["comment"]));

              if (!empty($blog_uin) && !empty($name) && !empty($comment)) {

              $sql="INSERT INTO blog_comm(blog_uin, `name`, comment) VALUES ('$blog_uin','$name','$comment')";

              mysqli_query($con,$sql) or die (mysqli_error($con));
              $num=mysqli_insert_id($con);
              if(mysqli_affected_rows($con)!=1){
              $message="Error inserting record into database";
              }
              echo "<script>location.href='blog-details.php?blog_uin=$blog_uin'</script>";
              }else {
              echo "All fields are required!";
              }}
              ?>
              <div class="mb-3">
                <input type="hidden" name="blog_uin" id="" value="<?php echo $_REQUEST['blog_uin'];?>">
              </div>
              <div class="mb-3" hidden>
                <input type="text" name="name" id="" value="<?php echo $session_username;?>">
              </div>
              <div class="mb-3">
                <textarea class="form-control" id="comments" name="comment" cols="30" rows="10" data-max-length="500" placeholder="Write your comment..."></textarea>
              </div>
              <button class="btn btn-primary" type="submit" name="submit">Post Comment</button>
            </form>
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