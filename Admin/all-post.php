<?php
    $title = "All Posts";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    $posts = allPosts();
?>

                <section class="all-posts" style="min-height: 90vh">
                    
                    <h1 id="admin-page-title">Posts</h1>

                    
                    <?php foreach($posts as $post){  //loop to display all the posts?>
                        <div class="card post-individual">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="thumbnail">
                                    <img src="../assets/images/blog/<?php echo ($post['blog_image'])?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="blog-info">
                                    <div class="title"><H5><?php echo ($post['title'])?></H5></div>
                                    <div class="author">
                                        <h6>
                                            <i>By: <?php $author = authorUsername($post['author_id']); echo ($author['username']);?></i>
                                        </h6>
                                    </div>
                                    <div class="date"><?php echo ($post['date'])?></div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-3 col-sm-12">
                                <div class="icons">
                                        <input type="hidden" name="id_to_delete" value="<?php echo($post['id'])?>">
                                        <a href="../single.php?slug=<?php echo $post['slug']?>" class="btn" title="View"><i class="far fa-eye btn-view"></i></a>

                                        <?php if($user_role == "Admin"){?>
                                            <a href="./delete-post.php?id=<?php echo $post['id']?>" class="btn" title="Delete"><i class="far fa-trash-alt btn-delete"></i></a>
                                            <a href="./edit-post.php?id=<?php echo $post['id']?>" class="btn" title="Edit"><i class="far fa-edit btn-edit"></i></a>
                                        <?php }?> 

                                        <?php if($post['status']){?>
                                            <button href="#" class="btn" title="Public"><i class="fas fa-globe-asia btn-public"></i></button>
                                        <?php }else{?>
                                            <button href="#" class="btn" title="Draft"><i class="fas fa-pencil-ruler btn-draft"></i></button>
                                        <?php }?> 
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <?php } //end of loop?>

                </section>

<?php include('./assets/parts/footer.php')?>