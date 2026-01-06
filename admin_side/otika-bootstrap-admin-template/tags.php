<?php
$conn=mysqli_connect("localhost","root","","php_project");
if(isset($_POST['submit'])){
    $achievements = isset($_POST['achievements']) ? $_POST['achievements'] : '';
    $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
    $partners = isset($_POST['partners']) ? $_POST['partners'] : '';

    // Example: convert comma-separated values into JSON arrays (or leave as strings if preferred)
    $achievementsArray = explode(',', $achievements); // splitting based on commas
    $skillsArray = explode(',', $skills);
    $partnersArray = explode(',', $partners);

    // Convert arrays to JSON for storage in the database
    $achievementsJSON = json_encode(array_map('trim', $achievementsArray)); // Trim values
    $skillsJSON = json_encode(array_map('trim', $skillsArray));
    $partnersJSON = json_encode(array_map('trim', $partnersArray));

    // Prepare the SQL query to insert data
    $sql = "INSERT INTO users_data (achievements, skills, partners) VALUES ('$achievementsJSON', '$skillsJSON', '$partnersJSON')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <label for="achievements">Achievements</label>
    <input type="text" name="achievements" id="achievements" value="" placeholder="Enter achievements">

    <label for="skills">Skills</label>
    <input type="text" name="skills" id="skills" value="" placeholder="Enter skills">

    <label for="partners">Partners</label>
    <input type="text" name="partners" id="partners" value="" placeholder="Enter partners">

    <input type="submit" value="Submit" name="submit">
</form>

</body>
</html>
<?php
include('./include/footer.php');
?>