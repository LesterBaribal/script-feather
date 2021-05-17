<section class="col-lg-10 col-md-9 col-sm-12" id="content">
        <!--Content Navbar Start-->
        <nav class="navbar navbar-expand sticky-top">
          <div class="container">
            <a href="index.php" class="navbar-brand">
              You are viewing this as 
              <?php 
                if( $user_role == "Admin"){
                  echo " an ";
                } else{
                  echo " a ";
                }
                echo $user_role;
              ?>
            </a>
            <div class="d-flex profile">
              <button class="btn" type="button" id="dropdownRightMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-2x" style="color: #fff"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownRightMenuButton">
                <li>
                  <a class="dropdown-item" href="./profile-settings.php?id=<?php echo $user_check?>">
                    <?php
                      $userName = profileDetails($user_check);
                      echo $userName['lastname'].", ".$userName['firstname'];
                    ?>
                  </a>
                </li>
                <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalDefault"> Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <!--Content Navbar End-->
        <div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Please dont leave <i class="fas fa-sad-cry"></i>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kidding</button>
                      <a href="logout.php" class="btn btn-primary">Bye, Master!</a>
                    </div>
                  </div>
                </div>
              </div>

        <div class="container">