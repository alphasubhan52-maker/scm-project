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
                <h1 style="font-family:sans-serif;color:black;">View Event</h1>
                <a href="./event.php">
                  <button class="btn btn-primary">Add Event</button>
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <?php
                $sql = "SELECT*FROM `event` INNER JOIN `categoryname` ON event.category=categoryname.id";
                $run = mysqli_query($conn, $sql);
                ?>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Images</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($fet = mysqli_fetch_assoc($run)) {
                  ?>
                    <tr class="py-4">
                      <th scope="row"><?php echo $fet['eventid'] ?></th>
                      <td><?php echo $fet['name'] ?></td>
                      <td><?php echo $fet['title'] ?></td>
                      <td><?php echo $fet['date'] ?></td>
                      <td>
                        <?php
                        $pho = unserialize($fet['images']);
                        foreach ($pho as $mg) {
                        ?>
                          <img src="<?php echo "./image/" . $mg; ?>" width="70" alt="image">
                        <?php
                        }
                        ?>
                      </td>
                      <td><?php echo $fet['eventdescription'] ?></td>
                      <td>
                        <a href="eventupdate.php?id=<?php echo $fet['eventid'] ?>" class="btn btn-primary">Update</a>
                        <a href="eventdelete.php?id=<?php echo $fet['eventid'] ?>" class="btn btn-danger my-2">Delete</a>
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