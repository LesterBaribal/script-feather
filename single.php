<?php
  include('./server.php');
  include('./assets/functions/functions.php');
  session_start();

  if(isset($_SESSION['login_role']))
    $user_role = $_SESSION['login_role'];

  if(isset($_GET['slug'])){
    $slug = $_GET['slug']; 
    $post = getPost($slug);
    $author = getAuthorUsername($post['author_id']);
  }

  if(isset($_POST['submit-comment'])){    
    addComment($_POST['blog_id'], $_POST['username'], $_POST['comment']);

    $blog_slug = $_POST['blog_slug'];
    header("Location: single.php?slug=".$blog_slug);
  }

  $comments = getComments();

  if(isset($_POST['delete-comment'])){
    deleteComment($_POST['comment_id']);
    
    $blog_slug = $_POST['blog_slug'];
    header("Location: single.php?slug=".$blog_slug);
  }
?>

<?php $title = $post['title']?>
<?php include('./assets/parts/universal-header.php');?>

    <article class="single-post">
      <div class="container">
        <div class="image">
          <img class="blog-image" src="./assets/images/blog/<?php echo $post['blog_image']?>" alt="">
        </div>
        <h1 class="blog-title section-header"><?php echo $post['title']?></h1>
        <h5 class="author text-center">By: <?php echo $author['username']?></h5>
        <h6 class="date text-center">Date: <?php echo $post['date']?></h6>
        <div class="story-body">
          <p><?php echo $post['content']?></p>
        </div>
        <div class="story-body add-comment">
          <hr />
          <h6>Add Your Comment</h6>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <input name="blog_id" type="hidden" value="<?php echo $post['id'];?>">
            <input name="blog_slug" type="hidden" value="<?php echo $post['slug'];?>">

            <div class="form-floating mb-3">
              <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
              <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating mb-3">
              <textarea name="comment" class="form-control" id="floatingInput" placeholder="Comment"></textarea>
              <label for="floatingInput">Comment</label>
            </div>

            <div class="form-submit">
              <button name="submit-comment" type="submit" class="btn" title="Send"><i class="fas fa-paper-plane fa-2x"></i></button>
            </div>
          </form>

        </div>

        <div class="story-body">
          <h6>Comments</h6>
          <hr />
          <p>
              <?php
                if(!isset($_SESSION['login_id'])){
                  echo " ";
                }else{
                  echo "Logged in as";

                  if( $user_role == "Admin")
                    echo " an ";
                  else
                    echo " a ";

                  echo $user_role;
                }
              ?>
          </p>
        </div>
        
        <div class="story-body comments">
          <?php foreach($comments as $comment){?>
            <div class="card card-comment">
              <div class="row">
                <div class="commenter"><i class="fas fa-comment"></i><b><?php echo $comment['username']?></b></div>
              </div>
              <div class="row">
                <p><?php echo $comment['comment']?></p>
              </div>
            </div>
            
            <?php 
            if(isset($_SESSION['login_role'])){
              if ($user_role == "Admin") {?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                  <input name="blog_slug" type="hidden" value="<?php echo $post['slug'];?>">

                  <input name="comment_id" type="hidden" value="<?php echo $comment['id'];?>">
                  <button type="submit" name="delete-comment" class="btn btn-outline-secondary">Delete</button>
                </form>
          <?php }}}?>
        </div>
      </div>
    </article>

<?php include('./assets/parts/footer.php');?>