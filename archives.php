<?php
  include('./server.php');
  include('./assets/functions/functions.php');

  $allPosts = getAllPosts();
?>
<?php $title = "Posts";?>
<?php include('./assets/parts/universal-header.php');?>

    <article class="list-posts">
      <div class="container">
        <h2 class="section-header">Posts</h2>
        <div class="row">
        <?php foreach($allPosts as $post){?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <div class="thumbnail">
                <img src="./assets/images/blog/<?php echo $post['blog_image']?>" alt="" />
              </div>
              <h4 class="text-center post-title"><?php echo $post['title']?></h4>
              <h6 class="text-center post-author">By: <?php $author = getAuthorUsername($post['author_id']); echo $author['username'];?></h6>
              <div class="excerpt">
                <p><?php echo $post['content']?></p>
              </div>
              <a href="./single.php?slug=<?php echo $post['slug']?>" class="btn">Read More</a>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </article>
  
<?php include('./assets/parts/footer.php');?>
