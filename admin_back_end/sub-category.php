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
    <title>KmEmpire - Product Sub-category page</title>

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
                                    <h3>Sub-category
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
                                    <li class="breadcrumb-item active">Sub-category</li>
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

                                    <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal" data-original-title="test" data-bs-target="#subcartprod">Add Category</button>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive table-desi">
                                        <table class="table all-package table-category " id="editableTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>TIME</th>
                                                    <th>SUB-CATEGORY UIN</th>
                                                    <th>SUB-CATEGORY NAME</th>
                                                    <th>TOTAL ITEM</th>
                                                    <th>DISCOUNT</th>
                                                    <th>IMAGE</th>
                                                    <th>OPTION</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    include('db_con.php');
                                                    $sql= "SELECT * FROM sub_cat";
                                                    $result= mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result) >0 ){
                                                        while($row= mysqli_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>

                                                    <td><?php echo $row['time'];?></td>

                                                    <td><?php echo $row['subcat_uin'];?></td>

                                                    <td data-field="name"><?php echo $row['subcat_name'];?></td>

                                                    <td data-field="name"><?php echo $row['item_total'];?></td>

                                                    <td data-field="name"><?php echo $row['discount'];?></td>

                                                    <td data-field="name"><img src="subcat_image/<?php echo $row['subcat_image'];?>" alt="" height="60px"></td>

                                                    <td>
                                                        <a href="edit_subcat.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to edit this category?')">
                                                            <i class="fa fa-edit" title="Edit"></i>
                                                        </a>

                                                        <a href="delete_subcat.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this category?')">
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
    <div class="modal fade" id="subcartprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add New Sub-Category</h5>
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
                                                            $SCID=$today.$rand; 
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['save'])){
                                                            $subcat_uin=trim(addslashes($_REQUEST["subcat_uin"]));
                                                            $subcat_name=trim(addslashes($_REQUEST["subcat_name"]));
                                                            $item_total=trim(addslashes($_REQUEST["item_total"]));
                                                            $discount=trim(addslashes($_REQUEST["discount"]));

                                                            $subcat_image=$rand.$_FILES["subcat_image"]['name'];
                                                            $target="subcat_image/";
                                                            $target=$target.$rand.$_FILES["subcat_image"]['name'];

                                                            // CHECKING FOR DUPLICATE RECORD
                                                           $check=mysqli_query($con, "SELECT * FROM sub_cat WHERE subcat_uin='$subcat_uin'");
                                                           $checkrows=mysqli_num_rows($check);
                                                           if($checkrows>0){
                                                           echo"<script> alert('Category already existed')</script>";
                                                           }
                                                           else{
                                                            if(move_uploaded_file($_FILES["subcat_image"]['tmp_name'], $target)>0){

                                                            $sql="INSERT INTO sub_cat(subcat_uin, subcat_name, item_total, discount, subcat_image) VALUES ('$subcat_uin','$subcat_name','$item_total','$discount','$subcat_image')";

                                                           mysqli_query($con,$sql) or die (mysqli_error($con));
                                                           $num=mysqli_insert_id($con);
                                                           if(mysqli_affected_rows($con)!=1){
                                                           $messagereg="Error inserting record into database";
                                                           }
                                                            echo "<script>alert ('Sub-category has been added.')
                                                            location.href='sub-category.php'</script>";
                                                            }}}
                                                        ?>
                        <div class="form">
                            <div class="form-group" hidden>
                                <label for="validationCustom01" class="mb-1">Sub-Category UIN :</label>
                                <input class="form-control" id="validationCustom01" type="text" value="<?php echo $SCID?>" name="subcat_uin">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Sub-Category Name :</label>
                                <input class="form-control" id="validationCustom01" type="text" name="subcat_name">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Total Items :</label>
                                <input class="form-control" id="validationCustom01" type="text" name="item_total" value="Items">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Discount :</label>
                                <input class="form-control" id="validationCustom01" type="text" name="discount">
                            </div>
                            <div class="form-group mb-0">
                                <label for="validationCustom02" class="mb-1">Sub-Category Image:</label>
                                <input class="form-control" id="validationCustom02" type="file" name="subcat_image" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG">
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