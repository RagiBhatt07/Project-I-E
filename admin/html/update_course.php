<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve POST data
    $c_id = $_POST['c_id'];
    $c_name = $_POST['c_name'];
    $c_time = $_POST['c_time'];
    $c_endtime = $_POST['c_endtime'];
    $c_room = $_POST['c_room'];
    $c_prof = $_POST['c_prof'];
    $c_day = $_POST['c_day'];

    try {
        // Prepare and execute the update statement
        $stmt = $pdo->prepare("UPDATE courses SET c_name = ?, c_time = ?, c_endtime = ?, c_room = ?, c_prof = ?, c_day = ? WHERE c_id = ?");
        $stmt->execute([$c_name, $c_time, $c_endtime, $c_room, $c_prof, $c_day, $c_id]);

        
        // Store a success message in session and provide a link to notify students
        $_SESSION['update_success'] = "Course updated successfully. <a href='notify-student.php?c_id=$c_id'>Notify Students?</a>";
    } catch (PDOException $e) {
        $_SESSION['update_error'] = "Error updating course: " . $e->getMessage();
    }

    // Redirect back to the course page with a success message
    header('Location: subject.php');
    exit;
}
?>
