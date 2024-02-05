<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_id = $_SESSION['user_id'];  // Assuming you store logged-in student's ID in the session
    $selected_courses = $_POST['checkbox'];  // Array of selected course IDs

    foreach ($selected_courses as $c_id) {
        try {
            $stmt = $pdo->prepare("INSERT INTO student_courses (s_id, c_id) VALUES (?, ?)");
            $stmt->execute([$s_id, $c_id]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            // Handle error or duplicate entry (if student already enrolled in the course)
        }
    }
    // Redirect or notify the user after successful enrollment
    header("Location: student_main.php");  // Redirect to a confirmation page or back to course list
    exit;
}
?>
