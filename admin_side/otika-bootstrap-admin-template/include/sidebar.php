<?php
include('./connection.php');
// session_start();
$roleid = $_SESSION['role'];
$sql = "SELECT * FROM `role` WHERE `rolename`='$roleid'";
$run = mysqli_query($conn, $sql);
$fet = mysqli_fetch_assoc($run);
$roles = unserialize($fet['role']);

$roleaccess = $fet['roleaccess'];
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <?php
      $lsql = "SELECT * FROM `profile`";
      $lrun = mysqli_query($conn, $lsql);
      $lfet = mysqli_fetch_assoc($lrun);
      ?>
      <a href="index.php"> <img alt="image" src="<?php echo "./image/" . $lfet['logo'] ?>" style="height:70px;" class="header-logo my-2" />
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown active">
        <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <?php
      if ($roleaccess == "all" || in_array("category", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./categoryname.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Category</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./categoryname.php">Add Category</a></li>
            <li><a class="nav-link" href="./categoryview.php">View Category</a></li>
          </ul>
        </li>
      <?php
      }


      if ($roleaccess == "all" || in_array("planner", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./planner.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Planner</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./planner.php">Add Planner</a></li>
            <li><a class="nav-link" href="./plannerview.php">View Planner</a></li>
          </ul>
        </li>
      <?php
      }

      if ($roleaccess == "all" || in_array("designer", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./designer.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Designer</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./designer.php">Add Design</a></li>
            <li><a class="nav-link" href="./designerview.php">View Design</a></li>
          </ul>
        </li>
      <?php
      }

      if ($roleaccess == "all" || in_array("volunteer", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./designer.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Volunteer</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./volunteer.php">Add Volunteer</a></li>
            <li><a class="nav-link" href="./volunteerview.php">View Volunteer</a></li>
          </ul>
        </li>
      <?php
      }

      if ($roleaccess == "all" || in_array("venue", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./designer.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Venue</span></a>
          <ul class="dropdown-menu">
            <li class="dropdown">
              <a href="./designer.php" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Venue</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./venue.php">Add Venue</a></li>
                <li><a class="nav-link" href="./venueview.php">View Venue</a></li>
              </ul>
            </li>
          <?php
        }

        if ($roleaccess == "all" || in_array("city", $roles)) {
          ?>
            <li class="dropdown">
              <a href="./designer.php" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>City</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="./city.php">Add City</a></li>
                <li><a class="nav-link" href="./cityview.php">View City</a></li>
              </ul>
            </li>
          </ul>
        </li>
      <?php
        }
        if ($roleaccess == "all" || in_array("booking", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./booking.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Booking</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./booking.php">Add Booking</a></li>
            <li><a class="nav-link" href="./bookingview.php">View Booking</a></li>
          </ul>
        </li>
      <?php
        }

        if ($roleaccess == "all" || in_array("news", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./news.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>News</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./news.php">Add News</a></li>
            <li><a class="nav-link" href="./newsview.php">View News</a></li>
          </ul>
        </li>
      <?php
        }

        if ($roleaccess == "all" || in_array("event", $roles)) {
      ?>
        <li class="dropdown">
          <a href="./event.php" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Event</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./event.php">Add Event</a></li>
            <li><a class="nav-link" href="./eventview.php">View Event</a></li>
          </ul>
        </li>
      <?php
        }

        if ($roleaccess == "all" || in_array("client", $roles)) {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Customer Message's</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./message.php">View Message</a></li>
          </ul>
        </li>
      <?php
        }

        if ($roleaccess == "all") {
      ?>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>User Management</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./role.php">Enter Role</a></li>
            <li><a class="nav-link" href="./roleview.php">View Role</a></li>
          </ul>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="./user.php">Add User</a></li>
            <li><a class="nav-link" href="./userview.php">View User</a></li>
          </ul>
        </li>
      <?php
        }
      ?>
    </ul>
  </aside>
</div>