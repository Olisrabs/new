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
    <title>KmEmpire - ONL_SHOPPING || Product Review Page</title>

    <!-- Google font-->
    <link rel="stylesheet" href="../../css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet" href="../../css2-1?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Linear Icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/linearicons.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
<?php include('navbar.php');?>
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>Product Review
                                        <small>KmEpire Admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="index_adm.php">
                                            <i data-feather="home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">Digital</li>
                                    <li class="breadcrumb-item active">Product Review</li>
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
                                    <div>
                                        <div class="table-responsive table-desi">
                                            <table class="review-table table all-package">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Time</th>
                                                        <th>Date</th>
                                                        <th>Product ID</th>
                                                        <th>Category Name</th>
                                                        <th>Sub_category Name</th>
                                                        <th>Product Type</th>
                                                        <th>Product Name</th>
                                                        <th>Product Price</th>
                                                        <th>Product Old Price</th>
                                                        <th>Product Size</th>
                                                        <th>Product Discount</th>
                                                        <th>Product Status</th>
                                                        <th>Product Section</th>
                                                        <th>Most Selling Products</th>
                                                        <th>Related Products</th>
                                                        <th>Product Quantity</th>
                                                        <th>Product Image1</th>
                                                        <th>Product Image2</th>
                                                        <th>Command</th>
                                                        <th>Command 2</th>
                                                        <th>Action</th>
                                                        <th>Change Product Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    include('db_con.php');
                                                    $sql= "SELECT * FROM add_product ORDER BY id DESC";
                                                    $result= mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result) >0 ){
                                                        while($row= mysqli_fetch_array($result)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['id'];?></td>
                                                        <td><?php echo $row['time'];?></td>
                                                        <td><?php echo date('jS-F-Y',strtotime($row['expiry_date']));?></td>
                                                        <td><?php echo $row['prod_uin'];?></td>
                                                        <td><?php echo $row['categ_name'];?></td>
                                                        <td><?php echo $row['sub_catname'];?></td>
                                                        <td><?php echo $row['prod_type'];?></td>
                                                        <td><?php echo $row['prod_name'];?></td>
                                                        <td><?php echo $row['prod_price'];?></td>
                                                        <td><?php echo $row['prod_oldprice'];?></td>
                                                        <td><?php echo $row['prod_size'];?></td>
                                                        <td><?php echo $row['prod_disc'];?></td>
                                                        <td><?php echo $row['prod_stat'];?></td>
                                                        <td><?php echo $row['prod_sec'];?></td>
                                                        <td><?php echo $row['best_selling'];?></td>
                                                        <td><?php echo $row['related'];?></td>
                                                        <td><?php echo $row['prod_quant'];?></td>
                                                        <td>
    <?php if (file_exists('prod_image1/' . $row['prod_image1'])): ?>
        <img src="prod_image1/<?php echo htmlspecialchars($row['prod_image1']); ?>" alt="Product Image 1" style="height: 60px; width: auto;">
    <?php else: ?>
        <img src="default_image.jpg" alt="No Image Available" style="height: 60px; width: auto;">
    <?php endif; ?>
</td>
<td>
    <?php if (file_exists('prod_image/' . $row['prod_image'])): ?>
        <img src="prod_image/<?php echo htmlspecialchars($row['prod_image']); ?>" alt="Product Image 2" style="height: 60px; width: auto;">
    <?php else: ?>
        <img src="default_image.jpg" alt="No Image Available" style="height: 60px; width: auto;">
    <?php endif; ?>
</td>

                                                        <td>
                                                        <a href="confirm_hdcat.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to add to Weekly Best Selling List?')">
                                                            <i class="fa fa-check" title="Add to best selling products"></i>
                                                        </a>
                                                        </td>
                                                        <td>
                                                        <a href="related_prod.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to add to related products List?')">
                                                            <i class="fa fa-check-square-o" title="Add to related products"></i>
                                                        </a>
                                                        </td>
                                                        <td>
                                                        <a href="edit_addproduct.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to edit this category?')">
                                                            <i class="fa fa-edit" title="Edit"></i>
                                                        </a>

                                                        <a href="delete_addproduct.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this category?')">
                                                            <i class="fa fa-trash" title="Delete"></i>
                                                        </a>
                                                        </td>
                                                        <td>
                                                        <button type="button" class="btn btn-primary mt-md-0 mt-2"><a href="edit_productimage.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to change this Image?')">
                                                            <i class="fa fa-edit" title="Click to change product image"></i>
                                                        </a></button>
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