<?php
    $title = "Dashboard";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');
?>

          <!--Content Board Start-->
          <h1 id="admin-page-title">Dashboard</h1>

          <!--Dashboard Cards-->
          <div class="row row-card">
            <div class="report-card col-lg-4 col-md-6 col-sm-6">
              <div class="card">
                <div class="card-title"><h3>Blog Posts</h3></div>
                <div class="number"><span class="count"><?php countBlogs();?></span></div>
              </div>
            </div>
            <div class="report-card col-lg-4 col-md-6 col-sm-6">
              <div class="card">
                <div class="card-title"><h3>Admins</h3></div>
                <div class="number"><span class="count"><?php countAdmins();?></span></div>
              </div>
            </div>
            <div class="report-card col-lg-4 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-title"><h3>Members</h3></div>
                <div class="number"><span class="count"><?php countMembers();?></span></div>
              </div>
            </div>
          </div>
          <!--Dashboard Cards End-->

          <div class="row">
            <!--Dashboard Recent Posts-->
            <?php
              $recentPosts = recentPosts();
            ?>
            <div class="col-lg-6 col-md-6 col-sm-12" id="recent-posts">
              <h3>Recent Posts</h3>

              <?php for($i=0; $i<3; $i++){?>
                <div class="row row-recent" id="row">
                  <div class="col-3">
                    <div class="thumbnail">
                      <img src="../assets/images/blog/<?php echo $recentPosts[$i]['blog_image']?>" alt="">
                    </div>
                  </div>
                  <div class="col-9">
                    <div id="blog-title"><h4><?php echo $recentPosts[$i]['title']?></h4></div>
                    <div id="blog-author"><h5>By: <?php $author =authorUsername($recentPosts[$i]['author_id']); echo ($author['username'])?> </h5></div>
                  </div>
                </div>
              <?php }?>

            </div>
            <!--Dashboard Recent Posts End-->

            <!--Dashboard Profile Card-->
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card profile-card">
                <div class="card-background"></div>
                <div class="card-image">
                  <img src="../assets/images/profile/<?php echo $userName['prof_pic']?>" alt="">
                </div>
                <div class="card-name">
                  <h2><?php echo $userName['lastname'].", ".$userName['firstname'];?></h2>
                </div>
              </div>
            </div>
            <!--Dashboard Profile Card End-->
          </div>
          <!--Content Board End-->


<?php include('./assets/parts/footer.php')?>