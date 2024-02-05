<?php
include 'db_conn.php';  // Make sure this path is correct

if (isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];

    // Optional: Additional validation or sanitization of c_id can be done here

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("DELETE FROM courses WHERE c_id = ?");
        $stmt->execute([$c_id]);

        // Redirect back to the courses page or display success message
        header('Location: table-basic.php');
        exit;
    } catch (PDOException $e) {
        // Handle any errors
        die("Could not remove course: " . $e->getMessage());
    }
} else {
    // c_id is not set, handle the error
    die("Invalid request: c_id not set.");
}
?>
