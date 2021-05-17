<?php
    $title = "Profile Settings";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $profileDetails = profileDetails($id);
    }
?>

                <section class="profile-settings" style="min-height: 90vh">
                    <h1 id="admin-page-title">Profile Settings</h1>
                    <div class="picture">
                        <img src="../assets/images/profile/<?php echo htmlspecialchars($profileDetails['prof_pic']);?>" alt="profile-image">
                    </div>
                    <div class="details">
                        <table>
                            <tr>
                                <td class="head">First Name</td>
                                <td><?php echo htmlspecialchars($profileDetails['firstname']);?></td>
                            </tr>
                            <tr>
                                <td class="head">Last Name</td>
                                <td><?php echo htmlspecialchars($profileDetails['lastname']);?></td>
                            </tr>
                            <tr>
                                <td class="head">Username</td>
                                <td><?php echo htmlspecialchars($profileDetails['username']);?></td>
                            </tr>
                        </table>
                        <a class="btn btn-primary edit" href="./edit-profile.php?id=<?php echo $profileDetails['id']?>">Edit</a>
                    </div>
                </section>


<?php include('./assets/parts/footer.php')?>