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
                    <h1 style="font-family:sans-serif;color:black;">View Booking</h1>
                    <a href="./booking.php">
                   <button class="btn btn-primary">Add Booking</button>
                    </a>
                     </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-responsive">
                        <?php
                        $sql="SELECT*FROM `booking` INNER JOIN `categoryname` ON booking.category=categoryname.id
                        INNER JOIN `country` ON booking.country=country.contid  INNER JOIN `state`
                         ON booking.state=state.stateid  INNER JOIN `city` ON booking.city=city.id
                         INNER JOIN `venue` ON booking.venue=venue.id";
                        $run=mysqli_query($conn,$sql);
                        ?>
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Category</th>
                          <th scope="col">Client Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Occasion Title</th>
                          <th scope="col">Occasion Date</th>
                          <th scope="col">Occasion Time</th>
                          <th scope="col">Country</th>
                          <th scope="col">State</th>
                          <th scope="col">City</th>
                          <th scope="col">Seats</th>
                          <th scope="col">Venue</th>
                          <th scope="col">Description</th>
                          <th scope="col">Type</th>
                          <th scope="col">Image</th>
                          <th scope="col">Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            while($fet=mysqli_fetch_assoc($run)){
                            ?>
                        <tr class="py-4">
                          <th scope="row"><?php echo $fet['bookingid']?></th>
                          <td><?php echo $fet['name']?></td>
                          <td><?php echo $fet['clientname']?></td>
                          <td><?php echo $fet['email']?></td>
                          <td><?php echo $fet['contact']?></td>
                          <td><?php echo $fet['title']?></td>
                          <td><?php echo $fet['date']?></td>
                          <td><?php echo $fet['time']?></td>
                          <td><?php echo $fet['contname']?></td>
                          <td><?php echo $fet['statename']?></td>
                          <td><?php echo $fet['cityname']?></td>
                          <td><?php echo $fet['seats']?></td>
                          <td><?php echo $fet['venuename']?></td>
                          <td><?php echo $fet['description']?></td>
                          <td><?php echo $fet['type']?></td>
                          <td>
                            <img src="<?php echo "./image/".$fet['image']?>" width="70" alt="image">
                          </td>
                <td>
                <a href="bookingupdate.php?id=<?php echo $fet['bookingid']?>" class="btn btn-primary my-2">Update</a>
                <a href="bookingdelete.php?id=<?php echo $fet['bookingid']?>" class="btn btn-danger my-2">Delete</a>

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
