<?php
    $title = "Admins";

    include('./assets/parts/header.php');
    include('./assets/parts/sidebar.php');
    include('./assets/parts/top-nav.php');

    $users = usersDisplay();
?>

                    <section class="admins" style="min-height: 75vh">
                    
                        <h1 id="admin-page-title">Users</h1>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Profile</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Username</th>
                                    <th scope="col" class="text-center">Role</th>
                                    <?php if($user_role == "Admin"){?>
                                        <th scope="col" class="text-center">Delete</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $admin){?>
                                    <tr>
                                        <th scope="row" class="text-center">
                                            <div class="profile-pic">
                                                <img src="../assets/images/profile/<?php echo htmlspecialchars($admin['prof_pic']);?>" alt="">
                                            </div>
                                        </th>
                                        <td class="text-center">
                                            <?php echo htmlspecialchars($admin['lastname'].", ".$admin['firstname']);?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo htmlspecialchars($admin['username']);?>
                                        </td>
                                        <?php
                                            if($admin['user_role'] == "Admin"){
                                                echo '<td class="admin text-center">';
                                            }else{
                                                echo '<td class="member text-center">';
                                            }
                                        ?>
                                            <?php echo htmlspecialchars($admin['user_role']);?>
                                        </td>
                                        
                                        <?php if($user_role == "Admin"){?>
                                            <td class="text-center">
                                                <a href="./remove-admin.php?id=<?php echo $admin['id']?>" class="btn" title="Remove"><i class="far fa-trash-alt btn-delete"> </i></a>
                                            </td>
                                        <?php }?>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </section>


<?php include('./assets/parts/footer.php')?>