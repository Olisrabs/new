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
 if(isset($_REQUEST['cart_uin'])){
    $sql= "SELECT * FROM bill_details WHERE cart_uin='$_REQUEST[cart_uin]'";
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
    <title>KmEmpire - ONL_SHOPPING || Product Return Page</title>
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
        <div class="back-button me-2 me-2"><a href="dashboard.php?user_id=<?php echo $session_user_id;?>"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Return Products</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php')?>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
                <div class="change-user-thumb">  
                   
                </div>
              </div>
              <div class="user-info">
                <p class="mb-0 text-white"><?php echo $session_username;?></p>
                <h5 class="mb-0 text-white"><?php echo $session_fullname;?></h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
            <form method="post">
            <?php
                                                            include('db_con.php');
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['submit'])){
                                                            $cart_uin=trim(addslashes($_REQUEST["cart_uin"]));
                                                            $user_id=trim(addslashes($_REQUEST["user_id"]));
                                                            $order_id=trim(addslashes($_REQUEST["order_id"]));
                                                            $prod_name=trim(addslashes($_REQUEST["prod_name"]));
                                                            $size=trim(addslashes($_REQUEST["size"]));
                                                            $color=trim(addslashes($_REQUEST["color"]));
                                                            $quantity=trim(addslashes($_REQUEST["quantity"]));
                                                            $quant=trim(addslashes($_REQUEST["quant"]));
                                                            $prod_price=trim(addslashes($_REQUEST["prod_price"]));
                                                            $total=trim(addslashes($_REQUEST["total"]));
                                                            $ref_amt=trim(addslashes($_REQUEST["ref_amt"]));
                                                            $bank=trim(addslashes($_REQUEST["bank"]));
                                                            $acc_numb=trim(addslashes($_REQUEST["acc_numb"]));
                                                            $reason=trim(addslashes($_REQUEST["reason"]));
                                                            $sub_quan = $quantity - $quant;
                                                            $sub_quantity = $quant * $prod_price;
                                                            $sub_total = $total - $sub_quantity;
                                                            $status = 'Returned';

                                                            if($quant > $quantity) {
                                                              echo "<script>alert('Quantity picked is more than quantity ordered!. Please pick a lower quantity.');
                                                              location.href='return_goods.php?cart_uin=$cart_uin'
                                                              </script>";
                                                            } 
                                                            else{

                                                            $sql="UPDATE cart SET quantity='$sub_quan', bank='$bank', acc_numb='$acc_numb', total='$sub_total', ref_amt='$ref_amt', reason='$reason', `status`='$status', ret_paystat='Processing', `date`=CURDATE() WHERE cart_uin='$_REQUEST[cart_uin]'";
 
                                                            $sql2="UPDATE bill_details SET quantity='$sub_quan', bank='$bank', acc_numb='$acc_numb', total='$sub_total', ref_amt='$ref_amt', reason='$reason', `order_stat`='$status',
                                                            ret_paystat='Processing', `date`=CURDATE() WHERE cart_uin='$_REQUEST[cart_uin]'";

                                                            $result=mysqli_query($con, $sql);
                                                            $result2=mysqli_query($con, $sql2);
                                                           
                                                            if($result && $result2){
                                                            echo "<script>alert ('Record has been successfully submitted.')
                                                            location.href='dashboard.php'
                                                            </script>";
                                                            }}}
                                                        ?>
              <div class="mb-3" hidden>
                <input type="text" name="cart_uin" id="" value="<?php echo $_REQUEST['cart_uin'];?>">
              </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-at"></i><span>Order Id</span></div>
                  <input class="form-control" type="text" name="order_id" value="<?php echo $row['order_id'];?>" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-user"></i><span>Product Name</span></div>
                  <input class="form-control" type="text" name="prod_name" value="<?php echo $row['prod_name'];?>" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-phone"></i><span>Product Size</span></div>
                  <input class="form-control" type="text" name="size" value="<?php echo $row['size'];?>" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-mail"></i><span>Product Color</span></div>
                  <input class="form-control" type="email" name="color" value="<?php echo $row['color'];?>" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-mail"></i><span>Product Quantity</span></div>
                  <input class="form-control" type="number" name="quantity" value="<?php echo $row['quantity'];?>" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-mail"></i><span>Product Quantity(To Return)</span></div>
                  <input class="form-control" type="number" name="quant" id="quant" placeholder="Input Quantity" min="1" oninput="kay()" required>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-location"></i><span>Product Price</span></div>
                  <input class="form-control" type="number" name="prod_price" id="prod_price" value="<?php echo $row['prod_price'];?>" oninput="kay()" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-location"></i><span>Total Price</span></div>
                  <input class="form-control" type="number" name="total" value="<?php echo $row['total'];?>" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-location"></i><span>Refundable Amount</span></div>
                  <input class="form-control" type="number" name="ref_amt" id="ref_amt" oninput="kay()" readonly>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-location"></i><span>Bank name/Account Name</span></div>
                  <input class="form-control" type="text" name="bank" placeholder="Input your bank name & account name" required>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-location"></i><span>Account Number</span></div>
                  <input class="form-control" type="number" name="acc_numb" placeholder="Input your account number">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-location"></i><span>Add Reason</span></div>
                  <textarea name="reason" id="" cols="40" rows="4" required></textarea>
                </div>
                <button class="btn btn-primary btn-lg w-100" type="submit" name="submit">Submit</button>
                <script type="text/javascript">
         function kay(){
            let quant=document.getElementById("quant").value;
            let prod_price=document.getElementById("prod_price").value;
            let result=quant*prod_price;
            document.getElementById("ref_amt").value=result;
        }
    </script>
              </form>
            </div>
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