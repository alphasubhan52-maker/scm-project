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
              <div>
                <h1 style="font-family:sans-serif;color:black;">View Planner</h1>
                <a href="./planner.php">
                  <button class="btn btn-primary">Add Planner</button>
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <?php
                $sql = "SELECT*FROM `planner` INNER JOIN `experience` ON planner.experience=experience.expid";
                $run = mysqli_query($conn, $sql);

                ?>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Achievements</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Partners</th>
                    <th scope="col">Password</th>
                    <th scope="col">Confirm Password</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($fet = mysqli_fetch_assoc($run)) {
                  ?>
                    <tr class="py-4">
                      <th scope="row"><?php echo $fet['id'] ?></th>
                      <td><?php echo $fet['name'] ?></td>
                      <td><?php echo $fet['lastname'] ?></td>
                      <td><?php echo $fet['email'] ?></td>
                      <td><?php echo $fet['dob'] ?></td>
                      <td><?php echo $fet['gender'] ?></td>
                      <td><?php echo $fet['phone'] ?></td>
                      <td><?php echo $fet['city'] ?></td>
                      <td><?php echo $fet['experienceyear'] ?></td>
                      <td><?php echo $fet['achievements'] ?></td>
                      <td><?php echo $fet['skills'] ?></td>
                      <td><?php echo $fet['partners'] ?></td>
                      <td><?php echo $fet['password'] ?></td>
                      <td><?php echo $fet['confirmpassword'] ?></td>
                      <td><?php echo $fet['address'] ?></td>
                      <td>
                        <img src="<?php echo "./image/" . $fet['image'] ?>" width="70" alt="image">
                      </td>
                      <td>
                        <a href="plannerupdate.php?id=<?php echo $fet['id'] ?>" class="btn btn-primary my-2">Update</a>
                        <a href="plannerdelete.php?id=<?php echo $fet['id'] ?>" class="btn btn-danger my-2">Delete</a>

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