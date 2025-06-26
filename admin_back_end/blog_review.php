<?php
include('session.php');
include('db_con.php');
$id = 1;
$sql="SELECT * FROM personal WHERE id='$id'";
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
    <title>KmEmpire - ONL_SHOPPING || Blog Review page</title>

    <!-- Google font-->
    <link rel="stylesheet" href="../../css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet" href="../../css2-1?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">

    <!-- Dropzone css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/dropzone.css">

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
                                    <h3>Blog Review Page
                                        <small>KmEmpire - ONL_SHOPPING || Admin panel</small>
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
                                    <li class="breadcrumb-item active">Blog</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- Container-fluid starts-->
                <div class="container-fluid bulk-cate">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline search-form search-box">
                                <div class="form-group">
                                    <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-desi">
                                <table class="all-package coupon-table table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Time</th>
                                            <th>Date Uploaded</th>
                                            <th>Blog UIN</th>
                                            <th>Blog Category</th>
                                            <th>Blog Header</th>
                                            <th>Blog Image1</th>
                                            <th>Blog Image2</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                                    include('db_con.php');
                                                    $sql= "SELECT * FROM blog ORDER BY id DESC";
                                                    $result= mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result) >0 ){
                                                        while($row= mysqli_fetch_array($result)){
                                                ?>
                                        <tr data-row-id="<?php echo $row['id'];?>">
                                            <td>
                                            <?php echo $row['id'];?></td>

                                            <td><?php echo $row['time'];?></td>

                                            <td><?php echo date('jS-F-Y',strtotime($row['date']));?></td>

                                            <td><?php echo $row['blog_uin'];?></td>

                                            <td><?php echo $row['blogcateg_name'];?></td>

                                            <td><?php echo $row['blog_header'];?></td>

                                            <td><img src="blog_image1/<?php echo $row['blog_image1'];?>" alt="Image" height="80px"></td>

                                            <td><img src="blog_image2/<?php echo $row['blog_image2'];?>" alt="Image" height="80px"></td>

                                            <td>   
                                                <button type="button" class="btn btn-secondary"><a href="edit_blog.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to edit this category?')">Edit</a></button>

                                                <button type="button" class="btn btn-info"><a href="edit_blogimage.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this category?')">Change Image</a></button>

                                                <button type="button" class="btn btn-primary"><a href="delete_blog.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this category?')">Delete</a></button>
                                            </td>    
                                        </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
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

    <!-- Dropzone js-->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/dropzone/dropzone-script.js"></script>

    <!-- Table Row Delete js -->
    <script src="assets/js/table-row-delete.js"></script>

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