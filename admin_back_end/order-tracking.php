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
    <title>KmEmpire - ONL_SHOPPING || Order-Tracking Page</title>

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
                                    <h3>Order Tracking
                                        <small>Multikart Admin panel</small>
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
                                    <li class="breadcrumb-item active">Order Tracking</li>
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 overflow-hidden">
                                            <div class="order-left-image">
                                                <div class="order-image-contain">
                                                    <h4>Van Heusen Women's Solid Regular Fit Polo</h4>
                                                    <div class="tracker-number">
                                                        <p>Order Number : <span>W765EWR8568871</span></p>
                                                        <p>Brand : <span>Van Heusen</span></p>
                                                        <p>Shipping Method : <span>Fast Shipping</span></p>
                                                        <p>Shipping Address : <span>Van Heusen</span></p>
                                                        <p>Order Placed : <span>June 25, 2021</span></p>
                                                    </div>
                                                    <h5>Your items is on the way. Tracking information will be available
                                                        within 24 hours.</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <ol class="progtrckr">
                                            <li class="progtrckr-done">
                                                <h5>Order Placed</h5>
                                                <h6>05:43 AM</h6>
                                            </li>
                                            <li class="progtrckr-done">
                                                <h5>Product packaging</h5>
                                                <h6>01:21 PM</h6>
                                            </li>
                                            <li class="progtrckr-done">
                                                <h5>Ready for shipment</h5>
                                                <h6>Processing</h6>
                                            </li>
                                            <li class="progtrckr-todo">
                                                <h5>Shipped</h5>
                                                <h6>Pending</h6>
                                            </li>
                                            <li class="progtrckr-todo">
                                                <h5>Dropped in the delivery station</h5>
                                                <h6>Pending</h6>
                                            </li>
                                            <li class="progtrckr-todo">
                                                <h5>Delivered</h5>
                                                <h6>Pending</h6>
                                            </li>
                                        </ol>

                                        <div class="col-12 overflow-visible">
                                            <div class="tracker-table all-package">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="table-head">
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Time</th>
                                                                <th scope="col">Discription</th>
                                                                <th scope="col">Location</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h6>21/05/2021</h6>
                                                                </td>
                                                                <td>
                                                                    <h6>12:21 AM</h6>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold">Shipped Info</p>
                                                                </td>
                                                                <td>
                                                                    <h6>3 SW. Summit St. Lithonia, GA 30038</h6>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <h6>15/04/2021</h6>
                                                                </td>
                                                                <td>
                                                                    <h6>01:00 PM</h6>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold">Shipped</p>
                                                                </td>
                                                                <td>
                                                                    <h6>70 Rockwell Lane Falls Church, VA 22041</h6>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <h6>04/05/2021</h6>
                                                                </td>
                                                                <td>
                                                                    <h6>03:58 AM</h6>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold">Shipped Info Received</p>
                                                                </td>
                                                                <td>
                                                                    <h6>13 Durham St. The Villages, FL 32162</h6>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <h6>30/04/2021</h6>
                                                                </td>
                                                                <td>
                                                                    <h6>06:26 PM</h6>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold">Origin Scan</p>
                                                                </td>
                                                                <td>
                                                                    <h6>38 Saxon Lane Mobile, AL 36605</h6>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <h6>02/02/2021</h6>
                                                                </td>
                                                                <td>
                                                                    <h6>03:45 PM</h6>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold">Shipped Info Received</p>
                                                                </td>
                                                                <td>
                                                                    <h6>3 Willow Street Chillicothe, OH 45601</h6>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <h6>14/01/2021</h6>
                                                                </td>
                                                                <td>
                                                                    <h6>12:21 AM</h6>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold">Shipped</p>
                                                                </td>
                                                                <td>
                                                                    <h6>35 Brickyard Rd. Marshalltown, IA 50158</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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