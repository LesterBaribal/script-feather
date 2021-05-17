<?php
    //function for checking the login form
    function loginCheck(){
        global $conn;

        //check if the user submitted the correct username and password
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            //query to select the id of the user wherein the username and password are present in the same row
            //if not, the data base will return false and save it to result variable, refer to line 16, and the user cannot enter the main interface
            $query = "SELECT id, user_role FROM users WHERE username='$username' AND password='$password'";

            //fetching the result the
            $result = mysqli_query($conn, $query);

            //saving the fetched data to an array
            $post = mysqli_fetch_assoc($result);

            //if the result is true or equal to 1, refer to line 19
            if(mysqli_num_rows($result)==1){
                //saving the user's id to the session
                $_SESSION['login_id'] = $post['id'];
                $_SESSION['login_role'] = $post['user_role'];
                
                echo $_SESSION['login_id'];
                echo $_SESSION['login_role'];
                //the user will be redirected to the index.php
                header("location: index.php");
            }else{
                return $denied = false;
            }

            //clearing the result
            mysqli_free_result($result);
        }
        //closing the connection
        mysqli_close($conn);
    }

    //to show your profile details
    function profileDetails($user_id){
        global $conn;

        //query to select rows id, prof_pic, lastname, firstname, username at the users table
        //wherein the id is equal to the user_id variable that the function recieved
        $query = "SELECT id, prof_pic, lastname, firstname, username FROM users WHERE id = '$user_id'";

        //fetching the result the result
        $result = mysqli_query($conn, $query);
        
        //saving the result into an array
        $user = mysqli_fetch_assoc($result);

        //clearing the result
        mysqli_free_result($result);

        //returning back the data to the calling function
        return $user;

        //closing the connection
        mysqli_close($conn);
    }

    //getting all the users
    function usersDisplay(){
        global $conn;
        global $user_check;

        //query to select all the id, prof_pic, lastname, firstname, username at the users table
        //wherein the the order of collecting is based on the id column, oldest to latest
        $query = "SELECT id, prof_pic, lastname, firstname, username, user_role FROM `users` ORDER BY `id`";

        //fetching the result the result
        $result = mysqli_query($conn, $query);

        //saving the fetched data to an array
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //clearing the result
        mysqli_free_result($result);

        //returning back the data to the calling function
        return $users;

        //closing the connection
        mysqli_close($conn);
    }

    //creating new post
    function newPost($status, $user_id){
        global $conn;
        //global $user_check;

        //variables to save title, slug, content, blog image filename
        //slug is a string that replaces the spaces between the words of the title with hypen, and convert into lower case
        $title = $_POST['title']; 
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $blog_image = $_FILES['blog_image']['name'];
        $user_check = $user_id;

        //query to insert new data in the posts table
        $query = "INSERT INTO `posts`(`title`, `slug`, `status`,`blog_image`, `content`, `author_id`) VALUES ('$title', '$slug', '$status','$blog_image', '$content', '$user_check')";

        //checking if the inserted data was uploaded to the server
        if(mysqli_query($conn, $query)){
            echo
                '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Blog Saved.
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
        $target = "../assets/images/blog/".basename($_FILES['blog_image']['name']);

        //checking if the image was uploaded to the target path
        if(move_uploaded_file($_FILES['blog_image']['tmp_name'], $target)){
            echo 
                '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Image Uploaded.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
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

    //getting all posts
    function allPosts(){
        global $conn;
        global $user_check;

        //query to select all columns at the posts table
        $query = "SELECT * FROM `posts` ORDER BY `id`";

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

    //this function will fetch the username of the author from the 'users' table using the the data that was saved
    //under the 'author_id' inside the 'posts' table
    function authorUsername($author_id){
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

    //getting a specific post to edit
    function dataEditPost($id){
        global $conn;

        //getting the id of the specific post
        $id = $_GET['id'];

        //query to select specific post, from the given id
        $query = "SELECT * FROM posts WHERE id = '$id'";

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

    //getting a specific user to edit
    function dataEditProfile($id){
        global $conn;

        //getting the id of the specific post
        $id = $_GET['id'];

        //query to select specific post, from the given id
        $query = "SELECT * FROM users WHERE id = '$id'";

        //fetching the result
        $result = mysqli_query($conn, $query);

        //saving the result into an array
        $post = mysqli_fetch_assoc($result);

        //returning back the data to the calling function
        return $post;
        
        //clearing the memory
        mysqli_free_result($result);

        //clossing the connection
        mysqli_close($conn);
    }

    //if the user updated the post as well as the blog image
    //this function was similar to the newPost() at line 89
    function updatePost($status){
        global $conn;

        $title = $_POST['title'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $blog_id = $_POST['blog_id'];

        $blog_image = $_FILES['blog_image']['name'];

        if($blog_image){
            //when you updated new image
            //to get the old image file name
            $old_blog_image = $_POST['old_blog_image'];

            //removing the old image
            unlink("../assets/images/blog/$old_blog_image");
        }else{
            //when you did not updated any new image
            echo "no image found: ";
            $blog_image = $_POST['old_blog_image'];
        }
            
        //defining the file path where an image will be save
        $target = "../assets/images/blog/".basename($_FILES['blog_image']['name']);

        //uploading the image in the target path
        move_uploaded_file($_FILES['blog_image']['tmp_name'], $target);

            //query to update the selected post
        $query = "UPDATE posts SET title='$title', status='$status', slug='$slug', content='$content', blog_image='$blog_image' WHERE id='$blog_id'";

        if(mysqli_query($conn, $query)){
            echo "Updated";
            //header("Location: posts.php");
        }else{
            echo "Error updating record: " . $conn->error;
        }
    }

    //if the user edit his profile
    function saveNewProfile(){
        global $conn;

        $id =  $_POST['id'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $prof_pic = $_FILES['profile_pic']['name'];

        if($prof_pic){
            echo "with image";
            //when you updated new image

            //to get the old image file name
            $old_prof_pic = $_POST['old_prof_image'];

            //removing the old image
            unlink("../assets/images/blog/$old_prof_pic");
        }else{
            //when you did not updated any new image
            echo "no image found: ";
            $prof_pic = $_POST['old_prof_image'];
            echo $prof_pic;
        }
            
        //defining the file path where an image will be save
        $target = "../assets/images/profile/".basename($_FILES['profile_pic']['name']);

        //uploading the image in the target path
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);

        //query to update the selected post
        $query = "UPDATE users SET prof_pic='$prof_pic', lastname='$lastname', firstname='$firstname', username='$username', password='$password' WHERE id='$id'";

        if(mysqli_query($conn, $query)){
            echo "Updated";
            echo '<script>window.location="logout.php"</script>';
        }else{
            echo "Error updating record: " . $conn->error;
        }
   }

    //deleting one data insdie the posts table
    function deleteBlog(){
        global $conn;

        $id_to_delete = $_POST['id_to_delete'];
        $image_to_delete = $_POST['image_to_delete'];

        //query to select specific post, from the given id, to delete
        $query = "DELETE FROM posts WHERE id = '$id_to_delete'";

        //deleting
        $delete = mysqli_query($conn, $query);

        if($delete){
            //removing the old image
            unlink("../assets/images/blog/$image_to_delete");
            echo '<script>window.location="all-post.php"</script>';
        }else{
            echo "Error Deleting";
        }
    }

    function removeAdmin(){
        global $conn;

        $id_to_remove = $_POST['id_to_remove'];
        $image_to_remove = $_POST['image_to_remove'];

        //query to select specific post, from the given id, to delete
        $query = "DELETE FROM users WHERE id = '$id_to_remove'";

        //deleting
        $delete = mysqli_query($conn, $query);

        if($delete){
            //removing the old image
            unlink("../assets/images/profile/$image_to_remove");
            echo '<script>window.location="index.php"</script>';
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
                    Admin Added
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
        $target = "../assets/images/profile/".basename($_FILES['blog_image']['name']);

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

    //count the number of blogs, published and drafted
    function countBlogs(){
        global $conn;

        //query to select the table we are counting
        $query = "SELECT count(id) AS total FROM posts";

        //to run the query
        $countresult = mysqli_query($conn, $query);

        //getting the result
        $counts = mysqli_fetch_assoc($countresult);

        //saving the result
        $total = $counts['total'];

        print_r ($total);
    }

    //count the number of admins
    function countAdmins(){
        global $conn;

        //query to select the table we are counting
        $query = "SELECT count(id) AS total FROM users WHERE user_role = 'Admin'";

        //to run the query
        $countresult = mysqli_query($conn, $query);

        //getting the result
        $counts = mysqli_fetch_assoc($countresult);

        //saving the result
        $total = $counts['total'];

        print_r ($total);
    }

    //count the number of draft blogs
    function countMembers(){
        global $conn;

        //query to select the table we are counting
        $query = "SELECT count(id) AS total FROM users WHERE user_role = 'Member'";

        //to run the query
        $countresult = mysqli_query($conn, $query);

        //getting the result
        $counts = mysqli_fetch_assoc($countresult);

        //saving the result
        $total = $counts['total'];

        print_r ($total);
    }

    //show the recent posts
    function recentPosts(){
        global $conn;
        global $user_check;

        //query to select rows at the users table
        //DESC means decending, oldest to latest
        $query = "SELECT title, blog_image, author_id FROM `posts` ORDER BY `date` DESC";

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

    /*
        * * * * *
        What is the use of isset()?
        Send your answer as a private message.
        * * * * *

        XOXO
    */
?>