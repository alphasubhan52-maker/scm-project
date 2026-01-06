<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <div class="card">
                        <div class="card-header row">
                            <div>
                                <h1 style="font-family:sans-serif;color:black;">View Role</h1>
                                <a href="./role.php">
                                    <button class="btn btn-primary">Add Role</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <?php
                                $sql = "SELECT*FROM `role`";
                                $run = mysqli_query($conn, $sql);
                                ?>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">RoleName</th>
                                        <th scope="col">RoleAccess</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($fet = mysqli_fetch_assoc($run)) {
                                        $ro = unserialize($fet['role']);
                                    ?>
                                        <tr class="py-4">
                                            <th scope="row"><?php echo $fet['roleid'] ?></th>
                                            <td><?php echo $fet['rolename'] ?></td>
                                            <td><?php echo $fet['roleaccess'] ?></td>
                                            <td><?php echo implode(" , ", $ro) ?></td>
                                            <td>
                                                <a href="roleupdate.php?id=<?php echo $fet['roleid'] ?>" class="btn btn-primary my-2">Update</a>
                                                <a href="roledelete.php?id=<?php echo $fet['roleid'] ?>" class="btn btn-danger my-2">Delete</a>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php
include('./include/footer.php');
?>