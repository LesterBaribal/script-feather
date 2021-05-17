<?php
    $title = "Add Admin";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    if(isset($_POST['submit'])){
        addNewMember();
    }
?>

                <section class="add-admin" style="min-height: 75vh">
                    
                    <h1 id="admin-page-title">Add Admin</h1>

                    <form onsubmit = "return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="add-new-admin-form" enctype="multipart/form-data" name="addAdminForm">
                        <div class="input-group mb-3">
                            <input type="hidden" name="role" value="Admin">
                            <span class="input-group-text" id="basic-addon1">Last Name</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="lastname">
                            <span class="input-group-text" id="basic-addon1">First Name</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="firstname">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input type="password" class="form-control" aria-describedby="basic-addon1" name="password">
                            <span class="input-group-text" id="basic-addon1">Gender</span>
                            <select id="disabledSelect" class="form-select" name="gender">
                                <option selected disabled value="">Options</option>
                                <option>Gay</option>
                                <option>Lesbian</option>
                                <option>Straight</option>
                                <option>Prefer not to say</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Profile Image</span>
                            <input type="file" class="form-control" id="customFile" name="blog_image" name="profile_pic">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-outline-primary">Add</button>
                        </div>
                        
                    </form>

                </section>


<?php include('./assets/parts/footer.php')?>