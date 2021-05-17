<?php
    include('../server.php');
    include('./assets/functions/functions.php');
    
    session_start();

    
        //check if the user is all ready logged in. if yes, the page will be redirected in main panel instead of login form
        if(isset($_SESSION['login_id'])){
            header("location:index.php");
            die();
        }

    $login = true;

    if(isset($_POST['submit']))
        $login = loginCheck();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/login-styling.css" />
    <link rel="shortcut icon" href="../assets/images/script-feather-logo.svg" type="image/x-icon">
    <title>Login | Script Feather Dashboard</title>
</head>
<body class="text-center">
    
    <form action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">   
        <a href="../"><i class="fas fa-home fa-2x" style="color: #fff"></i></a><br /><br /><br />
        <img src="../assets/images/script-feather-logo.svg" alt="logo">
        <h1 class="h3 mb-3 fw-normal">Login Form</h1>

        <?php if($login == false){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Incorrect Username or Password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>

        <div class="form-floating">
            <input type="username" class="form-control" id="floatingInput" placeholder="Username" name="username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-signin" type="submit" name="submit">Login</button>
    </form>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>