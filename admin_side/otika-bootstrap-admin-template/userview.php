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
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header row">
                            <div class="justify-content-center">
                                <h2 style="font-family:sans-serif;color:black;">ViewUser</h2>
                                <a href="./user.php">
                                    <button class="btn btn-primary">Add User</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <?php
                                $sql = "SELECT*FROM `login`";
                                $run = mysqli_query($conn, $sql);
                                ?>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($fet = mysqli_fetch_assoc($run)) {
                                    ?>
                                        <tr class="py-4">
                                            <th scope="row"><?php echo $fet['loginid'] ?></th>
                                            <td><?php echo $fet['name'] ?></td>
                                            <td><?php echo $fet['email'] ?></td>
                                            <td><?php echo $fet['password'] ?></td>
                                            <td><?php echo $fet['role'] ?></td>
                                            <td>
                                                <a href="userupdate.php?logid=<?php echo $fet['loginid'] ?>" class="btn btn-primary my-2">Update</a>
                                                <a href="userdelete.php?logid=<?php echo $fet['loginid'] ?>" class="btn btn-danger my-2">Delete</a>

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