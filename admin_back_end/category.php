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
    <title>KmEmpire - ONL_SHOPPING || Product Category page</title>

    <!-- Google font-->
    <link rel="stylesheet" href="../../css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet" href="../../css2-1?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">

    <!-- Liner icon -->
    <link rel="stylesheet" href="../../free/1.0.0/icon-font.min.css">

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
                                    <h3>Category
                                        <small>KmEmpire Admin panel</small>
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
                                    <li class="breadcrumb-item">Physical</li>
                                    <li class="breadcrumb-item active">Category</li>
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

                                    <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#cartprod">Add Category</button>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive table-desi">
                                        <table class="table all-package table-category " id="editableTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>TIME</th>
                                                    <th>CATEGORY UIN</th>
                                                    <th>CATEGORY NAME</th>
                                                    <th>TOTAL ITEM</th>
                                                    <th>DISCOUNT</th>
                                                    <th>IMAGE</th>
                                                    <th>OPTION</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    include('db_con.php');
                                                    $sql= "SELECT * FROM addnew_cat";
                                                    $result= mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result) >0 ){
                                                        while($row= mysqli_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>

                                                    <td><?php echo $row['time'];?></td>

                                                    <td><?php echo $row['cat_uin'];?></td>

                                                    <td data-field="name"><?php echo $row['cat_name'];?></td>

                                                    <td data-field="name"><?php echo $row['total_item'];?></td>

                                                    <td data-field="name"><?php echo $row['disc'];?></td>
                                                    
                                                    <td data-field="name"><img src="cat_image/<?php echo $row['cat_image'];?>" alt="" height="60px"></td>

                                                    <td>
                                                        <a href="edit_cat.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to edit this category?')">
                                                            <i class="fa fa-edit" title="Edit"></i>
                                                        </a>

                                                        <a href="delete_cat.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this category?')">
                                                            <i class="fa fa-trash" title="Delete"></i>
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

    <!-- add physical product modal box -->
    <div class="modal fade" id="cartprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add New Product Category</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="post" enctype="multipart/form-data">
                                                        <?php
                                                            include('db_con.php');
                                                            $rand=rand(1000, 9990);
                                                            $today=date('dmyHis');
                                                            $CID=$today.$rand; 
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['save'])){
                                                            $cat_uin=trim(addslashes($_REQUEST["cat_uin"]));
                                                            $cat_name=trim(addslashes($_REQUEST["cat_name"]));
                                                            $total_item=trim(addslashes($_REQUEST["total_item"]));
                                                            $disc=trim(addslashes($_REQUEST["disc"]));

                                                            $cat_image=$rand.$_FILES["cat_image"]['name'];
                                                            $target="cat_image/";
                                                            $target=$target.$rand.$_FILES["cat_image"]['name'];

                                                            // CHECKING FOR DUPLICATE RECORD
                                                           $check=mysqli_query($con, "SELECT * FROM addnew_cat WHERE cat_uin='$cat_uin'");
                                                           $checkrows=mysqli_num_rows($check);
                                                           if($checkrows>0){
                                                           echo"<script> alert('Category already existed')</script>";
                                                           }
                                                           else{
                                                            if(move_uploaded_file($_FILES["cat_image"]['tmp_name'], $target)>0){

                                                            $sql="INSERT INTO addnew_cat(cat_uin, cat_name, total_item, disc, cat_image) VALUES ('$cat_uin','$cat_name','$total_item','$disc','$cat_image')";

                                                           mysqli_query($con,$sql) or die (mysqli_error($con));
                                                           $num=mysqli_insert_id($con);
                                                           if(mysqli_affected_rows($con)!=1){
                                                           $messagereg="Error inserting record into database";
                                                           }
                                                            echo "<script>alert ('Category has been added.')
                                                            location.href='category.php'</script>";
                                                            }}}
                                                        ?>
                        <div class="form">
                            <div class="form-group" hidden>
                                <label for="validationCustom01" class="mb-1">Category UIN :</label>
                                <input class="form-control" id="validationCustom01" type="text" value="<?php echo $CID?>" name="cat_uin">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Category Name :</label>
                                <input class="form-control" id="validationCustom01" type="text" name="cat_name">
                            </div>
                            <div class="form-group mb-0">
                                <label for="validationCustom02" class="mb-1">Total Items :</label>
                                <input class="form-control" id="validationCustom02" type="text" name="total_item" value="Items">
                            </div>
                            <div class="form-group mb-0">
                                <label for="validationCustom02" class="mb-1">Discount Percentage:</label>
                                <input class="form-control" id="validationCustom02" type="text" name="disc">
                            </div>
                            <div class="form-group mb-0">
                                <label for="validationCustom02" class="mb-1">Category Image:</label>
                                <input class="form-control" id="validationCustom02" type="file" name="cat_image" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="submit" name="save">Save</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
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

    <!-- Edit, delete and add new -->
    <script src="assets/js/edit-delete-new-product.js"></script>

    <!--right sidebar js-->
    <script src="assets/js/chat-menu.js"></script>

    <!--script admin-->
    <script src="assets/js/admin-script.js"></script>

</body>

</html>