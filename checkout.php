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
if(isset($_REQUEST['user_id'])){
    $sql= "SELECT * FROM cart WHERE user_id='$_REQUEST[user_id]'";
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
    <title>KmEmpire - ONL_SHOPPING || Checkout Page</title>
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
  <?php include('sidebar.php')?>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
        <!-- Back Button-->
        <div class="back-button me-2"><a href="cart.php?user_id=<?php echo $session_user_id;?>"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Billing Information</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
    </div>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Billing Address-->
          <div class="billing-information-card mb-3">
            <div class="card billing-information-title-card">
              <div class="card-body">
                <h6 class="text-center mb-0">Billing Details</h6>
              </div>
            </div>
            <form method="post">
           <?php
include("db_con.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Generate unique ID
$rand = rand(1000, 9999);
$today = date('dmyHis');
$ODID = $rand . $today;

if (isset($_REQUEST['confirm'])) {
    // Get form data
    $user_id = $_REQUEST['user_id'];
    $order_id = $_REQUEST['order_id'];
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $mob_num = $_REQUEST['mob_num'];
    $address = $_REQUEST['address'];
    $state = $_REQUEST['state'];
    $ship_meth = implode(',', $_REQUEST['ship_meth']);
    $grand_total = $_REQUEST['grand_total'];
    $order_stat = 'Pending';

    // Check for duplicate order
    $checkQuery = "SELECT * FROM bill_details WHERE order_id='$order_id'";
    $checkResult = mysqli_query($con, $checkQuery);
    $checkRows = mysqli_num_rows($checkResult);

    if ($checkRows > 0) {
        echo "<script>alert('Order has been confirmed already');</script>";
        echo "<script>window.location.href = 'checkout.php';</script>";
    } else {
        // Fetch products from the cart table
        $cartQuery = "SELECT * FROM cart WHERE user_id='$user_id' AND `status`='Pending'";
        $cartResult = mysqli_query($con, $cartQuery);
        
        if (mysqli_num_rows($cartResult) > 0) {
            while ($row = mysqli_fetch_assoc($cartResult)) {
                $cart_uin = $row['cart_uin'];
                $prod_name = $row['prod_name'];
                $prod_image1 = $row['prod_image1'];
                $quantity = $row['quantity'];
                $size = $row['size'];
                $color = $row['color'];
                $total = $row['total'];
                $bank  = $row['bank'];
                $acc_numb = $row['acc_numb'];
                $prod_price = $row['prod_price'];


                // Insert each product into the bill_details table
                $sql = "INSERT INTO bill_details(cart_uin, user_id, order_id, pay_id, fullname, email, mob_num, `address`, `state`, pay_meth, ship_meth, `size`, color, prod_price, init_quant, quantity, total, grand_total, bank, acc_numb, pay_stat, order_stat, prod_name, prod_image1, receipt, `date`) 
                        VALUES ('$cart_uin', '$user_id', '$order_id', '', '$fullname', '$email', '$mob_num', '$address', '$state', '', '$ship_meth','$size','$color', '$prod_price', '$quantity', '$quantity', '$total', '$grand_total', '$bank', '$acc_numb', 'Payment not made yet', '$order_stat', '$prod_name', '$prod_image1', '', CURDATE())";
                mysqli_query($con, $sql) or die(mysqli_error($con));
            }
        }

        // Update cart after inserting products
        $sql2 = "UPDATE cart SET order_id='$order_id' WHERE user_id='$user_id' AND `status`='Pending'";
        $result = mysqli_query($con, $sql2);

        if ($result) {
            echo "<script>window.open('payment/index.php?order_id=$order_id', '_self')</script>";
        }
    }
}
?>


              <input type="hidden" name="order_id" id="" value="<?php echo $ODID;?>">
              <input type="hidden" name="user_id" id="" value="<?php echo $_REQUEST['user_id'];?>">
              <input type="hidden" name="fullname" id="" value="<?php echo $session_fullname;?>">
              <input type="hidden" name="email" id="" value="<?php echo $session_email;?>">
              <input type="hidden" name="mob_num" id="" value="<?php echo $session_mob_num;?>">
              <input type="hidden" name="address" id="" value="<?php echo $session_address;?>">
            <div class="card user-data-card">
              <div class="card-body">                                   
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="ti ti-user"></i><span>Full Name</span></div>
                  <div class="data-content"><b><?php echo $session_fullname?></b></div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="ti ti-mail"></i><span>Email Address</span></div>
                  <div class="data-content"><b><?php echo $session_email?></b></div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="ti ti-phone"></i><span>Phone Number</span></div>
                  <div class="data-content"><b><?php echo $session_mob_num?></b></div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="ti ti-ship"></i><span>Shipping Address:</span></div>
                  <div class="data-content"><b><?php echo $session_address?></b></div>
                </div>
                <!-- Edit Address-->
                 <a class="btn btn-primary w-100" href="edit-billing-info.php?user_id=<?php echo $row['user_id'];?>">Edit Billing Information</a>
              </div>
            </div>
          </div>
          <!-- Shipping Method Choose-->
          <div class="shipping-method-choose mb-3">
  <div class="card shipping-method-choose-title-card">
    <div class="card-body">
      <h6 class="text-center mb-0">Shipping Method</h6>
    </div>
  </div>
  <div class="card shipping-method-choose-card">
  <div class="card-body">
    <!-- State selection dropdown -->
    <div class="form-group mb-3">
      <label for="state">Select State</label>
      <select id="state" name="state" class="form-control">
        <option value="Lagos">Lagos</option>
        <option value="Abuja">Abuja</option>
        <option value="Kano">Kano</option>
        <option value="Rivers">Rivers</option>
        <option value="Ogun">Ogun</option>
        <option value="Delta">Delta</option>
        <option value="Enugu">Enugu</option>
        <option value="Anambra">Anambra</option>
        <!-- Add more Nigerian states here -->
      </select>
    </div>

    <!-- Shipping methods -->
    <div class="shipping-method-choose">
      <ul class="ps-0">
        <li>
          <input id="fastShipping" type="radio" name="ship_meth[]" value="Fast Shipping" checked>
          <label for="fastShipping">Fast Shipping delivery 1-2days<b><span id="fast-shipping-fee" style="font-weight: bolder;  font-size: 13px;">#1.0</span></b></label>
          <div class="check"></div>
        </li>
        <li>
          <input id="normalShipping" type="radio" name="ship_meth[]" value="Regular">
          <label for="normalShipping">Regular delivery 5-7days<b><span id="regular-shipping-fee" style="font-weight: bolder;  font-size: 13px;">#0.4</span></b></label>
          <div class="check"></div>
        </li>
        <li>
          <input id="courier" type="radio" name="ship_meth[]" value="Courier">
          <label for="courier">Courier delivery 6-9days<b><span id="courier-shipping-fee" style="font-weight: bolder; font-size: 13px;">#0.3</span></b></label>
          <div class="check"></div>
        </li>
      </ul><br>
      <p style="font-weight: bolder;"><b>NOTE: Shipping fee will be paid to our delivery agent at the point of product collection. please comply.</b></p>
    </div>
  </div>
</div>

<script>
  // Define shipping fees based on Nigerian states
  const shippingFees = {
    "Lagos": {
      "fastShipping": 1000, // Naira
      "regularShipping": 750,
      "courier": 500
    },
    "Abuja": {
      "fastShipping": 1200,
      "regularShipping": 800,
      "courier": 600
    },
    "Kano": {
      "fastShipping": 1300,
      "regularShipping": 850,
      "courier": 650
    },
    "Rivers": {
      "fastShipping": 1100,
      "regularShipping": 780,
      "courier": 580
    },
    "Ogun": {
      "fastShipping": 900,
      "regularShipping": 700,
      "courier": 500
    },
    "Delta": {
      "fastShipping": 950,
      "regularShipping": 710,
      "courier": 510
    },
    "Enugu": {
      "fastShipping": 980,
      "regularShipping": 730,
      "courier": 520
    },
    "Anambra": {
      "fastShipping": 960,
      "regularShipping": 720,
      "courier": 530
    }
    // Add more Nigerian states and shipping fees as required
  };

  // Update the shipping fees based on the selected state
  document.getElementById("state").addEventListener("change", function () {
    const selectedState = this.value;

    // Update the shipping fees for the selected state
    document.getElementById("fast-shipping-fee").textContent = `#${shippingFees[selectedState].fastShipping}`;
    document.getElementById("regular-shipping-fee").textContent = `#${shippingFees[selectedState].regularShipping}`;
    document.getElementById("courier-shipping-fee").textContent = `#${shippingFees[selectedState].courier}`;
  });

  // Trigger change event to set default state values
  document.getElementById("state").dispatchEvent(new Event("change"));
</script>

          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
            <?php
              include('db_con.php');                                    
              $sql = "SELECT SUM( total ) AS sum_total_amount FROM cart WHERE user_id='$_REQUEST[user_id]' AND `status`='Pending'";
              $result = mysqli_query($con, $sql);
               while($row= mysqli_fetch_array($result)){
              ?>
              <b><div><input type="hidden" name="grand_total" value="<?php echo $row['sum_total_amount'];?>">&#8358;<?php echo number_format($row['sum_total_amount'], 2);?></div></b>
              <button type="submit" name="confirm" class="btn btn-primary">Confirm &amp; Pay</button>
            </div>
            <?php }?>
          </div>
          </form>
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