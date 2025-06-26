<?php
// ini_set('display_errors', '1');
// 	require 'includes/PHPMailer.php';
// 	require 'includes/SMTP.php';
// 	require 'includes/Exception.php';
// //Define name spaces
// 	use PHPMailer\PHPMailer\PHPMailer;
// 	use PHPMailer\PHPMailer\SMTP;
// 	use PHPMailer\PHPMailer\Exception;
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Site keywords here">
        <meta name="description" content="#">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Site Title -->
		<title>KmEmpire - ONL_SHOPPING || Staff Registration Page</title>

		<!-- Font -->
		<link href="../../../css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 

		<!-- Fav Icon -->
		<link rel="icon" href="img/favicon.png">
		
		<!-- Formify CSS Stylesheet -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome-all.min.css">
		<link rel="stylesheet" href="css/jquery.classycountdown.min.css">
		<link rel="stylesheet" href="css/nice-select.min.css">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="style.css">
		
	</head>
	<body>
		
		<div class="body-bg formify-quiz-layout-7">


            <section class="formify-form">
                
                
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-12  formify-form__acenter">
							<!-- Welcome Banner -->
							<div class="formify-form__layout formify-form__100vh  formify-form__layout--quiz formify-form__layout--quiz--v5 p-0  formify-bg-none">
								
                                <div class="formify-form__quiz-banner formify-form__quiz-banner--v7 formify-bg-cover formify-form__ccolumn" style="background-image: url('img/pics/11.jpg');">
                                    <div class="overlay">
                                    <!-- Sidebar Content -->
                                    <div class="formify-form__dside">
                                        <!-- Sidebar Top -->
                                        <div class="formify-form__dside-top">

                                            <div class="formify-form__dside-top-inner">
                                                <div class="formify-form__dside-logo">
                                                    <a href="../index.php"><img src="img/pics/53.png" alt="#" style="margin-left:40px; margin-top: 80px; height:140px;"></a>
                                                </div>
                                                <div class="formify-form__dside-content">
                                                    <!-- <h2 class="formify-form__dside-title">Start your project  with Formify!</h2> -->
                                                    <!-- <p class="formify-form__dside-text">Create account, and tell us more about your business goals. We’ll get back to you within 1 working day.</p> -->
                                                </div>
                                            </div>

                                            <div class="formify-form__dside-content-btm">
                                                <!-- <p class="formify-form__dside-big">Curious about what we can do for you? We are happy to tell you more!</p> -->
                                                <div class="formify-form__dside-content-support">
                                                    <div class="formify-form__dside-support">
                                                        <!-- <img src="img/formify-support-member.png">
                                                        <h4 class="formify-form__dside-support-title">Vincent Staude <span>Support Lead</span></h4> -->
                                                    </div>
                                                    <!-- Support IMG-->
                                                    <ul class="formify-form__dside-list">
                                                        <!-- <li><a href="mailto:info@picmaticweb.com">info@picmaticweb.com</a></li>
                                                        <li><a href="tel:(123) 456 7890">(123) 456 7890</a></li> -->
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                         <!-- Sidebar Bottom -->
                                        <div class="formify-form__dside-bottom">
                                            <!-- <p class="formify-form__dside-bottomptext">Have any other questions? Write to us via email <a href="mailto:hello@picmaticweb.com">hello@picmaticweb.com</a></p> -->
                                        </div>
                                    </div>
                                    <!-- End Sidebar Content -->
                                </div>
                            </div>

                                <div class="formify-form__layout--quiz-main formify-form__layout--quiz-main--v7 formify-bg-cover formify-form__ccolumn" style="background-color: whitesmoke;" >
                                    <!-- Form Area -->
                                    <div class="formify-form__inner--quiz formify-form__inner--quiz--v5">
                                        <!-- End Quiz Timing -->
                                        <div class="formify-form__form-box formify-form__form-box--v5">
                                        <?php
           include('db_con.php');
           $rand=rand(100,9999).date('dmy');
           $STFID="KMEP-STF-".$rand; 
           error_reporting(E_ALL);
             if(isset($_REQUEST["submit"])){
              $staff_id=$_REQUEST['staff_id'];
              $name=trim(addslashes($_REQUEST['name']));
              $username=trim(addslashes($_REQUEST['username']));
              $number=$_REQUEST['number'];
              $emailreg=$_REQUEST['email'];
              $gender=$_REQUEST['gender'];
              $dob=$_REQUEST['dob'];
              $civic=$_REQUEST['civic'];
              $address=$_REQUEST['address'];
              $role=$_REQUEST['role'];
              $quan_name=$_REQUEST['quan_name'];
              $quan_numb=$_REQUEST['quan_numb'];
              $quan_address=$_REQUEST['quan_address'];
              $exper=$_REQUEST['exper'];
              $passwordreg=$_REQUEST['password'];

              $passport=$rand.$_FILES["passport"]['name'];
              $targetpassport="passport/";
              $targetpassport=$targetpassport.$rand.$_FILES["passport"]['name'];

              $cv=$rand.$_FILES["cv"]['name'];
              $targetcv="cv/";
              $targetcv=$targetcv.$rand.$_FILES["cv"]['name'];

              $check=mysqli_query($conn, "SELECT * FROM staff WHERE email='$emailreg' OR number='$number'");
              $checkrows=mysqli_num_rows($check);
              if($checkrows>0){
                echo "<script>alert('user already exist in database')</script>";
              } else{ 
                if(move_uploaded_file($_FILES["passport"]['tmp_name'], $targetpassport)>0){
                if(move_uploaded_file($_FILES["cv"]['tmp_name'], $targetcv)>0){

                $sql="INSERT INTO staff (staff_id, `name`, username, `number`, email, gender, dob, civic, `address`, `role`, quan_name, quan_numb, quan_address, exper, cv, passport, `password`, `status`) VALUES ('$staff_id','$name','$username','$number','$emailreg','$gender','$dob','$civic','$address','$role','$quan_name','$quan_numb','$quan_address','$exper','$cv','$passport',PASSWORD('$passwordreg'),'Pending')";
    
            
                mysqli_query($con,$sql) or die (mysqli_error($con));
                $num=mysqli_insert_id($con);
                if(mysqli_affected_rows($con)!=1){
                  $message1="Error Inserting Record Into Database";
                }
                echo "<script>alert('Your registration has been successfully completed. Welcome')
                location.href='staff_login/login.php';
                </script>";
            }}}}
            ?>
                       <!-- Form Area -->
                                            <form id="multiStepForm" class="formify-forms formify-forms__quiz formify-forms__quiz--v6" action="#" method="post" enctype="multipart/form-data">
                                                <div class="tab-content">
                                                    <!-- Step 1 -->
                                                    <div class="tab-pane fade show active" id="step1">
                                                        <!-- Progress Bar -->
                                                        <div class="formify-steps-progress">
                                                            <h4 class="formify-steps-progress__title">Step 1/4 <span>Create Your Account</span></h4>
                                                            <div class="formify-steps-progress__list">
                                                                <div class="formify-steps-list__single active"></div>
                                                                <div class="formify-steps-list__single"></div>
                                                                <div class="formify-steps-list__single"></div>
                                                                <div class="formify-steps-list__single"></div>
                                                           
                                                            </div>
                                                        </div>
                                                        <!-- End Progress Bar -->
                                                        <div class="formify-forms__quiz-single">
                                                            <div class="formify-forms__quiz-form formify-mg-top-20">
                                                                <div class="formify-forms__quiz-form">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input" hidden>
                                                                                    <label>Staff ID <span></span></label>
                                                                                    <input type="text" name="staff_id" placeholder="Staff ID" required="required" value="<?php echo $STFID ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-l2">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>FULL NAME <span></span></label>
                                                                                    <input type="text" name="name" required="required" style="color:black;">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-l2">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>USER NAME <span></span></label>
                                                                                    <input type="text" name="username" required="required" style="color:black;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                     
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>PHONE NUMBER<span></span></label>
                                                                                    <input type="number" name="number"  required="required" style="color:black;">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>EMAIL <span></span></label>
                                                                                    <input type="email" name="email"  required="required" style="color:black;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
   
                                                                    </div>
                                                                    <!-- Form Group -->
                                                                    <div class="form-group formify-mg-top-40">
                                                                        <div class="formify-forms__button">
                                                                            <button class="formify-btn next-step">Next</button>
                                                                            <span style="margin-left: 300px;">Already have an account?</span><button><a href="staff_login/login.php" style="font-weight: 1000;">Login</a></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Form Group -->
                                                    </div>

                                                    <!-- Step 2 -->
                                                    <div class="tab-pane fade show active" id="step2">
                                                        <!-- Progress Bar -->
                                                        <div class="formify-steps-progress">
                                                            <h4 class="formify-steps-progress__title">Step 2/4 <span>Create Your Account</span></h4>
                                                            <div class="formify-steps-progress__list">
                                                                <div class="formify-steps-list__single done"></div>
                                                                <div class="formify-steps-list__single active"></div>
                                                                <div class="formify-steps-list__single"></div>
                                                                <div class="formify-steps-list__single"></div>
                                                              
                                                            </div>
                                                        </div>
                                                        <div class="formify-forms__quiz-single">
                                                            <div class="formify-forms__quiz-form formify-mg-top-20">
                                                                <div class="formify-forms__quiz-form">
                                                                    <div class="row">


                                                                    <div class="col-12">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>GENDER <span></span></label>
                                                                                    <select name="gender" id="" style="color:black;">
                                                                                        <option value=""></option>
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>DATE OF BIRTH<span></span></label>
                                                                                    <input type="date" name="dob"  required="required" style="color:black;">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                    <label>CIVIC STATUS<span></span></label>
                                                                    <select name="civic" id="" style="color:black;">
                                                                        <option value=""></option>
                                                                        <option value="Single">Single</option>
                                                                        <option value="Married">Married</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                         </div>

                                                         <div class="col-l2">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                 <label>ADDRESS</label> 
                                                                 <textarea name="address" id="" cols="30" rows="10" style="color:black;"></textarea>  
                                                                </div>
                                                            </div>
                                                        </div>

                                                        

                                                                       
                                                                    </div>
                                                                    <!-- Form Group -->
                                                                   
                                                                    <div class="form-group formify-mg-top-40">
                                                                        <div class="formify-forms__button">
                                                                            <button class="formify-btn prev-step">Previous</button>
                                                                            <button class="formify-btn next-step">Next</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Form Group -->
                                                    </div>
                                                        <!-- End Progress Bar -->
                                                       
                                                    <!-- Step 3 -->
                                                    <div class="tab-pane fade show active" id="step3">
                                                        <!-- Progress Bar -->
                                                        <div class="formify-steps-progress">
                                                            <h4 class="formify-steps-progress__title">Step 3/4 <span>Create Your Account</span></h4>
                                                            <div class="formify-steps-progress__list">
                                                                <div class="formify-steps-list__single done"></div>
                                                                <div class="formify-steps-list__single done"></div>
                                                                <div class="formify-steps-list__single active"></div>
                                                                <div class="formify-steps-list__single"></div>
                                                            
                                                            </div>
                                                           
                                                        </div>
                                                        <!-- End Progress Bar -->
                                                        <div class="formify-forms__quiz-single">
                                                            <div class="formify-forms__quiz-form formify-mg-top-20">
                                                                <div class="formify-forms__quiz-form">
                                                                    <div class="row">

                                                                    <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                    <label>ROLE APPLIED<span></span></label>
                                                                    <select name="role" id="" style="color:black;">
                                                                        <option value="">--Select One--</option>
                                                                        <option value="Staff">Staff</option>
                                                                        <option value="Admin">Admin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                         </div>

                                                                        <div class="col-l2">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>GUARANTOR'S NAME<span></span></label>
                                                                                    <input type="text" name="quan_name"  required="required" style="color:black;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                     
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <div class="formify-forms__input">
                                                                                    <label>GUARANTOR'S PHONE NUMBER<span></span></label>
                                                                                    <input type="number" name="quan_numb"  required="required"style="color:black;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                        <div class="col-l2">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                 <label>QUARANTOR'S ADDRESS</label> 
                                                                 <textarea name="quan_address" id="" cols="30" rows="10" style="color:black;"></textarea>  
                                                                </div>
                                                            </div>
                                                        </div>

                                                                       
                                                                    </div>
                                                                    <!-- Form Group -->
                                                                    <div class="form-group formify-mg-top-40">
                                                                        <div class="formify-forms__button">
                                                                            <button class="formify-btn prev-step">Previous</button>
                                                                            <button class="formify-btn next-step">Next</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Form Group -->
                                                    </div>


                                             

                                                    <!-- Step 5 -->
                                                    <div class="tab-pane fade show active" id="step4">
                                                         <!-- Progress Bar -->
                                                         <div class="formify-steps-progress">
                                                            <h4 class="formify-steps-progress__title">Step 4/4 <span>Create Your Account</span></h4>
                                                            <div class="formify-steps-progress__list">
                                                                <div class="formify-steps-list__single done"></div>
                                                                <div class="formify-steps-list__single done"></div>
                                                                <div class="formify-steps-list__single done"></div>
                                                                <div class="formify-steps-list__single active"></div>
                                                              
                                                               
                                                            </div>
                                                        </div>
                                                        <!-- End Progress Bar -->
                                                        <div class="formify-forms__quiz-single">
                                                            <div class="formify-forms__quiz-form formify-mg-top-20">
                                                                <div class="formify-forms__quiz-form">
                                                                    <div class="row">

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                    <label>YEARS OF EXPERIENCE<span></span></label>
                                                                    <input type="text" name="exper" placeholder="Minimum of 2 years" required="required" style="color:black;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                    <label>UPLOAD CV<span></span></label>
                                                                    <input type="file" name="cv"  required="required" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.png" style="color:black;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                    <label>UPLOAD PASSPORT<span></span></label>
                                                                    <input type="file" name="passport"  required="required" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.png" style="color:black;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="formify-forms__input">
                                                                    <label>PASSWORD<span></span></label>
                                                                    <input type="password" name="password"  required="required" style="color:black;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group formify-mg-top-40">
                                                            <div class="formify-forms__button">
                                                                <button class="formify-btn prev-step">Previous</button>
                                                                <button class="formify-btn " name="submit" type="submit" onclick="return confirm('Are You Sure You Want To Submit?')">Submit</button>
                                                            </div>
                                                        </div>
                                                    
                                                    <!-- Step 5 -->
                                                    
                                                </div>
                                               
                                            </form>
                                            <!-- End Form Area -->

                                        </div>
                                    </div>
                                    <!-- End Form Area -->
                                </div>
							</div>
						</div>
					</div>
				</div>
			</section>

   
		</div>
		
		<!-- Formify Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/final-countdown.min.js"></script>
		<script src="js/nice-select.min.js"></script>
		<script src="js/main.js"></script>
		<script src="../../../recaptcha/api.js" async="" defer=""></script>
        <script>
           $(document).ready(function () {
            const form = $('#multiStepForm');
            const steps = form.find('.tab-pane');
            const links = $('.formify-form__nav a'); // Updated selector to target navigation links
            const progress = $('.progress-bar');
            const completionPercent = $('.formify-form__quiz-banner-progress--percent');

            let currentStep = 0;

            function showStep(stepIndex) {
                steps.removeClass('show active');
                $(steps[stepIndex]).addClass('show active');
                links.removeClass('active');
                $(links[stepIndex]).addClass('active');
                updateProgress();
                $('.formify-form__quiz-current').addClass('zoom-out');
                setTimeout(function () {
                    $('.formify-form__quiz-current').text(stepIndex + 1).removeClass('zoom-out').addClass('zoom-in');
                }, 300);
                updateCompletionPercent();
            }

            function updateProgress() {
                const percent = (currentStep / (steps.length - 1)) * 100;
                progress.css('width', percent + '%');
            }

            function updateCompletionPercent() {
                const percent = ((currentStep + 1) / steps.length) * 100;
                completionPercent.text(`${percent.toFixed(0)}% Complete`);
            }

            $('.next-step').click(function (event) {
                event.preventDefault();
                currentStep++;
                if (currentStep < steps.length) {
                    showStep(currentStep);
                } else {
                    // Handle form submission or completion here
                }
            });

            $('.prev-step').click(function (event) {
                event.preventDefault();
                currentStep--;
                if (currentStep >= 0) {
                    showStep(currentStep);
                }
            });

            links.click(function (event) { // Added click event for navigation links
                event.preventDefault();
                const clickedStep = links.index(this);
                if (clickedStep >= 0 && clickedStep < steps.length) {
                    currentStep = clickedStep;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
        });

        </script>
        
		
	</body>
</html>