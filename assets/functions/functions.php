<?php
    function recentPosts(){
        global $conn;

        //query to select rows at the users table
        //DESC means decending, oldest to latest
        $query = "SELECT title, slug, blog_image, content FROM `posts` WHERE `status`=1 ORDER BY `date` DESC ";

        //fetching the result the result
        $result = mysqli_query($conn, $query);

        //saving the fetched data to an array
        $recentPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //clearing the result
        mysqli_free_result($result);

        //return $recentPosts;
        return $recentPosts;

        //closing the connection
        mysqli_close($conn);
    }

    function getPost($slug){
        global $conn;

        //query to select specific post, from the given id
        $query = "SELECT * FROM posts WHERE slug = '$slug'";

        //fetching the result
        $result = mysqli_query($conn, $query);

        //saving the result into an array
        $post = mysqli_fetch_assoc($result);

        return $post;
        
        //clearing the memory
        mysqli_free_result($result);

        //clossing the connection
        mysqli_close($conn);
    }

    //this function will fetch the username of the author from the 'users' table using the the data that was saved
    //under the 'author_id' inside the 'posts' table
    function getAuthorUsername($author_id){
        global $conn;

        //query to select rows at the users table of the specific author
        $query = "SELECT `username` FROM `users` WHERE id='$author_id'";

        //fetching the result
        $result = mysqli_query($conn, $query);

        //saving the fetched data to an array
        $author = mysqli_fetch_assoc($result);

        //clearing the result
        mysqli_free_result($result);

        //returning back the data to the calling function
        return($author);

        //closing the connection
        mysqli_close($conn);
    }

    function getAllPosts(){
        global $conn;

        //query to select all columns at the posts table
        $query = "SELECT * FROM `posts` WHERE status = 1 ORDER BY `id` ";

        //fetching the result the result
        $result = mysqli_query($conn, $query);

        //saving the fetched data to an array
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //clearing the result
        mysqli_free_result($result);

        //returning back the data to the calling function
        return $posts;

        //closing the connection
        mysqli_close($conn);
    }

    function addComment($blog_id, $username, $comment){
        global $conn;
        
        $comment = mysqli_real_escape_string($conn, $comment);

        $query = "INSERT INTO `comments`(`blog_id`, `username`, `comment`) VALUES ('$blog_id', '$username', '$comment')";

        mysqli_query($conn, $query);
    }

    function getComments(){
        global $conn;

        //  GETTING THE POST

        $slug = $_GET['slug'];

        //query to select specific post, from the given slug
        $query = "SELECT id FROM posts WHERE slug = '$slug'";

        //fetching the result
        $result = mysqli_query($conn, $query);

        //saving the result into an array
        $post = mysqli_fetch_assoc($result);

        //clearing the memory
        mysqli_free_result($result);

        //  GETTING THE COMMENT OF THE POST
        $blog_id = $post['id'];

        $query = "SELECT id, username, comment FROM comments WHERE blog_id = '$blog_id'";

        //fetching the result
        $result = mysqli_query($conn, $query);

        //saving the result into an array
        $comment = mysqli_fetch_all($result,  MYSQLI_ASSOC);

        //clearing the memory
        mysqli_free_result($result);

        return $comment;
    }

    function deleteComment($comment_id){
        global $conn;

        $query = "DELETE FROM comments WHERE id = '$comment_id'";

        $delete = mysqli_query($conn, $query);

        if($delete){
            echo "Deleted";
        }else{
            echo "Error Deleting";
        }
    }

    //add new member
    function addNewMember(){
        global $conn;

        $lastname = $_POST['lastname'];
        $firtName = $_POST['firstname'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $profile_pic = $_FILES['blog_image']['name'];

        //query to insert data in the posts table
        $query = "INSERT INTO `users`(`prof_pic`, `lastname`, `firstname`,`username`,`user_role`, `email`, `password`, `gender`) VALUES ('$profile_pic', '$lastname', '$firtName','$username','$role', '$email', '$password', '$gender')";

        //checking if the inserted data was uploaded to the server
        if(mysqli_query($conn, $query)){
            echo
                '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Registered
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
            echo
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error in uploading blog. Query error:'.mysqli_error($conn).
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }

        //defining the file path where an image will be save
        $target = "./assets/images/profile/".basename($_FILES['blog_image']['name']);

        //checking if the image was uploaded to the target path
        if(move_uploaded_file($_FILES['blog_image']['tmp_name'], $target)){
            echo '<script>window.location="index.php"</script>';
        }else{
            echo
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error in uploading Image, or you did not uploaded image.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }

        //closing the connection
        mysqli_close($conn);
    }
?>