<?php
    $title = "Delete Post";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    if(isset($_GET['id'])){
        $toRemove = $_GET['id'];

        //query to select specific post, from the given id
        $query = "SELECT * FROM users WHERE id = '$toRemove'";

        //fetching the result
        $result = mysqli_query($conn, $query);

        //saving the result into an array
        $remove = mysqli_fetch_assoc($result);

        //clearing the memory
        mysqli_free_result($result);
    }

    if(isset($_POST['remove'])){
        removeAdmin();
    }
?>

                    <section class="remove-admin" style="min-height: 90vh">

                        <h3 id="admin-page-title">Remove <?php echo $remove['username'];?>?</h3>

                        <form action="" method="POST" style="margin-top: 50px">
                            <div class="content-delete d-flex justify-content-center">
                                <input name="id_to_remove" type="hidden" value="<?php echo $remove['id'];?>">
                                <input name="image_to_remove" type="hidden" value="<?php echo $remove['prof_pic'];?>">
                                <h4>Nag away kayo bhie?<i class="fas fa-sad-cry"></i><i class="fas fa-sad-cry"></i></h4>
                            </div>
                            <div class="d-flex justify-content-center" style="margin-top: 20px">
                                <button type="submit" class="btn btn-primary" name="remove">Remove</button>
                            </div>
                            <div class="d-flex justify-content-center" style="margin-top: 20px">
                                <a href="./all-post.php" class="btn btn-secondary">De Joke Lang Bati na kami ni admin!</a>
                            </div>
                        </form>

                    </section>


<?php include('./assets/parts/footer.php')?>