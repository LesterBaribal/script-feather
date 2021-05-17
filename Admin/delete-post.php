<?php
    $title = "Delete Post";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    if(isset($_GET['id'])){
        $toDelete = $_GET['id'];

        //query to select specific post, from the given id
        $query = "SELECT * FROM posts WHERE id = '$toDelete'";

        //fetching the result
        $result = mysqli_query($conn, $query);

        //saving the result into an array
        $post = mysqli_fetch_assoc($result);

        //clearing the memory
        mysqli_free_result($result);
    }

    if(isset($_POST['delete'])){
        deleteBlog();
    }
?>

                    <section class="delete-post" style="min-height: 90vh">

                        <h3 id="admin-page-title">Delete <?php echo $post['title'];?>?</h3>

                        <form action="" method="POST" style="margin-top: 50px">
                            <div class="content-delete d-flex justify-content-center">
                                <input name="id_to_delete" type="hidden" value="<?php echo $post['id'];?>">
                                <input name="image_to_delete" type="hidden" value="<?php echo $post['blog_image'];?>">
                                <h4>Sure ka jan bhie?<i class="fas fa-sad-cry"></i><i class="fas fa-sad-cry"></i></h4>
                            </div>
                            <div class="d-flex justify-content-center" style="margin-top: 20px">
                                <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                            </div>
                            <div class="d-flex justify-content-center" style="margin-top: 20px">
                                <a href="./all-post.php" class="btn btn-secondary">Aaaaa teka lang!</a>
                            </div>
                        </form>

                    </section>


<?php include('./assets/parts/footer.php')?>