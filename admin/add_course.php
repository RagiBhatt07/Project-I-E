<?php
// Include your database configuration file
include 'db_config.php';  // Ensure this file contains your PDO connection $pdo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $c_id = $_POST['c_id'];
    $c_name = $_POST['c_name'];
    $c_time = $_POST['c_time'];
    $c_endtime = $_POST['c_endtime'];
    $c_room = $_POST['c_room'];
    $c_prof = $_POST['c_prof'];
    $c_date = $_POST['c_date'];

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO courses (c_name, c_time, c_room, c_prof) VALUES (?, ?, ?, ?)");
        $stmt->execute([$c_name, $c_time, $c_room, $c_prof]);
        echo "Course added successfully";
    } catch (PDOException $e) {
        // Handle any errors
        die("Could not add course: " . $e->getMessage());
    }
}
?>
