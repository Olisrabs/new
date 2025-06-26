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
    <title>KmEmpire - ONL_SHOPPING || Cart Page</title>
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
          <h6 class="mb-0">My Dashboard</h6>
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
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
              <thead>
                    <tr>
                    <b><th>No.</th></b>
                    <b><th>Order ID</th></b>
                    <b><th>Product Name</th></b>
                    <b><th>Date</th></b>
                    <b><th>Price</th></b>
                    <b><th>Qty Ordered Initailly</th></b>
                    <b><th>Qty Ordered After Returning</th></b>
                    <b><th>Grand Total Amount</th></b>
                    <b><th>Refundable Amount per each returns</th></b>
                    <b><th>Payment Status</th></b>
                    <b><th>Delivery Status</th></b>
                    <b><th>Returned Goods Payment Status</th></b>
                    <b><th>Track Order</th></b>
                    <b><th>Return Goods</th></b>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('db_con.php');
                    $sql= "SELECT * FROM bill_details WHERE user_id='$session_user_id' ORDER by id DESC";
                    $result= mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) >0 ){
                    while($row= mysqli_fetch_array($result)){
                  ?>          
                  <tr>
                   <b><td><?php echo $row['id'];?></td></b>
                    <td><?php echo $row['order_id'];?></td>
                    <td><img class="rounded" src="admin_back_end/prod_image1/<?php echo $row['prod_image1'];?>" alt="">
                    <b><p><?php echo $row['prod_name'];?></p></b>
                    </td>
                    <b><td><?php echo date('jS-F-Y',strtotime($row['date']));?></td></b>
                    <td><b>
                      <div class="quantity">
                      &#8358;<?php echo number_format($row['prod_price'], 2);?>
                      </div>
                    </b>
                    </td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" min="1" max="99" value="<?php echo $row['init_quant'];?>" readonly>
                      </div>
                    </td>
                    <td>
                      <div class="quantity">
                        <input class="qty-text" type="text" min="1" max="99" value="<?php echo $row['quantity'];?>" readonly>
                      </div>
                    </td>
                    <td>
                      <div class="quantity">
                      <strong>
                      &#8358;<?php echo number_format($row['grand_total'], 2);?>
                      </strong>
                      </div>
                    </td>
                    <td>
                      <div class="quantity">
                      <strong>
                      &#8358;<?php echo number_format($row['ref_amt'], 2);?>
                      </strong>
                      </div>
                    </td>
                    <td>
                        <?php
                            if($row['pay_stat']=='Awaiting Authentification'){
                            echo "<span class='dropdown-item btn-warning btn-pill btn-xsm'><i class='fe fe-calendar'></i>".$row['pay_stat']."</span>";
                            }
                            elseif($row['pay_stat']=='Awaiting payment on delivery'){
                            echo "<span class='dropdown-item btn-warning btn-pill btn-xsm'><i class='fa fa-calendar'></i>".$row['pay_stat']."</span>";
                            }
                            elseif($row['pay_stat']=='Payment not made yet'){
                            echo "<span class='dropdown-item btn-primary btn-pill btn-xsm'><i class='fa fa-times'></i>".$row['pay_stat']."</span>";
                            }
                            elseif($row['pay_stat']=='Failed'){
                            echo "<span class='dropdown-item btn-danger btn-pill btn-xsm'><i class='fa fa-times'></i>".$row['pay_stat']."</span>";
                            }
                            else{
                            echo "<span class='dropdown-item btn-success btn-pill btn-xsm'><i class='fe fe-check'></i>".$row['pay_stat']."</span>"; 
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                           if($row['order_stat']=='Pending'){
                              echo "<span class='dropdown-item btn-warning btn-pill btn-xsm'><i class='fe fe-calendar'></i>".$row['order_stat']."</span>";
                            }
                            elseif($row['order_stat']=='Ordered'){
                                echo "<span class='dropdown-item btn-primary btn-pill btn-xsm'><i class='fa fa-send-o'></i>".$row['order_stat']."</span>";
                            }
                            elseif($row['order_stat']=='Returned'){
                            echo "<span class='dropdown-item btn-info btn-pill btn-xsm'><i class='fa fa-times'></i>".$row['order_stat']."</span>";
                            }
                            elseif($row['order_stat']=='Cancelled'){
                            echo "<span class='dropdown-item btn-danger btn-pill btn-xsm'><i class='fa fa-times'></i>".$row['order_stat']."</span>";
                            }
                            else{
                            echo "<span class='dropdown-item btn-success btn-pill btn-xsm'><i class='fe fe-check'></i>".$row['order_stat']."</span>"; 
                            }
                            ?>
                    </td>
                    <td>
                        <?php
                           if($row['ret_paystat']=='Processing'){
                              echo "<span class='dropdown-item btn-warning btn-pill btn-xsm'><i class='fe fe-calendar'></i>".$row['ret_paystat']."</span>";
                            }
                            else{
                            echo "<span class='dropdown-item btn-success btn-pill btn-xsm'><i class='fe fe-check'></i>".$row['ret_paystat']."</span>"; 
                            }
                            ?>
                    </td>
                    <th scope="row"><a href="my-order.php?order_id=<?php echo $row['order_id'];?>" style="color: green;"><i class="ti ti-track" title="Click to Track orders"></i></a></th>
                    <th scope="row"><a href="return_goods.php?cart_uin=<?php echo $row['cart_uin'];?>" style="color: green;"><i class="ti ti-reload" title="Click to return goods"></i></a></th>
                  </tr>
                  <?php }};?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Cart Amount Area-->
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