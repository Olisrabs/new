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
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['submit'])){
                                                            $cart_uin=trim(addslashes($_REQUEST["cart_uin"]));
                                                            $user_id=trim(addslashes($_REQUEST["user_id"]));
                                                            $order_id=trim(addslashes($_REQUEST["order_id"]));
                                                            $prod_name=trim(addslashes($_REQUEST["prod_name"]));
                                                            $size=trim(addslashes($_REQUEST["size"]));
                                                            $color=trim(addslashes($_REQUEST["color"]));
                                                            $quantity=trim(addslashes($_REQUEST["quantity"]));
                                                            $quant=trim(addslashes($_REQUEST["quant"]));
                                                            $prod_price=trim(addslashes($_REQUEST["prod_price"]));
                                                            $total=trim(addslashes($_REQUEST["total"]));
                                                            $ref_amt=trim(addslashes($_REQUEST["ref_amt"]));
                                                            $bank=trim(addslashes($_REQUEST["bank"]));
                                                            $acc_numb=trim(addslashes($_REQUEST["acc_numb"]));
                                                            $reason=trim(addslashes($_REQUEST["reason"]));
                                                            $sub_quan = $quantity - $quant;
                                                            $sub_quantity = $quant * $prod_price;
                                                            $sub_total = $total - $sub_quantity;
                                                            $status = 'Returned';
                                   
                                                            if($quant > $quantity) {
                                                                echo "<script>alert('Quantity picked is more than quantity ordered!. Please pick a lower quantity.');
                                                                location.href='return_goods.php?cart_uin=$cart_uin'
                                                                </script>";
                                                              } 
                                                              else{
  
                                                              $sql="UPDATE cart SET quantity='$sub_quan', bank='$bank', acc_numb='$acc_numb', total='$sub_total', ref_amt='$ref_amt', reason='$reason', `status`='$status', `date`=CURDATE() WHERE cart_uin='$_REQUEST[cart_uin]'";
  
                                                              $sql2="UPDATE bill_details SET quantity='$sub_quan', bank='$bank', acc_numb='$acc_numb', total='$sub_total', ref_amt='$ref_amt', reason='$reason', `order_stat`='$status', `date`=CURDATE() WHERE cart_uin='$_REQUEST[cart_uin]'";
  
                                                              $result=mysqli_query($con, $sql);
                                                              $result2=mysqli_query($con, $sql2);
                                                             
                                                              if($result && $result2){
                                                            echo "<script>alert ('Record has been successfully submitted.')
                                                            location.href='order-list.php'
                                                            </script>";
                                                            }}}
                                                        ?>
                                                        <div class="mb-3" hidden>
                                                        <input type="text" name="cart_uin" id="" value="<?php echo $_REQUEST['cart_uin'];?>">
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
                                                </div>
                                                <div class="form">
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Quantity :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="number"  name="quantity" value="<?php echo $row['quantity'];?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Quantity To Return :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="quant" type="number"  name="quant" placeholder="Input Quantity" min="1" oninput="kay()">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Product Price :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <input class="form-control" id="prod_price" type="text"  name="prod_price" value="<?php echo $row['prod_price'];?>" oninput="kay()" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Product Total Price:</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <input class="form-control" id="validationCustomUsername" type="text" name="total" value="<?php echo $row['total'];?>" readonly>
                                                        </div>
                                                        </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Refundable Amount:</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                        <input class="form-control" id="ref_amt" type="text" name="ref_amt" readonly oninput="kay()" style="font-weight: bolder;">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Bank Name/Account Name :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text"  name="bank" placeholder="Input bank name & account name">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Account Number :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="number"  name="acc_numb" placeholder="Input account number">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Looks good!</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4">Add Reason :</label>
                                                        <div class="col-xl-8 col-sm-7 description-sm">
                                                            <textarea id="editor1" name="reason" cols="10" rows="4"></textarea>
                                                        </div>
                                                        <div class="offset-xl-3 offset-sm-4 mt-4">
                                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                            <button type="button" class="btn btn-light">Discard</button>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
         function kay(){
            let quant=document.getElementById("quant").value;
            let prod_price=document.getElementById("prod_price").value;
            let result=quant*prod_price;
            document.getElementById("ref_amt").value=result;
        }
    </script>
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