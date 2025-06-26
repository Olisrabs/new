<div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
          <div class="user-profile"><img src="passport/<?php echo $session_passport?>" alt="Passport"></div><br>
          <div class="user-info">
            <h5 class="user-name mb-1 text-white"><?php echo $session_fullname;?></h5>
            <p class="available-balance text-white">Customer</p>
          </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
          <li><a href="profile.php"><i class="ti ti-user"></i>My Profile</a></li>
          <li><a href="dashboard.php"><i class="ti ti-dashboard"></i>My Order History</a></li>
          <li><a href="notifications.html"><i class="ti ti-bell-ringing lni-tada-effect"></i>Notifications<span class="ms-1 badge badge-warning">3</span></a></li>
          <li class="suha-dropdown-menu"><a href="#"><i class="ti ti-building-store"></i>Shop Pages</a>
            <ul>
              <li><a href="shop-grid.php">Shop Products</a></li>
              <li><a href="recommended-products.php">Recommended Products</a></li>
            </ul>
          </li>
          <li><a href="blog-grid.php"><i class="ti ti-notebook"></i>Blog</a></li>
          <li><a href="wishlist-grid.php"><i class="ti ti-heart"></i>My Wishlist</a>
          </li>
          <li><a href="settings.php"><i class="ti ti-adjustments-horizontal"></i>Settings</a></li>
          <li><a href="logout.php" onclick="return confirm('Are you sure to log out?')"><i class="ti ti-logout"></i>Sign Out</a></li>
        </ul>
      </div>
    </div>