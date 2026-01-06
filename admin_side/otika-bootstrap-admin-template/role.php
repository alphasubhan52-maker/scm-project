<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
if (isset($_POST['submit'])) {
    $rolename = mysqli_real_escape_string($conn, $_POST['rolename']);
    $roleaccess = mysqli_real_escape_string($conn, $_POST['roleaccess']);
    if ($roleaccess == "Custom") {
        $rol = $_POST['role'];
        $role = serialize($rol);
        $msg = "Right";
    } else {
        $role = $_POST['role'];
        $msg = "Right";
    }
    if ($msg == "Right") {
        $sql = "INSERT INTO `role` (`rolename`,`roleaccess`,`role`) VALUES ('$rolename','$roleaccess','$role')";
        $run = mysqli_query($conn, $sql);
    }
    if ($run) {
        echo "<script>alert('Role has been inserted successfully!');</script>";
        echo "<script>
        setTimeout(function(){ window.location.href = './roleview.php';},1000);
        </script>";
    }
}
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">

                <div class="card">
                    <div class="card-header row">
                        <div class="justify-content-center">
                            <h2 style="font-family:sans-serif;color:black;">Role</h2>
                            <a href="./roleview.php">
                                <button class="btn btn-primary">View Role</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-row" action="" method="post">
                            <div class="form-group col-12">
                                <label for="inputEmail4">Role Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="rolename"
                                    placeholder="Role Name">
                            </div>
                            <div class="form-group col-12">
                                <label for="racs">Role Access</label>
                                <select name="roleaccess" class="form-control" id="racs">
                                    <option value="selected">----Select----</option>
                                    <option value="all" id="all">All</option>
                                    <option value="Custom" id="custom">Custom</option>
                                </select>
                            </div>
                            <div class="box" style="display: none;">
                                <input type="checkbox" name="role[]" value="category">
                                <label for="category">Category</label>
                                <br>
                                <input type="checkbox" name="role[]" value="planner">
                                <label for="planner">Planner</label>
                                <br>
                                <input type="checkbox" name="role[]" value="designer">
                                <label for="designer">Designer</label>
                                <br>
                                <input type="checkbox" name="role[]" value="volunteer">
                                <label for="volunteer">Volunteer</label>
                                <br>
                                <input type="checkbox" name="role[]" value="venue">
                                <label for="venue">Venue</label>
                                <br>
                                <input type="checkbox" name="role[]" value="booking">
                                <label for="booking">Booking</label>
                                <br>
                                <input type="checkbox" name="role[]" value="payment">
                                <label for="booking">Payment</label>
                                <br>
                                <input type="checkbox" name="role[]" value="news">
                                <label for="news">News</label>
                                <br>
                                <input type="checkbox" name="role[]" value="event">
                                <label for="event">Events</label>
                                <br>
                                <input type="checkbox" name="role[]" value="client">
                                <label for="event">Client</label>
                            </div>
                    </div>

                    <div class="px-4 py-2 col-4">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                    </form>

                </div>
            </div>
        </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("change", "#racs", function(e) {
            e.preventDefault();
            if ($("#racs").val() == "Custom") {
                $(".box").show();
            } else {
                $(".box").hide();
            }
        })
    })
</script>
<?php
include('./include/footer.php');
?>