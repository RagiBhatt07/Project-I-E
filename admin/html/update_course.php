<?php
session_start(); // Start the session at the beginning of the script
include 'db_conn.php';
require 'notify_students.php'; // This will be your Twilio integration script

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['c_id'])) {
    // Assign POST data to variables here
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['c_id'])) {
        $c_id = $_POST['c_id'];
        $c_name = $_POST['c_name'];
        $c_time = $_POST['c_time'];
        $c_endtime = $_POST['c_endtime'];
        $c_room = $_POST['c_room'];
        $c_prof = $_POST['c_prof'];
        $c_day = $_POST['c_day'];
        
    }
    

    try {
        $stmt = $pdo->prepare("UPDATE courses SET c_name = ?, c_time = ?, c_endtime = ?, c_room = ?, c_prof = ?, c_day = ? WHERE c_id = ?");
        $stmt->execute([$c_id, $c_name, $c_time, $c_endtime, $c_room, $c_prof, $c_day]); // Make sure variables are included in an array

        // After updating the course, send notifications to enrolled students
        notify_students($c_id, $c_name); // This function will be defined in notify_students.php

        // Set a session variable with the success message
        $_SESSION['feedback'] = "Course updated successfully.";
    } catch (PDOException $e) {
        // Set a session variable with the error message
        $_SESSION['feedback'] = "Error updating course: " . $e->getMessage();
    }

    // Redirect back to the course listing page or another appropriate page
    header('Location: subject.php');
    exit;
}
?>
