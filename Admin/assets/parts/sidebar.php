      <!--Sidebar Start-->
      <div class="col-lg-2 col-md-3 col-sm-12" id="sidebar">
        <!--Menu Start-->
        <ul class="nav justify-content-center">
          <a href="index.php" class="navbar-brand sidebar-logo">
            <img src="../assets/images/script-feather-logo.svg" alt="logo" />
            <div id="feather">Feather</div>
          </a>

          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <div class="nav-icon">
                <i class="fas fa-tachometer-alt fa-2x"></i>
              </div>
              <span class="nav-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all-post.php">
              <div class="nav-icon">
                <i class="fas fa-feather-alt fa-2x"></i>
              </div>
              <span class="nav-title">All Posts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="new-post.php">
              <div class="nav-icon">
                <i class="fas fa-pen fa-2x"></i>
              </div>
              <span class="nav-title">New Post</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admins.php">
              <div class="nav-icon">
                <i class="fas fa-users fa-2x"></i>
              </div>
              <span class="nav-title">Admins</span>
            </a>
          </li>

          <?php
            if($user_role == "Admin"){
              echo '
                    <li class="nav-item">
                      <a class="nav-link" href="add-admin.php">
                        <div class="nav-icon">
                          <i class="fas fa-user-plus fa-2x"></i>
                        </div>
                        <span class="nav-title">Add Admin</span>
                      </a>
                    </li>';
            }
          ?>

        </ul>
        <!--Menu End-->
      </div>
      <!--Sidebar End-->