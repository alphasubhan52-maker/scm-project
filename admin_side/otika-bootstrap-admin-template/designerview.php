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
                    <h1 style="font-family:sans-serif;color:black;">View Designer</h1>
                    <a href="./designer.php">
                   <button class="btn btn-primary">Add Designer</button>
                    </a>
                     </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-responsive">
                        <?php
                        $sql="SELECT*FROM `designer` INNER JOIN `experience` ON designer.experience=experience.expid
                        INNER JOIN `design` ON designer.design=design.designid";
                        $run=mysqli_query($conn,$sql);
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
                          <th scope="col">Design</th>
                          <th scope="col">Description</th>
                          <th scope="col">Company</th>
                          <th scope="col">Color</th>
                          <th scope="col">Tools</th>
                          <th scope="col">Content</th>
                          <th scope="col">Number</th>
                          <th scope="col">Password</th>
                          <th scope="col">Confirm Password</th>
                          <th scope="col">Address</th>
                          <th scope="col">Image</th>
                          <th scope="col">Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            while($fet=mysqli_fetch_assoc($run)){
                            ?>
                        <tr class="py-4">
                          <th scope="row"><?php echo $fet['id']?></th>
                          <td><?php echo $fet['name']?></td>
                          <td><?php echo $fet['lastname']?></td>
                          <td><?php echo $fet['email']?></td>
                          <td><?php echo $fet['dob']?></td>
                          <td><?php echo $fet['gender']?></td>
                          <td><?php echo $fet['phone']?></td>
                          <td><?php echo $fet['city']?></td>
                          <td><?php echo $fet['experienceyear']?></td>
                          <td><?php echo $fet['designname']?></td>
                          <td><?php echo $fet['description']?></td>
                          <td><?php echo $fet['company']?></td>
                          <td><?php echo $fet['color']?></td>
                          <td><?php echo $fet['tools']?></td>
                          <td><?php echo $fet['content']?></td>
                          <td><?php echo $fet['number']?></td>
                          <td><?php echo $fet['password']?></td>
                          <td><?php echo $fet['confirmpassword']?></td>
                          <td><?php echo $fet['address']?></td>
                          <td>
                            <img src="<?php echo "./image/".$fet['image']?>" width="70" alt="image">
                          </td>
                <td>
                <a href="designerupdate.php?id=<?php echo $fet['id']?>" class="btn btn-primary my-2">Update</a>
                <a href="designerdelete.php?id=<?php echo $fet['id']?>" class="btn btn-danger my-2">Delete</a>

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
