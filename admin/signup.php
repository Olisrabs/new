<!doctype html>
<html lang="en">
<head>
	<!-- // Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Required meta tags // -->

    <meta name="description" content="Login and Register Form HTML Template - developed by 'ceosdesigns' - sold exclusively on 'themeforest.net'">
	<meta name="author" content="ceosdesigns.sk">

    <title>KmEmpire - ONL_SHOPPING || Admin Signup Page</title>

	<!-- // Favicon -->
	<link href="images/favicon.png" rel="icon">
	<!-- Favicon // -->

	<!-- // Google Web Fonts -->
	<link href="../../css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
	<!-- Google Web Fonts // -->
	
	<!-- // Font Awesome 5 Free -->
	<link href="../../releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" rel="stylesheet">
	<!-- Font Awesome 5 Free // -->

    <!-- // Template CSS files -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!-- Template CSS files  // -->
</head>
<body>
	<!-- // Preloader -->
	<div id="nm-preloader" class="nm-aic nm-vh-md-100">
		<div class="nm-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- Preloader // -->

	<main id="page-content" class="d-flex nm-aic nm-vh-md-100">
		<div class="overlay"></div>
		
		<div class="nm-tm-wr">
			<div class="container">
				<form method="post" enctype="multipart/form-data">
					<?php
                                                            include('db_con.php');
                                                            $rand=rand(1000, 9999);
                                                            $ID="KMEP-ADM-".$rand; 
                                                            error_reporting(E_ALL);
                                                            if(isset($_REQUEST['signup'])){
                                                            $admin_id=trim(addslashes($_REQUEST["admin_id"]));
                                                            $fullname=trim(addslashes($_REQUEST["fullname"]));
                                                            $username=trim(addslashes($_REQUEST["username"]));
                                                            $emailreg=trim(addslashes($_REQUEST["email"]));
                                                            $mobile=trim(addslashes($_REQUEST["mobile"]));
                                                            $gender=trim(addslashes($_REQUEST["gender"]));
                                                            $dob=trim(addslashes($_REQUEST["dob"]));
                                                            $role=trim(addslashes($_REQUEST["role"]));
                                                            $passwordreg=trim(addslashes($_REQUEST["password"]));
                                   
                                                            $passportt=$rand.$_FILES["passportt"]['name'];
                                                            $target="passportt/";
                                                            $target=$target.$rand.$_FILES["passportt"]['name'];

                                                            // CHECKING FOR DUPLICATE RECORD
                                                           $check=mysqli_query($con, "SELECT * FROM personal WHERE email='$emailreg' OR mobile='$mobile' OR `password`='$passwordreg' OR admin_id='$admin_id'");
                                                           $checkrows=mysqli_num_rows($check);
                                                           if($checkrows>0){
                                                           echo"<script> alert('Account already exist')</script>";
                                                           }
                                                           else{
                                                               if(move_uploaded_file($_FILES["passportt"]['tmp_name'], $target)>0){

                                                            $sql="INSERT INTO personal(admin_id, fullname, username, email, mobile, gender, dob, `role`, `password`, passportt) VALUES ('$ID','$fullname','$username','$emailreg','$mobile','$gender','$dob','$role',PASSWORD('$passwordreg'),'$passportt')";

                                                           mysqli_query($con,$sql) or die (mysqli_error($con));
                                                           $num=mysqli_insert_id($con);
                                                           if(mysqli_affected_rows($con)!=1){
                                                           $messagereg="Error inserting record into database";
                                                           }
                                                            echo "<script>alert ('Dear admin $fullname, Your have successfully completed your registration.')
															location.href='login.php'
															</script>";
                                                            }}}
                                                         ?>
					<div class="nm-hr nm-up-rl-3">
						<img src="images/logo-2.png" alt="">
						<h2 style="margin-top: 30px;">Administrative Signup</h2>
						<ul class="social-buttons">
							<li class="nm-hvr">
								<a href="http://google.com/">
									<i class="fab fa-google"></i>
								</a>
							</li>
							<li class="nm-hvr">
								<a href="https://twitter.com/">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
							<li class="nm-hvr">
								<a href="https://www.facebook.com/">
									<i class="fab fa-facebook-f"></i>	
								</a>
							</li>
						</ul>
					</div>
					
					<div class="input-group nm-gp" hidden>
						<span class="nm-gp-pp"><i class="fas fa-user"></i></span>
						<input type="text" class="form-control" id="inputUsername" name="admin_id" value="<?php echo $ID?>" tabindex="1" placeholder="Admin ID" required="">
					</div>
					<div class="input-group nm-gp">
						<span class="nm-gp-pp"><i class="fas fa-user"></i></span>
						<input type="text" class="form-control" id="inputUsername" name="fullname" tabindex="1" placeholder="Fullname" required="">
					</div>
					<div class="input-group nm-gp">
						<span class="nm-gp-pp"><i class="fas fa-user"></i></span>
						<input type="text" class="form-control" id="inputUsername" tabindex="1" name="username" placeholder="Username" required="">
					</div>
					
					<div class="input-group nm-gp">
						<span class="nm-gp-pp"><i class="fas fa-envelope-open"></i></span>
						<input type="email" class="form-control" id="inputEmail" tabindex="2" name="email" placeholder="Email ID" required="">
					</div>

					<div class="input-group nm-gp">
						<span class="nm-gp-pp"><i class="fas fa-envelope-open"></i></span>
						<input type="number" class="form-control" id="inputEmail" tabindex="3" name="mobile" placeholder="Mobile Number" required="">
					</div>

                    <div class="input-group nm-gp">
						<label for="" style="margin-left: 20px;">Gender</label>
						<span class="nm-gp-pp"><i class="fas fa-envelope-open"></i></span>
						<select name="gender" id="" style="width: 270px; margin-left: 20px; height: 50px;">
							<option value="">--Choose One--</option>
							<option value="male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>

					<div class="input-group nm-gp">
						<span class="nm-gp-pp"><i class="fas fa-envelope-open"></i></span>
						<input type="date" class="form-control" id="inputEmail" tabindex="4" name="dob" placeholder="" required="">
					</div>

					<div class="input-group nm-gp">
						<label for="" style="margin-left: 20px;">Role</label>
						<span class="nm-gp-pp"><i class="fas fa-envelope-open"></i></span>
						<select name="role" id="" style="width: 270px; margin-left: 20px; height: 50px;">
							<option value="">--Choose One--</option>
							<option value="admin">Admin</option>
							<option value="staff">Staff</option>
						</select>
					</div>

					<div class="input-group nm-gp">
						<span class="nm-gp-pp"><i class="fas fa-lock"></i></span>
						<input type="password" class="form-control" id="inputPassword" tabindex="3" placeholder="Password" name="password" required="">
					</div>
                    <label for="" style="margin-left: 20px;">Upload Passport</label>
					<div class="input-group nm-gp">
						<span class="nm-gp-pp"><i class="fas fa-lock"></i></span>
						<input type="file" class="form-control" id="inputPassword" name="passportt" tabindex="3" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" required="">
					</div>
	
					<div class="input-group nm-gp">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="rememberMe" required>
							<label class="form-check-label nm-check" for="rememberMe">I agree to the <a class="nm-fs-1 nm-fw-bd" href="#">Terms & Conditions</a></label>
						</div>
					</div>

					<div class="row nm-aic nm-mb-1">
						<div class="col-sm-6 nm-mb-1 nm-mb-sm-0">
							<button type="submit" name="signup" class="btn btn-primary nm-hvr nm-btn-2" onclick="return confirm('Are you sure to proceed?')">Sign Up</button>
						</div>
					</div>

					<footer style="text-align: center; margin-top: 2rem; font-size: 0.75rem; color: #97a4af; font-weight: 400;">Already have an account? <a class="nm-fs-1 nm-fw-bd" style="font-size: 0.75rem;" href="login.php">Login</a></footer>
				</form>
			</div>
		</div>
	</main>
	
	<!-- // Vendor JS files -->
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<!-- Vendor JS files // -->

	<!-- Template JS files // -->
	<script src="js/script.js"></script>
	<!-- Template JS files // -->

	<!-- ======================================================= -->
	<!-- // Setting to allow preview of different color variants -->
	<!-- ======================================================= -->
	<div id="settings" style="position: fixed; top: 20%; right: 0%; width: 40px; height: 40px; background-color: #000; color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer;">
		<i class="fas fa-cog"></i>
		<div id="colors" style="position: absolute; top: 40px; left: 40px; width: 40px; height: 240px; background-color: #000;">
			<a id="blue" href="#" style="display: block; width: 40px; height: 40px; background-color: #007bff;"></a>
			<a id="beige" href="#" style="display: block; width: 40px; height: 40px; background-color: #eab8a9;"></a>
			<a id="burgundy" href="#" style="display: block; width: 40px; height: 40px; background-color: #af102e;"></a>
			<a id="fuchsia" href="#" style="display: block; width: 40px; height: 40px; background-color: #600da8;"></a>
			<a id="turquoise" href="#" style="display: block; width: 40px; height: 40px; background-color: #50c8cc;"></a>
			<a href="../../index.html" style="display: block; width: 40px; height: 40px; background-color: #000; color: #fff; display: flex; align-items: center; justify-content: center;"><i class="fas fa-home"></i></a>
		</div>
	</div>

	<script>
		let tmpLocation = window.location.href;
		let tmpEndLocation = tmpLocation.split("/");
		let targetLocation = tmpEndLocation[tmpEndLocation.length-1];
		targetLocation = targetLocation.replace(".html","").replace("#", "");
		let targetLocationArray = [];

		if(targetLocation.includes("_")){
			targetLocationArray = targetLocation.split("_");
			targetLocationArray[1] = "_" + targetLocationArray[1];
		}
		else {
			targetLocationArray[0] = targetLocation;
			targetLocationArray[1] = "";
		}

		let l = document.links;
		for(let i=0; i<l.length; i++) {
			let tmp = l[i].attributes.href.nodeValue;
			l[i].attributes.href.nodeValue = tmp.replace("recover","recover" + targetLocationArray[1]).replace("login","login" + targetLocationArray[1]).replace("signup","signup" + targetLocationArray[1]);
		}

		document.getElementById("blue").setAttribute('href',"./" + targetLocationArray[0] + ".html");
		document.getElementById("beige").setAttribute('href',"./" + targetLocationArray[0] + "_1.html");
		document.getElementById("burgundy").setAttribute('href',"./" + targetLocationArray[0] + "_2.html");
		document.getElementById("fuchsia").setAttribute('href',"./" + targetLocationArray[0] + "_3.html");
		document.getElementById("turquoise").setAttribute('href',"./" + targetLocationArray[0] + "_4.html");

		document.getElementById("colors").style.transition = 'all 0.2s';
		document.getElementById("settings").addEventListener("click", () =>{
			let leftPosition = document.getElementById("colors").style.left;

			if(leftPosition == '40px'){
				document.getElementById("colors").style.left = '0px';
			}
			else {
				document.getElementById("colors").style.left = '40px';
			}
		});
	</script>
	<!-- ======================================================= -->
	<!-- Setting to allow preview of different color variants // -->
	<!-- ======================================================= -->
</body>
</html>