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
                     <h2 style="font-family:sans-serif;color:black;">View Category</h2>
                     <a href="./categoryname.php">
                   <button class="btn btn-primary">Add Category</button>
                    </a>
                   </div>
                </div>
                  <div class="card-body">
                    <table class="table">
                        <?php
                        $sql="SELECT*FROM `categoryname`";
                        $run=mysqli_query($conn,$sql);
                        ?>
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Description</th>
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
                          <td><?php echo $fet['description']?></td>
                <td>
                <a href="categoryupdate.php?id=<?php echo $fet['id']?>" class="btn btn-primary my-2">Update</a>
                <a href="categorydelete.php?id=<?php echo $fet['id']?>" class="btn btn-danger my-2">Delete</a>

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