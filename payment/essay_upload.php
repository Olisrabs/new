<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Abuja City Journal || Essay Competition Upload</title>

    <link href="css/plugins.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="body-inner">

        <header id="header" data-fullwidth="true">
            <div class="header-inner">
                <div class="container">

                <div id="logo"> <a href="../"><span class="logo-default"><img src="images/logo2.png" height="50"></span></a> </div>


                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>

                    </div>





                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>


                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="../">Home</a></li>
                                    <li><a href="../contact.php">Contact Us</a></li>



                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </header>


        <section id="page-title">
            <div class="container">
                <div class="page-title">
                    <h1><b>Abuja City Journal National Essay Competition<br> Submission Portal</b></h1>
                </div>

            </div>
        </section>


        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-5">Essay Competition Submission Portal</h3>
                                <form id="form1" class="form-validate" method="POST" enctype="multipart/form-data">
                                <?php

                                include('db_conn.php');

$rand = rand(0000,9999);
		$today = date("dmy");
		$time = date("His");
		$ID = "ACJ/EU".$today."/".$rand;

	error_reporting(E_ALL);
	if(isset($_REQUEST['submit'])){
        $uin=trim(addslashes($_REQUEST['uin']));
        $email=trim(addslashes($_REQUEST['email']));
		$fullname=trim(addslashes($_REQUEST['fullname']));
		$phone=trim(addslashes($_REQUEST['phone']));
		$gender=trim(addslashes($_REQUEST['gender']));
		$topic=trim(addslashes($_REQUEST['topic']));
		$essay = $_FILES["essay"]['name'];
		$target="upload/";
        $target=$target.$_FILES["essay"]['name'];

    if(move_uploaded_file($_FILES["essay"]['tmp_name'], $target)>0){



                            //Check for duplicate record in database before inserting New Record
    $check=mysqli_query($conn, "SELECT * FROM submitted_essay WHERE uin='$uin' AND fullname='$fullname' AND email='$email' AND phone='$phone'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
    echo "<script>alert('Candidate Essay Already Exist in Our Database')
    location.href='essay_upload.php'</script>";
   } else {
    //insert results from the form input
    $sql="INSERT INTO submitted_essay (uin, email, fullname, phone, gender, topic, essay) VALUES ('$uin','$email','$fullname','$phone','$gender','$topic','$essay')";

    mysqli_query($conn,$sql) or die (mysqli_error($conn));
    $num=mysqli_insert_id($conn);
                        if(mysqli_affected_rows($conn)!=1){
                            $message= "Error inserting the application information.";
                            }
    echo "<script>alert('Thanks $fullname, your Essay was successfully uploaded for Review. We will get back to you if shortlisted')
        location.href='../'</script>";

}
}
}
	mysqli_close($conn);
	


?>
                                    <div class="form-row">
                                            <input type="hidden" class="form-control" readonly value="<?php echo $ID; ?>" name="uin" placeholder="Enter username" required>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Fullname</label>
                                            <input type="text" class="form-control" name="fullname" placeholder="Enter your Fullname (Surname First)" required>
                                        </div>
										
										 <div class="form-group col-md-6">
                                            <label for="telephone">Phone No</label>
                                            <input class="form-control" type="tel" name="phone" placeholder="Enter your Phone number" required>
                                        </div>
										<div class="form-group col-md-6">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">Select your gender</option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                            </select>
                                        </div>
										 <div class="form-group col-md-6">
                                            <label for="name">Topic:</label>
                                            <input type="text" class="form-control" name="topic" placeholder="Enter Topic" required>
                                        </div>
										<div class="form-group col-md-6">
                                        <label for="essay">Essay Upload <span style="color: #FC0027"><strong>(.Doc,.Docx,.pdf only)</strong></span></label>
                                            <input class="form-control" type="file" onChange="readURL(this);" name="essay"  accept=".doc,.docx,.DOC,.DOCX,.pdf,.PDF" required>
                                        </div>
                                    </div>

                                   
                                    <div class="form-row">



                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="terms_conditions" id="terms_conditions" class="custom-control-input" value="1" required>
                                            <label class="custom-control-label" for="terms_conditions">By checking
                                                this
                                                option, you agree to accept with the <a href="#">Terms and
                                                    Conditions</a>.</label>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Submit" class="btn m-t-30 mt-3">
                                </form>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </section>


        <footer id="footer">

            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; <?php include('copyright.inc'); ?> <b>Abuja City Journal</b> | All Rights Reserved </div>
                </div>
            </div>
        </footer>

    </div>


    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>

    <script src="js/functions.js"></script>

    <script src="plugins/validate/validate.min.js"></script>
    <script src="plugins/validate/valildate-rules.js"></script>
</body>


</html>