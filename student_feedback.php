<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

$feedbackSubmitted = false;
$errorMessage = '';

// Process the form if it's submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    include 'db_conn.php'; // Make sure your database connection file is correct

    $rating = $_POST['rating'];
    $studentId = $_SESSION['user_id']; // Assuming 's_id' is the student ID in your session

    // Insert into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO feedback (s_id, s_feedback) 
        VALUES (?, ?) 
        ON DUPLICATE KEY UPDATE s_feedback = VALUES(s_feedback);");
        $stmt->execute([$studentId, $rating]);
        $feedbackSubmitted = true;
    } catch (PDOException $e) {
        $errorMessage = "Error submitting feedback: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="./css/main.css">
    <!-- Include other styles if necessary -->
</head>
<body>

 <nav class="navbar">
        <!-- Navigation bar -->
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="student_main.php" class="nav-link">Homepage</a>
                </li>
                  <!-- Only show logout if the user is logged in -->
            <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">Logout</a>
            </li>
            <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?php if ($feedbackSubmitted): ?>
        <p>Thank you for your feedback!</p>
    <?php else: ?>
        <?php if ($errorMessage): ?>
            <p>Error: <?= $errorMessage ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <p>How would you rate your experience?</p>
            <input type="radio" id="good" name="rating" value="good">
            <label for="good">Good</label><br>
            
            <input type="radio" id="average" name="rating" value="average">
            <label for="average">Average</label><br>
            
            <input type="radio" id="bad" name="rating" value="bad">
            <label for="bad">Bad</label><br>
            
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>
