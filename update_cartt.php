<?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM cart WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Grabit - Multipurpose eCommerce Tailwind CSS Template.</title>
    <meta name="keywords" content="tailwindcss, eCommerce, farming, food market, grocery market, grocery shop, grocery store, grocery supper market, multi vendor, organic food, supermarket, supermarket grocery">
    <meta name="description" content="Multipurpose eCommerce Tailwind CSS Template">
    <meta name="author" content="Maraviya Infotech">

    <!-- site Favicon -->
    <link rel="icon" href="assets/img/favicon/favicon.png" sizes="32x32">

    <!-- css Icon Font -->
    <link rel="stylesheet" href="assets/css/vendor/gicons.css">

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider.css">

    <!-- Tailwindcss -->
    <script src="assets/js/plugins/tailwindcss3.4.1"></script>

    <!-- Main Style -->
    <link rel="stylesheet" id="main_style" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body class="w-full h-full relative font-Poppins font-normal overflow-x-hidden">
<?php include('nav.php');?>
<?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM cart WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
?>
    <!-- Breadcrumb start -->
    <div class="gi-breadcrumb mb-[40px]">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1600px]:max-w-[1600px] min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px] relative">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap m-0 p-[15px] border-[1px] border-solid border-[#eee] rounded-b-[5px] border-t-[0] gi_breadcrumb_inner">
                        <div class="min-[768px]:w-[50%] w-full px-[12px]">
                            <h2 class="gi-breadcrumb-title text-[#4b5966] block text-[15px] font-Poppins leading-[22px] font-semibold my-[0] mx-auto capitalize max-[767px]:mb-[5px] max-[767px]:text-center">Product Page</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] w-full px-[12px]">
                            <!-- gi-breadcrumb-list start -->
                            <ul class="gi-breadcrumb-list text-right max-[767px]:text-center">
                                <li class="gi-breadcrumb-item inline-block text-[14px] font-normal tracking-[0.02rem] leading-[1.2] capitalize"><a href="index.php" class="relative text-[#4b5966]">Home</a></li>
                                <li class="gi-breadcrumb-item inline-block text-[14px] font-normal tracking-[0.02rem] leading-[1.2] capitalize active">Product Page</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <!-- Sart Single Product -->
    <section class="gi-single-product py-[40px] max-[767px]:py-[30px] relative bg-[#fff] transition-all duration-[0.5s] ease">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1600px]:max-w-[1600px] min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="w-full flex flex-row px-[12px]">
                <div class="gi-pro-rightside gi-common-rightside w-full">
                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="w-full flex flex-wrap">
                                <div class="single-pro-img single-pro-img-no-sidebar w-[40%] relative pr-[12px] max-[991px]:w-full max-[991px]:max-w-[500px] max-[991px]:m-auto max-[991px]:px-[12px] max-[420px]:px-[0]">
                                    <div class="single-product-scroll p-[15px] sticky top-[30px] rounded-[5px] border-[1px] border-solid border-[#eee]">
                                        <div class="single-product-cover overflow-hidden cursor-zoom-in rounded-[5px]">
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive h-full w-full" src="dashboard/prod_img/<?php echo $row['prod_img'];?>" alt="Product Image">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive h-full w-full" src="dashboard/prod_img/<?php echo $row['prod_img'];?>" alt="Product Image">
                                            </div>
                                        </div>
                                        <div class="single-nav-thumb w-full overflow-hidden">
                                            <div class="single-slide px-[11px] pt-[11px]">
                                                <img class="img-responsive h-full w-full border-[1px] border-solid border-transparent transition-all duration-[0.3s] ease delay-[0s] cursor-pointer rounded-[5px]" src="dashboard/prod_img/<?php echo $row['prod_img'];?>" alt="Product Image">
                                            </div>
                                            <div class="single-slide px-[11px] pt-[11px]">
                                                <img class="img-responsive h-full w-full border-[1px] border-solid border-transparent transition-all duration-[0.3s] ease delay-[0s] cursor-pointer rounded-[5px]" src="dashboard/prod_img/<?php echo $row['prod_img'];?>" alt="Product Image">
                                            </div>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar w-[60%] pl-[12px] max-[991px]:pl-[0] max-[991px]:mt-[30px] max-[991px]:w-full">
                                    <div class="single-pro-content">
                                        <h5 class="gi-single-title text-[#4b5966] text-[22px] capitalize mb-[20px] block font-Poppins font-medium leading-[35px] tracking-[0.02rem] max-[1199px]:text-[20px] max-[1199px]:leading-[33px] max-[767px]:text-[18px] max-[767px]:text-[18px] max-[767px]:leading-[31px]"><?php echo $row['prod_name'];?></h5>
                                        <div class="gi-single-rating-wrap flex mb-[14px] items-center">
                                            <div class="gi-single-rating pr-[15px] leading-[17px]">
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star-o text-[#b2b2b2] float-left text-[14px] mr-[3px]"></i>
                                            </div>
                                            <span class="gi-read-review text-[#999] leading-[17px]">
                                                |&nbsp;&nbsp;<a href="#gi-spt-nav-review" class="text-[#999] text-[14px] leading-[20px] hover:text-[#5caf90]">992 Ratings</a>
                                            </span>
                                        </div>
                                        <div class="gi-single-price-stoke mb-[15px] pt-[15px] pb-[15px] flex justify-between">
                                            <div class="gi-single-price flex flex-col">
                                                <div class="final-price mb-[15px] text-[#4b5966] font-semibold text-[22px] leading-[32px] font-Poppins tracking-[0] max-[1199px]:text-[20px]">&#8358;<?php echo number_format($row['prod_price'], 2);?>
                                                </div>
                                            </div>
                                            <div class="gi-single-stoke flex flex-col">
                                                <span class="gi-single-sku mb-[15px] text-[18px] leading-[32px] text-[#4b5966] font-semibold tracking-[0.02rem]">SKU#: KM<?php echo $row['id'];?></span>
                                                <span class="gi-single-ps-title leading-[1] text-[16px] text-[#5caf90] tracking-[0]">IN STOCK</span>
                                            </div>
                                        </div>
                                        <div class="gi-pro-variation mb-[20px] pb-[5px]">  
                                        </div>
                                        <div class="gi-single-qty flex flex-wrap w-full m-[-5px]">
                                            <form method="post">
                                            <?php
                                            include("db_con.php");
                                            error_reporting(E_ALL);
                                            if(isset($_REQUEST["addtocart"])){
											$user_id = $_SESSION['user_id'];
                                            $cart_uin = $row['cart_uin'];
                                            $prod_name = $row['prod_name'];
                                            $prod_price = $row['prod_price'];
                                            $ms_qtybtn = $_REQUEST['ms_qtybtn'];
                                            $total=$prod_price * $ms_qtybtn;
                                            $status='Pending';
                                            $prod_img=$row['prod_img'];
                                            // $date = date("Y-m-d");
                                            
			                               $sql="UPDATE cart SET user_id='$user_id', cart_uin='$cart_uin', prod_name='$prod_name', prod_price='$prod_price', ms_qtybtn='$ms_qtybtn', total='$total', `status`='$status', prod_img='$prod_img', `date`=CURDATE() WHERE id='$_REQUEST[id]'";

                                            mysqli_query($con,$sql);
                                            echo "<script>alert('Item successfully updated!')</script>";				
                                            echo "<script>window.open('cart.php','_self')</script>";
                                            }
                                            ?>
                                            <div hidden><input type="text" name="cart_uin" value="<?php echo $row['cart_uin'];?>"></div>
                                            <div class="qty-plus-minus w-[120px] h-[40px] p-[10px] border-[1px] border-solid border-[#eee] overflow-hidden m-[5px] relative flex items-center justify-between rounded-[5px]">
                                                <input class="qty-input" type="text" name="ms_qtybtn" value="1" <?php echo $row['ms_qtybtn'];?>>
                                            </div>
                                            <div class="gi-single-cart">
                                                <button type="submit" name="addtocart" class="btn btn-primary gi-btn-1 flex h-[40px] leading-[50px] text-center text-[14px] m-[5px] py-[10px] px-[15px] uppercase justify-center bg-[#4b5966] text-[#fff] transition-all duration-[0.3s] ease-in-out relative rounded-[5px] items-center min-w-[160px] font-semibold tracking-[0.02rem] border-[0] hover:bg-[#5caf90] hover:text-[#fff]">Update Cart</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                   
                        
                    </div>
                    <!-- product details description area end -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Product -->

    <!-- Related product section -->
    <section class="gi-related-product gi-new-product py-[40px] max-[767px]:py-[30px]">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1600px]:max-w-[1600px] min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap overflow-hidden">
                <div class="gi-new-prod-section w-full px-[12px]">
                    <div class="gi-products">
                        <div class="section-title-2 w-full mb-[20px] pb-[20px] flex flex-col justify-center items-center" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                            <h2 class="gi-title mb-[0] font-manrope text-[26px] font-semibold text-[#4b5966] relative inline p-[0] capitalize leading-[1]">Other <span class="text-[#5caf90]">Products</span></h2>
                            <p class="max-w-[400px] mt-[15px] text-[14px] text-[#777] text-center leading-[23px]">Browse The Collection of Top Products</p>
                        </div>
                        <div class="gi-new-block mx-[-12px]" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                            <div class="new-product-carousel owl-carousel gi-product-slider">
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <span class="label veg max-[991px]:hidden">
                                                        <span class="dot"></span>
                                                    </span>
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="assets/img/product-images/6_1.jpg" alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="assets/img/product-images/6_2.jpg" alt="Product">
                                                </a>
                                                <span class="flags flex flex-col p-[0] uppercase absolute top-[10px] right-[10px] z-[2]">
                                                    <span class="sale px-[10px] py-[5px] text-[11px] font-medium leading-[12px] text-left uppercase flex items-center bg-[#ff7070] text-[#fff] tracking-[0.5px] relative rounded-[5px]">Sale</span>
                                                </span>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Dried Fruits</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">Mixed Nuts Seeds & Berries Pack</a>
                                            </h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$45.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$56.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                               
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related product section End -->

    <!-- Footer Start -->
    <?php include('footer_bar.php');?>
    <!-- Footer Area End -->

    <!-- Quickview Modal -->
    <div class="gi-modal-overlay w-full h-screen hidden fixed top-0 left-0 z-[30] bg-[#000000b3]"></div>
    <div class="modal gi-modal max-[575px]:w-full fixed top-[50%] left-[50%] z-[30] max-[767px]:w-full hidden max-[767px]:max-h-full max-[767px]:overflow-y-auto">
        <div class="modal-dialog modal-dialog-centered h-full my-[0%] mx-auto max-w-[900px] w-[900px] max-[991px]:max-w-[650px] max-[991px]:w-[650px] max-[767px]:w-[80%] max-[767px]:h-auto max-[767px]:max-w-[80%] max-[767px]:m-[0] max-[767px]:py-[35px] max-[767px]:mx-auto max-[575px]:w-[90%] transition-transform duration-[0.3s] ease-out">
            <div class="modal-content quickview-modal p-[30px] relative bg-[#fff] rounded-[5px] max-[360px]:p-[15px]">
                <button type="button" class="gi-close-modal qty_close absolute top-[10px] right-[10px] leading-[18px] max-[420px]:top-[5px] max-[420px]:right-[5px]"></button>
                <div class="modal-body mx-[-12px] max-[767px]:mx-[0]">
                    <div class="w-full flex flex-wrap w-full">
                        <div class="min-[768px]:w-[41.66%] px-[12px] max-[767px]:px-[0] w-full">
                            <div class="single-pro-img single-pro-img-no-sidebar h-full border-[1px] border-solid border-[#eee] rounded-[5px] overflow-hidden">
                                <div class="single-product-scroll h-full">
                                    <div class="single-slide h-full flex items-center zoom-image-hover">
                                        <img class="img-responsive h-full w-full" src="assets/img/product-images/10_1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="min-[768px]:w-[58.33%] px-[12px] max-[767px]:px-[0] w-full max-[767px]:mt-[30px]">
                            <div class="quickview-pro-content">
                                <h5 class="gi-quick-title">
                                    <a href="product-left-sidebar.html" class="mb-[15px] block text-[#4b5966] text-[22px] leading-[1.5] font-medium max-[991px]:text-[20px]">Mix nuts premium quality organic dried fruit 250g pack</a>
                                </h5>
                                <div class="gi-quickview-rating flex mb-[15px]">
                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[5px]"></i>
                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[5px]"></i>
                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[5px]"></i>
                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[5px]"></i>
                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[5px]"></i>
                                </div>
                                <div class="gi-quickview-desc mb-[10px] text-[15px] leading-[24px] text-[#777] font-light">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1900s,</div>
                                <div class="gi-quickview-price pt-[5px] pb-[10px] flex items-center justify-left">
                                    <span class="new-price text-[#4b5966] font-bold text-[22px]">$50.00</span>
                                    <span class="old-price text-[18px] ml-[10px] line-through text-[#777]">$62.00</span>
                                </div>
                                <div class="gi-pro-variation mt-[5px]">
                                    <div class="gi-pro-variation-inner flex flex-col mb-[15px] gi-pro-variation-size gi-pro-size">
                                        <div class="gi-pro-variation-content">
                                            <ul class="gi-opt-size">
                                                <li class="h-[22px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#fff] flex items-center justify-center text-[12px] leading-[22px] rounded-[3px] font-normal float-left mr-[5px] hover:bg-[#5caf90] hover:text-[#fff] hover:border-[#5caf90] active">
                                                    <a href="javascript:void(0)" class="gi-opt-sz text-[#777]" data-tooltip="Small">250g</a>
                                                </li>
                                                <li class="h-[22px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#fff] flex items-center justify-center text-[12px] leading-[22px] rounded-[3px] font-normal float-left mr-[5px] hover:bg-[#5caf90] hover:text-[#fff] hover:border-[#5caf90]">
                                                    <a href="javascript:void(0)" class="gi-opt-sz text-[#777]" data-tooltip="Medium">500g</a>
                                                </li>
                                                <li class="h-[22px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#fff] flex items-center justify-center text-[12px] leading-[22px] rounded-[3px] font-normal float-left mr-[5px] hover:bg-[#5caf90] hover:text-[#fff] hover:border-[#5caf90]">
                                                    <a href="javascript:void(0)" class="gi-opt-sz text-[#777]" data-tooltip="Large">1kg</a>
                                                </li>
                                                <li class="h-[22px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#fff] flex items-center justify-center text-[12px] leading-[22px] rounded-[3px] font-normal float-left mr-[5px] hover:bg-[#5caf90] hover:text-[#fff] hover:border-[#5caf90]">
                                                    <a href="javascript:void(0)" class="gi-opt-sz text-[#777]" data-tooltip="Extra Large">2kg</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-quickview-qty mt-[15px] inline-flex">
                                    <div class="qty-plus-minus w-[100px] h-[43px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between rounded-[3px]">
                                        <input class="qty-input w-[40px] h-[50px] text-[#777] text-[14px] text-center outline-[0]" type="text" name="gi_qtybtn" value="1">
                                    </div>
                                    <div class="gi-quickview-cart">
                                        <button type="button" class="gi-btn-1 ml-[15px] transition-all duration-[0.3s] ease-in-out overflow-hidden text-center relative rounded-[5px] py-[10px] max-[767px]:py-[6px] px-[15px] max-[767px]:px-[10px] bg-[#4b5966] text-[#fff] border-[0] text-[15px] max-[767px]:text-[13px] tracking-[0] font-medium inline-flex items-center hover:bg-[#5caf90] hover:text-[#fff]"><i class="fi-rr-shopping-basket text-[14px] leading-[0] mr-[5px]"></i> Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quickview Modal end -->

    <!-- Back to top  -->
    <a class="gi-back-to-top inline-block bg-[#4b5966] w-[40px] h-[40px] text-center rounded-[4px] fixed bottom-[30px] right-[30px] opacity-[0] invisible z-[16] border-[1px] border-solid border-[#fff] hover:cursor-pointer hover:bg-[#000] hover:opacity-[1] max-[767px]:bottom-[15px] max-[767px]:right-[15px]"></a>

    <!-- Feature tools -->
    <div class="gi-tools-sidebar-overlay hidden w-full h-screen fixed top-0 left-0 bg-[#00000080] z-[16]"></div>
    <div class="gi-tools-sidebar bg-[#fff] w-[300px] h-screen fixed right-0 top-0 transition-all duration-[0.3s] ease z-[17]">
        <a href="javascript:void(0)" class="gi-tools-sidebar-toggle in-out absolute top-[45%] right-[302px] h-[40px] w-[40px] bg-[#1d253199] transition-all duration-[0.3s] ease-in flex items-center justify-center text-[25px] z-[-1] rounded-[5px]">
            <i class="fi fi-rr-settings text-[#fff]"></i>
        </a>
        <div class="gi-bar-title mb-[15px] p-[15px] flex flex-row justify-between items-center border-b-[1px] border-solid border-[#17181c]">
            <h6 class="m-0 text-[17px] font-bold text-[#4b5966] leading-[1.2]">Tools</h6>
            <a href="javascript:void(0)" class="close-tools relative border-[0] text-[30px] leading-[20px] text-[#4b5966]">
                <i class="fi-rr-cross-small text-[20px] leading-[0]"></i>
            </a>
        </div>
        <div class="gi-tools-detail overflow-auto px-[15px] pb-[15px] h-[calc(100vh-72px)]">
            <div class="gi-tools-block">
                <h3 class="my-[15px] text-[14px] font-medium text-[#4b5966] font-Poppins leading-[1.2]">Select Color</h3>
                <ul class="gi-color">
                    <li class="color-primary inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative active-variant"></li>
                    <li class="color-1 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                    <li class="color-2 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                    <li class="color-3 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                    <li class="color-4 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                    <li class="color-5 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                    <li class="color-6 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                    <li class="color-7 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                    <li class="color-8 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"> </li>
                    <li class="color-9 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative"></li>
                </ul>
            </div>
            <div class="gi-tools-block">
                <h3 class="my-[15px] text-[14px] font-medium text-[#4b5966] font-Poppins leading-[1.2]">Modes</h3>
                <div class="gi-tools-rtl flex flex-wrap flex-row justify-between">
                    <div class="mode-primary gi-tools-item w-[125px] mb-[10px] text-center mode active-rtl ltr" data-gi-mode-tool="ltr">
                        <img src="assets/img/tools/ltr.png" alt="ltr" class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#17181c] hover:border-[#5caf90]">
                        <p class="m-0 capitalize">LTR</p>
                    </div>
                    <div class="gi-tools-item w-[125px] mb-[10px] text-center mode rtl" data-gi-mode-tool="rtl">
                        <img src="assets/img/tools/rtl.png" alt="rtl" class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#17181c] hover:border-[#5caf90]">
                        <p class="m-0 capitalize">RTL</p>
                    </div>
                </div>
            </div>
            <div class="gi-tools-block">
                <h3 class="my-[15px] text-[14px] font-medium text-[#4b5966] font-Poppins leading-[1.2]">Dark Modes</h3>
                <div class="gi-tools-dark flex flex-wrap flex-row justify-between">
                    <div class="mode-primary gi-dark-item mode w-[125px] mb-[10px] text-center active-dark light" data-gi-mode-tool="light">
                        <img src="assets/img/tools/light.png" alt="light" class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#17181c] hover:border-[#5caf90]">
                        <p class="m-0 capitalize">Light</p>
                    </div>
                    <div class="gi-dark-item w-[125px] mb-[10px] text-center mode dark" data-gi-mode-tool="dark">
                        <img src="assets/img/tools/dark.png" alt="dark" class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#17181c] hover:border-[#5caf90]">
                        <p class="m-0 capitalize">Dark</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugins JS -->
    <script src="assets/js/plugins/jquery-3.7.1.min.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/fontawesome.js"></script>
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <script src="assets/js/plugins/infiniteslidev2.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/nouislider.js"></script>
    <script src="assets/js/plugins/wow.js"></script>

    <!-- Main Js -->
    <script src="assets/js/main.js"></script>
</body>

</html>