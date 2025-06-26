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

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>KmEmpire - ONL_SHOPPING || Order List Page</title>

    <!-- Google font-->
    <link rel="stylesheet" href="../../css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet" href="../../css2-1?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
<?php include('navbar.php');?>
            <!-- Right sidebar Start-->
            <div class="right-sidebar" id="right_side_bar">
                <div>
                    <div class="container p-0">
                        <div class="modal-header p-l-20 p-r-20">
                            <div class="col-sm-8 p-0">
                                <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                            </div>
                            <div class="col-sm-4 text-end p-0">
                                <i class="me-2" data-feather="settings"></i>
                            </div>
                        </div>
                    </div>
                    <div class="friend-list-search mt-0">
                        <input type="text" placeholder="search friend">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="p-l-30 p-r-30 friend-list-name">
                        <div class="chat-box">
                            <div class="people-list friend-list">
                                <ul class="list">
                                    <li class="clearfix">
                                        <img class="rounded-circle user-image blur-up lazyloaded" src="assets/images/dashboard/user.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Vincent Porter</div>
                                            <div class="status">Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img class="rounded-circle user-image blur-up lazyloaded" src="assets/images/dashboard/user1.jpg" alt="">
                                        <div class="status-circle away"></div>
                                        <div class="about">
                                            <div class="name">Ain Chavez</div>
                                            <div class="status">28 minutes ago</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img class="rounded-circle user-image blur-up lazyloaded" src="assets/images/dashboard/user2.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Kori Thomas</div>
                                            <div class="status">Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img class="rounded-circle user-image blur-up lazyloaded" src="assets/images/dashboard/user3.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Erica Hughes</div>
                                            <div class="status">Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img class="rounded-circle user-image blur-up lazyloaded" src="assets/images/dashboard/user3.jpg" alt="">
                                        <div class="status-circle offline"></div>
                                        <div class="about">
                                            <div class="name">Ginger Johnston</div>
                                            <div class="status">2 minutes ago</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img class="rounded-circle user-image blur-up lazyloaded" src="assets/images/dashboard/user5.jpg" alt="">
                                        <div class="status-circle away"></div>
                                        <div class="about">
                                            <div class="name">Prasanth Anand</div>
                                            <div class="status">2 hour ago</div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <img class="rounded-circle user-image blur-up lazyloaded" src="assets/images/dashboard/designer.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Hileri Jecno</div>
                                            <div class="status">Online</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right sidebar Ends-->

            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>Order List
                                        <small>KmEmpire_onlshopping - Admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i data-feather="home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Menus</li>
                                    <li class="breadcrumb-item active">Order List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <form class="form-inline search-form search-box">
                                        <div class="form-group">
                                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-desi">
                                        <table class="table all-package" id="editableTable">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>User_Id</th>
                                                    <th>Order_Id</th>
                                                    <th>Prod. Name</th>
                                                    <th>Size</th>
                                                    <th>Color</th>
                                                    <th>Qty Ordered Initailly</th>
                                                    <th>Qty Ordered After Returning</th>
                                                    <th>Total</th>
                                                    <th>Grand Total</th>
                                                    <th>Refundable Amount per each returns</th>
                                                    <th>Shipping State</th>
                                                    <th>Shipping Address</th>
                                                    <th>Shipping Method</th>
                                                    <th>Bank(For Returned Goods)</th>
                                                    <th>Account Number(For Returned Goods)</th>
                                                    <th>Delivery Status</th>
                                                    <th>Date</th>
                                                    <th>Returned Goods Payment Status</th>
                                                    <th>Track Orders</th>
                                                    <th>Goods Returned</th>
                                                    <th>Upload Payment Proof</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                                    include('db_con.php');
                                                    $sql= "SELECT * FROM bill_details ORDER BY id DESC";
                                                    $result= mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result) >0 ){
                                                        while($row= mysqli_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>

                                                    <td data-field="text"><?php echo $row['user_id'];?></td>

                                                    <td data-field="text"><?php echo $row['order_id'];?></td>

                                                    <td data-field="text"><?php echo $row['prod_name'];?></td>

                                                    <td class="text">
                                                        <span><?php echo $row['size'];?></span>
                                                    </td>

                                                    <td data-field="text"><?php echo $row['color'];?></td>
                                                    <td data-field="number"><?php echo $row['init_quant'];?></td>
                                                    <td data-field="number"><?php echo $row['quantity'];?></td>
                                                    <td data-field="number">&#8358;<?php echo number_format($row['total'], 2);?></td>
                                                    <td data-field="number">&#8358;<?php echo number_format($row['grand_total'], 2);?></td>
                                                    <td data-field="number">&#8358;<?php echo number_format($row['ref_amt'], 2);?></td>
                                                    <td data-field="number"><?php echo $row['state'];?></td>
                                                    <td data-field="number"><?php echo $row['address'];?></td>
                                                    <td data-field="number"><?php echo $row['ship_meth'];?></td>
                                                    <td data-field="number"><?php echo $row['bank'];?></td>
                                                    <td data-field="number"><?php echo $row['acc_numb'];?></td>
                                                    <td>
                                                <?php
                                                       if($row['order_stat']=='Pending'){
                                                       echo "<span class='dropdown-item btn-warning btn-pill btn-xsm'><i class='fe fe-calendar'></i>".$row['order_stat']."</span>";
                                                       }
                                                       elseif($row['order_stat']=='Ordered'){
                                                        echo "<span class='dropdown-item btn-secondary btn-pill btn-xsm'><i class='fa fa-send-o'></i>".$row['order_stat']."</span>";
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
                                                    <td data-field="date"><?php echo date('jS-F-Y',strtotime($row['date']));?></td>
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
                                                <td>
                                                    <a href="order-tracking.php?order_id=<?php echo $row['order_id'];?>" class="btn btn-success mt-md-0 mt-2">
                                                        <i class="fa fa-map-marker" title="Click to view track"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="return_goods.php?cart_uin=<?php echo $row['cart_uin'];?>" class="btn btn-info mt-md-0 mt-2">
                                                        <i class="fa fa-undo" title="Click to return goods"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="payreturned_goods.php?cart_uin=<?php echo $row['cart_uin'];?>" class="btn btn-info mt-md-0 mt-2">
                                                        <i class="fa fa-money" title="Click to upload payment proof for returned goods"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                                <?php }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright text-start">
                            <p class="mb-0">Copyright 2019 © Multikart All rights reserved.</p>
                        </div>
                        <div class="col-md-6 pull-right text-end">
                            <p class=" mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
        </div>
    </div>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- Sidebar jquery-->
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- Edit, delete and add new -->
    <script src="assets/js/edit-delete-new-product.js"></script>

    <!--Customizer admin-->
    <script src="assets/js/admin-customizer.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!--right sidebar js-->
    <script src="assets/js/chat-menu.js"></script>

    <!--script admin-->
    <script src="assets/js/admin-script.js"></script>

</body>

</html>