<?php
    $title = "Your Title";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    if(isset($_GET['id'])){
        $editProfile = dataEditProfile($_GET['id']);
    }

    if(isset($_POST['save'])){
        $save = saveNewProfile();
    }
?>

                <section class="edit-profile-settings" style="min-height: 90vh">
                    <h1 id="admin-page-title">Edit Profile</h1>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="add-new-admin-form" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Last Name</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="lastname" value="<?php echo $editProfile['lastname']?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">First Name</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="firstname" value="<?php echo $editProfile['firstname']?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="username" value="<?php echo $editProfile['username']?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input type="password" class="form-control" aria-describedby="basic-addon1" name="password" value="<?php echo $editProfile['password']?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Profile Image</span>
                            <input type="file" class="form-control" id="customFile" name="profile_pic">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="hidden" value="<?php echo $editProfile['id'];?>" name="id">
                            <input type="hidden" value="<?php echo $editProfile['prof_pic'];?>" name="old_prof_image">
                            <button type="submit" name="save" class="btn btn-outline-primary">Save</button>
                        </div>
                        
                    </form>
                </section>


<?php include('./assets/parts/footer.php')?>