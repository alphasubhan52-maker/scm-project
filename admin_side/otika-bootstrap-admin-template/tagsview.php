<?php
$conn=mysqli_connect("localhost","root","","php_project");




?>
<?php

// Fetch data from the database
$sql = "SELECT*FROM `tags`"; // Adjust query for your needs
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Achievements</th>
                <th>Skills</th>
                <th>Partners</th>
            </tr>";
            
    // Output data from each row
    while($row = $result->fetch_assoc()) {
        
        // Decode JSON data into PHP arrays
        $achievementsArray = json_decode($row['achievements'], true);
        $skillsArray = json_decode($row['skills'], true);
        $partnersArray = json_decode($row['partners'], true);
        
        // Join arrays into comma-separated strings for display
        $achievements = implode(", ", $achievementsArray); 
        $skills = implode(", ", $skillsArray);
        $partners = implode(", ", $partnersArray);
        
        // Display data in table rows
        echo "<tr>
                <td>" . htmlspecialchars($achievements) . "</td>
                <td>" . htmlspecialchars($skills) . "</td>
                <td>" . htmlspecialchars($partners) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
