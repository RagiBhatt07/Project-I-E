<?php
include 'db_conn.php';  // Make sure this path is correct

// Check if c_id is set in the URL and if it's a valid number
if (isset($_GET['c_id']) && is_numeric($_GET['c_id'])) {
    $c_id = $_GET['c_id'];

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("DELETE FROM courses WHERE c_id = ?");
        $stmt->execute([$c_id]);

        // Redirect back to the courses page or display success message
        header('Location: subject.php');
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