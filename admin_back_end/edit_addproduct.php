<?php
include('session.php');
include('db_con.php');
$id = 1;
$sql="SELECT * FROM personal WHERE id='$id'";
$result=mysqli_query($con,$sql)or die(mysqli_error($con));
$rows=mysqli_fetch_array($result);
?>

<?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM add_product WHERE id='$_REQUEST[id]'";
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
    <title>KmEmpire - ONL_SHOPPING || Edit Add Product Page</title>

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
<?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM add_product WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
?>
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>Add Products
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
                                    <li class="breadcrumb-item">Physical</li>
                                    <li class="breadcrumb-item active">Add Product</li>
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
                                        <div class="col-xl-7">
                                            <form class="needs-validation add-product-form" method="post" novalidate="">
                                                        <?php
                                                            include('db_con.php');
                                                            $rand=rand(1000, 9999);
                                                            $today=date('dmyHis');
                                                            $APID=$rand.$today; 
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['update'])){
                                                            $prod_uin=trim(addslashes($_REQUEST["prod_uin"]));
                                                            $categ_name=trim(addslashes($_REQUEST["categ_name"]));
                                                            $sub_catname=trim(addslashes($_REQUEST["sub_catname"]));
                                                            $prod_type=trim(addslashes($_REQUEST["prod_type"]));
                                                            $prod_name=trim(addslashes($_REQUEST["prod_name"]));
                                                            $prod_price=trim(addslashes($_REQUEST["prod_price"]));
                                                            $prod_oldprice=trim(addslashes($_REQUEST["prod_oldprice"]));
                                                            $prod_size=trim(addslashes($_REQUEST["prod_size"]));
                                                            $prod_disc=trim(addslashes($_REQUEST["prod_disc"]));
                                                            $prod_stat=trim(addslashes($_REQUEST["prod_stat"]));
                                                            $prod_sec=trim(addslashes($_REQUEST["prod_sec"]));
                                                            $expiry_date=trim(addslashes($_REQUEST["expiry_date"]));
                                                            $prod_quant=trim(addslashes($_REQUEST["prod_quant"]));
                                                            $spec=trim(addslashes($_REQUEST["spec"]));
                                
                                                            $sql="UPDATE add_product SET prod_uin='$prod_uin', categ_name='$categ_name', sub_catname='$sub_catname', prod_type='$prod_type', prod_name='$prod_name', prod_price='$prod_price', prod_oldprice='$prod_oldprice', `expiry_date`='$expiry_date', prod_size='$prod_size', prod_disc='$prod_disc', prod_stat='$prod_stat', prod_sec='$prod_sec', prod_quant='$prod_quant', spec='$spec' WHERE id='$_REQUEST[id]'";

                                                            $result=mysqli_query($con, $sql);
                                                            if($result){
                                                            echo "<script>alert ('Record has been successfully updated.')
                                                            location.href='product-review.php'
                                                            </script>";
                                                            }}
                                                        ?>
                                                <div class="form">
                                                    <div class="form-group mb-3 row" hidden>
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product ID :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom01" name="prod_uin" type="text" value="<?php echo $APID;?>" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category name :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="categ_name" value="<?php echo $row['categ_name'];?>" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Sub-Category name :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="sub_catname" value="<?php echo $row['sub_catname'];?>" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product type :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="prod_type" value="<?php echo $row['prod_type'];?>" required="">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product name :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="prod_name" value="<?php echo $row['prod_name'];?>" required="">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Price :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="prod_price" value="<?php echo $row['prod_price'];?>" required="">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Old Price :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="prod_oldprice" value="<?php echo $row['prod_oldprice'];?>" placeholder="Optional">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                </div>
                                                <div class="form">
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <select class="form-control digits" id="exampleFormControlSelect1" name="prod_size">
                                                                <option value="<?php echo $row['prod_size'];?>"><?php echo $row['prod_size'];?></option>
                                                                <option value="">--Select One--</option>
							                                    <option value="Small">Small</option>
							                                    <option value="Medium">Medium</option>
							                                    <option value="Large">Large</option>
							                                    <option value="ExtraLarge">ExtraLarge</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Target Date :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="date"  name="expiry_date" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Discount(%) :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="prod_disc" value="<?php echo $row['prod_disc'];?>">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Product Status :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <select class="form-control digits" id="exampleFormControlSelect1" name="prod_stat">
                                                                <option value="<?php echo $row['prod_stat'];?>"><?php echo $row['prod_stat'];?></option>
                                                                <option value="">--Select One--</option>
							                                    <option value="Sale">Sale</option>
							                                    <option value="New">New</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Product Section :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <select class="form-control digits" id="exampleFormControlSelect1" name="prod_sec" required="">
                                                                <option value="<?php echo $row['prod_sec'];?>"><?php echo $row['prod_sec'];?></option>
                                                                <option value="">--Select One--</option>
							                                    <option value="New Arrivals">New Arrivals</option>
							                                    <option value="Recommended Products">Recommended Products</option>
							                                    <option value="Flash Sales">Flash Sales</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                                        <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input class="touchspin" type="text" value="<?php echo $row['prod_quant'];?>" name="prod_quant">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4">Add Specification :</label>
                                                        <div class="col-xl-8 col-sm-7 description-sm">
                                                            <textarea id="editor1" name="spec" cols="10" rows="4" value="<?php echo $row['spec'];?>"></textarea>
                                                        </div>
                                                        <div class="offset-xl-3 offset-sm-4 mt-4">
                                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-light">Discard</button>
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