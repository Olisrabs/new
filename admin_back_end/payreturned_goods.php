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
 if(isset($_REQUEST['cart_uin'])){
    $sql= "SELECT * FROM bill_details WHERE cart_uin='$_REQUEST[cart_uin]'";
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
    <title>KmEmpire - ONL_SHOPPING || Add Product Page</title>

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
                                    <h3>Return Goods
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
                                    <li class="breadcrumb-item active">Return Product</li>
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
                                            <form class="needs-validation add-product-form" method="post" enctype="multipart/form-data" novalidate="">
                                                        <?php
                                                            include('db_con.php');
                                                            $rand=rand(1000, 9999);
                                                            $today=date('dmyHis');
                                                            $RGP="RGP".$rand.$today; 
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['submit'])){
                                                            $Pay_id=trim(addslashes($_REQUEST["Pay_id"]));
                                                            $user_id=trim(addslashes($_REQUEST["user_id"]));
                                                            $order_id=trim(addslashes($_REQUEST["order_id"]));
                                                            $prod_name=trim(addslashes($_REQUEST["prod_name"]));
                                                            $size=trim(addslashes($_REQUEST["size"]));
                                                            $color=trim(addslashes($_REQUEST["color"]));
                                                            $quantity=trim(addslashes($_REQUEST["quantity"]));
                                                            $prod_price=trim(addslashes($_REQUEST["prod_price"]));
                                                            $grand_total=trim(addslashes($_REQUEST["grand_total"]));
                                                            $ref_amt=trim(addslashes($_REQUEST["ref_amt"]));
                                                            $bank=trim(addslashes($_REQUEST["bank"]));
                                                            $acc_numb=trim(addslashes($_REQUEST["acc_numb"]));
                                                            $status = 'Approved & Paid';

                                                            $pay_receipt=$rand.$_FILES["pay_receipt"]['name'];
                                                            $target="pay_receipt/";
                                                            $target=$target.$rand.$_FILES["pay_receipt"]['name'];

                                                            // CHECKING FOR DUPLICATE RECORD
                                                            $check=mysqli_query($con, "SELECT * FROM return_pay WHERE prod_name='$prod_name' OR Pay_id='$Pay_id'");
                                                            $checkrows=mysqli_num_rows($check);
                                                            if($checkrows>0){
                                                            echo"<script> alert('Payment has been done already')</script>";
                                                            }
                                                            else{
                                                               if(move_uploaded_file($_FILES["pay_receipt"]['tmp_name'], $target)>0){

                                                             $sql="INSERT INTO return_pay(Pay_id, user_id, order_id, prod_name, `size`, color, quantity, `date`, prod_price, grand_total, ref_amt, bank, acc_numb, pay_receipt, `status`) VALUES ('$Pay_id','$user_id','$order_id','$prod_name','$size','$color','$quantity',CURDATE(),'$prod_price','$grand_total','$ref_amt','$bank','$acc_numb','$pay_receipt','$status')";
                                   
  
                                                              $sql2="UPDATE cart SET `ret_paystat`='$status' WHERE cart_uin='$_REQUEST[cart_uin]'";
  
                                                              $sql3="UPDATE bill_details SET `ret_paystat`='$status' WHERE cart_uin='$_REQUEST[cart_uin]'";
  
                                                              $result=mysqli_query($con, $sql);
                                                              $result2=mysqli_query($con, $sql2);
                                                              $result3=mysqli_query($con, $sql3);
                                                             
                                                              if($result && $result2 &&  $result3){
                                                            echo "<script>alert ('Record has been successfully submitted.')
                                                            location.href='order-list.php'
                                                            </script>";
                                                            }}}}
                                                        ?>
                                                        <div class="mb-3" hidden>
                                                        <input type="text" name="Pay_id" id="" value="<?php echo $RGP; ?>">
                                                     </div> 
                                                <div class="form">
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">User ID :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom01" name="user_id" type="text" value="<?php echo $row['user_id'];?>" required="" readonly>
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Order ID :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="order_id" value="<?php echo $row['order_id'];?>" required="" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product name :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="prod_name" value="<?php echo $row['prod_name'];?>" required="" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Size :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="size" value="<?php echo $row['size'];?>"required="" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Color :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="color" value="<?php echo $row['color'];?>" placeholder="Optional" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product price :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="prod_price" value="<?php echo $row['prod_price'];?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                </div>
                                                <div class="form">
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Quantity remainning:</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="number"  name="quantity" value="<?php echo $row['quantity'];?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Refundable Amount:</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <input class="form-control" id="ref_amt" type="text" name="ref_amt" value="<?php echo $row['ref_amt'];?>" style="font-weight: bolder;" readonly>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Grand Total Amount :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <input class="form-control" id="grand_total" type="text"  name="grand_total" value="<?php echo $row['grand_total'];?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Bank Name/Account Name :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text" name="bank" value="<?php echo $row['bank'];?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Account Number :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="number" name="acc_numb" value="<?php echo $row['acc_numb'];?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Payment Receipt :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="file" name="pay_receipt" required="" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                        <div class="offset-xl-3 offset-sm-4 mt-4">
                                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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