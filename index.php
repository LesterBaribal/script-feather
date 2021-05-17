<?php
  include('./server.php');
  include('./assets/functions/functions.php');

  $recentPosts = recentPosts();
?>

<?php include('./assets/parts/index-header.php');?>

    <section class="about" id="about">
      <div class="container">
        <h2 class="section-header">About</h2>
        <div class="row about-row">
          <div class="col-lg-4 col-md-4 col-sm-12 about-section">
            <div class="about-logo">
              <!--<img src="./assets/images/script-feather-logo.svg" alt="logo" />-->
              <?php include('./preloader.php');?>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 about-section">
            <p class="about-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
              ultrices egestas nisl, eget auctor dui scelerisque ut. Suspendisse
              euismod, arcu quis placerat placerat, felis lacus posuere mauris,
              in efficitur erat augue et metus. Proin maximus lectus non
              magnfeugiat, at semper ligula ultrices. Integer sit amet laoreet
              eros, in commodo elit. Suspendisse posuere hendrerit magna,
              facilisis scelerisque magna suscipit at. Integer maximus nibh ut
              est ornare, eu dignissim ligula suscipit. Vestibulum nibh justo,
              accumsan vitae enim vel, convallis faucibus nisi. Curabitur
              tincidunt, neque sed elementum egestas, mauris felis eleifend
              nunc, sit amet fringilla arcu purus a nisi. Etiam vitae velit
              magna.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="posts" id="recent">
      <div class="container">
        <h2 class="section-header">Recent Post</h2>
        <div class="row">

          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <div class="thumbnail">
                <img src="./assets/images/blog/<?php echo $recentPosts[0]['blog_image']?>" alt="" />
              </div>
              <h4 class="text-center post-title"><?php echo $recentPosts[0]['title']?></h4>
              <div class="excerpt">
                <p>
                <?php echo $recentPosts[0]['content']?>
                </p>
              </div>
              <a href="./single.php?slug=<?php echo $recentPosts[0]['slug']?>" class="btn">Read More</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <div class="thumbnail"><img src="./assets/images/blog/<?php echo $recentPosts[1]['blog_image']?>" alt="" /></div>
              <h4 class="text-center post-title"><?php echo $recentPosts[1]['title']?></h4>
              <div class="excerpt">
                <p><?php echo $recentPosts[1]['content']?></p>
              </div>
              <a href="./single.php?slug=<?php echo $recentPosts[1]['slug']?>" class="btn">Read More</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
              <div class="thumbnail">
              <img src="./assets/images/blog/<?php echo $recentPosts[2]['blog_image']?>" alt="" />
              </div>
              <h4 class="text-center post-title"><?php echo $recentPosts[2]['title']?></h4>
              <div class="excerpt">
                <p><?php echo $recentPosts[2]['content']?></p>
              </div>
              <a href="./single.php?slug=<?php echo $recentPosts[2]['slug']?>" class="btn">Read More</a>
            </div>
          </div>
        </div>
        <a href="archives.php" class="btn">More Posts</a>
      </div>
    </section>

    <section class="contact" id="contact">
      <div class="container">
        <h2 class="section-header">Contact us</h2>

        <form class="contact-form">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control" id="firstname" />
              </div>
              <div class="form-group">
                <label for="firstname">Lastname</label>
                <input type="text" class="form-control" id="lastname" />
              </div>
              <div class="form-group">
                <label for="firstname">Email Address</label>
                <input type="text" class="form-control" id="email" />
              </div>
              <div class="form-group submit submit-sm-hide">
                <button class="btn">Send</button>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <label for="message">Message</label>
              <textarea
                name=""
                class="form-control"
                id="message"
                cols="30"
                rows="10"
              ></textarea>
              <div class="form-group submit submit-lg-hide">
                <button class="btn">Send</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

    <?php include('./assets/parts/footer.php');?>