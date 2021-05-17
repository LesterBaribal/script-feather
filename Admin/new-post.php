<?php
    $title = "New Post";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    if(isset($_POST['status_publish'])){
        $new_post = newPost(1, $user_check);
    }

    if(isset($_POST['status_draft'])){
        $new_post = newPost(0, $user_check);
    }
?>

                <section class="new-post" style="min-height: 90vh">
                    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-9 col-md-12 col-sm-12" style="margin-top: 40px">
                                <div class="form-floating title">
                                    <input type="title" class="form-control" id="floatingInput" placeholder="Title" name="title">
                                    <label for="floatingInput">Title</label>
                                </div>
                                <div class="upload">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <label class="form-label" for="customFile"><h6>Upload blog image</h6></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="file" class="form-control" id="customFile" name="blog_image" >
                                        </div>
                                    </div>
                                </div>
                                <div class="editor">
                                    <textarea name="content" id="summernote"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12 col-sm-12 side-buttons">
                                <h1 id="admin-page-title">New Post</h1>
                                <div class="draft-pub-buttons">
                                    <button name="status_publish" type="submit" class="btn btn-primary">Publish</button>
                                    <button name="status_draft" type="submit" class="btn btn-primary">Save to Draft</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </section>


<?php include('./assets/parts/footer.php')?>