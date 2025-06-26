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
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM sub_cat WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
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
    <title>KmEmpire - Edit Sub-Category</title>

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
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>Edit Sub-Category Records
                                        <small>kmEmpire Admin panel</small>
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
                                    <li class="breadcrumb-item">Physical</li>
                                    <li class="breadcrumb-item active">Edit Record</li>
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
                                    <div class="row product-adding">
                                        <div class="col-xl-5">
                                            <div class="add-product">
                                                <div class="row">
                                                        <!-- <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                                            <img src="assets/images/pro3/1.jpg" alt="" class="img-fluid image_zoom_1 blur-up lazyloaded">
                                                        </div> -->
                                                    <!-- <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                                        <ul class="file-upload-product">
                                                            <li>
                                                                <div class="box-input-file"><input class="upload" type="file"><i class="fa fa-plus"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="box-input-file"><input class="upload" type="file"><i class="fa fa-plus"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="box-input-file"><input class="upload" type="file"><i class="fa fa-plus"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="box-input-file"><input class="upload" type="file"><i class="fa fa-plus"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="box-input-file"><input class="upload" type="file"><i class="fa fa-plus"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="box-input-file"><input class="upload" type="file"><i class="fa fa-plus"></i></div>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <form class="needs-validation add-product-form" novalidate=""  method="post" enctype="multipart/form-data">
                                                        <?php
                                                            include('db_con.php');
                                                            $rand=rand(1000, 9990);
                                                            $today=date('dmyHis');
                                                            $SCID=$today.$rand; 
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['update'])){
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
                                                           echo"<script> alert('Sub-Category already existed')</script>";
                                                           }
                                                           else{
                                                            if(move_uploaded_file($_FILES["subcat_image"]['tmp_name'], $target)>0){

                                                            $sql="UPDATE sub_cat SET subcat_uin='$subcat_uin', subcat_name='$subcat_name', item_total='$item_total', discount='$discount', subcat_image='$subcat_image' WHERE id='$_REQUEST[id]'";
                                           
                                                            $result=mysqli_query($con, $sql);
                                                            if($result){
                                                            echo "<script>alert ('Record has been successfully updated.')
                                                            location.href='sub-category.php'
                                                            </script>";
                                                            }
                                                            }}}
                                                        ?>
                                                <div class="form">
                                                    <div class="form-group mb-3 row" hidden>
                                                        <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Sub-Category Uin:</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom02" type="text" name="subcat_uin" value="<?php echo $SCID?>" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub-Category Name :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom01" type="text" name="subcat_name" value="<?php echo $row['subcat_name'];?>" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Total Item :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom01" type="text" name="item_total" value="<?php echo $row['item_total'];?>" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                                <div class="form">
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Discount Price :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <input class="form-control" id="validationCustom02" type="text" name="discount" value="<?php echo $row['discount'];?>">  
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Sub-Category Image :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <input class="form-control" id="validationCustom02" type="file" name="subcat_image" value="<?php echo $row['subcat_image'];?>" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" required="">  
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-xl-3 offset-sm-4 mt-4">
                                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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

    <!-- touchspin js-->
    <script src="assets/js/touchspin/vendors.min.js"></script>
    <script src="assets/js/touchspin/touchspin.js"></script>
    <script src="assets/js/touchspin/input-groups.min.js"></script>

    <!-- form validation js-->
    <script src="assets/js/dashboard/form-validation-custom.js"></script>

    <!-- ckeditor js-->
    <script src="assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="assets/js/editor/ckeditor/ckeditor.custom.js"></script>

    <!-- Zoom js-->
    <script src="assets/js/jquery.elevatezoom.js"></script>
    <script src="assets/js/zoom-scripts.js"></script>

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