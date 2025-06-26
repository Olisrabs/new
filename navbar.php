<div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between d-flex rtl-flex-d-row-r">
        <!-- Logo Wrapper -->
        <div class="logo-wrapper"><a href="home.php"><img src="img/core-img/logo-small.png" alt=""></a></div>
        <div class="navbar-logo-container d-flex align-items-center">
          <!-- Cart Icon -->
          <?php
                                                include('db_con.php');
                                                $sql = "SELECT COUNT( * ) AS total FROM cart WHERE user_id='$session_user_id' AND `status`='Pending'";
                                                $result = mysqli_query($con, $sql);
                                                while($row= mysqli_fetch_array($result)){
                                                ?>
          <div class="cart-icon-wrap"><a href="cart.php" title="Cart"><i class="ti ti-basket-bolt"></i><span><?php echo $row['total'];?></span></a></div>
          <?php };?>
          <!-- User Profile Icon -->
          <div class="user-profile-icon ms-2"><a href="profile.php"><img src="passport/<?php echo $session_passport?>" alt="Passport"></a></div>
          <!-- Navbar Toggler -->
          <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
            <div><span></span><span></span><span></span></div>
          </div>
        </div>
      </div>
    </div>