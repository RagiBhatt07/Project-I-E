<?php
// Start or resume the session
session_start();

include 'db_conn.php'; // Adjust this path as necessary

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to perform this action.");
}

// Check if c_id is set in the URL
if (isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];

    try {
        // Prepare SQL statement to delete the course
        // Ensure that the delete operation is restricted to the logged-in user's courses
        $stmt = $pdo->prepare("DELETE FROM student_courses WHERE c_id = :c_id AND s_id = :s_id");
        $stmt->bindValue(':c_id', $c_id);
        $stmt->bindValue(':s_id', $_SESSION['user_id']); // Use user_id session variable
        $stmt->execute();    

        // Adjust the redirect location as necessary
        header('Location: student_courses.php'); // Ensure this path is correct
        exit;
    } catch (PDOException $e) {
        // Handle any errors
        die("Could not remove course: " . $e->getMessage());
    }
} else {
    // c_id is not set or not valid, handle the error
    die("Invalid request");
}
?>
