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
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-header row">
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <?php
                                $sql = "SELECT*FROM `contact`";
                                $run = mysqli_query($conn, $sql);
                                ?>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Reply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($fet = mysqli_fetch_assoc($run)) {
                                    ?>
                                        <tr class="py-4">
                                            <th scope="row"><?php echo $fet['contactid'] ?></th>
                                            <td><?php echo $fet['firstname'] ?></td>
                                            <td><?php echo $fet['lastname'] ?></td>
                                            <td><?php echo $fet['subject'] ?></td>
                                            <td><?php echo $fet['email'] ?></td>
                                            <td><?php echo $fet['message'] ?></td>
                                            <td>
                                                <a href="msgreply.php?id=<?php echo $fet['contactid'] ?>" class="btn btn-primary">Reply</a>
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