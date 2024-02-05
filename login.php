<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Login</title>
</head>

<?php
// Start a new session or resume the existing session
session_start();

// Include your database connection file here
require 'db_conn.php';

// Initialize a variable to store potential error messages
$errorMsg = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Invalid email format";
    } else {
        // Prepare a select statement
        $stmt = $pdo->prepare("SELECT s_id, s_email, s_password FROM register WHERE s_email = :email");
        // Bind parameters
        $stmt->bindParam(':email', $email);
        // Execute the statement
        $stmt->execute();

        // Check if any record was found
        if ($stmt->rowCount() == 1) {
            // Fetch the result
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row['s_password'];
            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, so start a new session
                $_SESSION['user_id'] = $row['s_id'];
                $_SESSION['email'] = $row['s_email'];
                // Redirect the user to their dashboard (or other page)
                header("location: student_main.php");
                exit;
            } else {
                // Password is not valid
                $errorMsg = "Invalid password";
            }
        } else {
            // No account found with that email
            $errorMsg = "No account found with that email.";
        }
    }
}

// If there was an error, it will be stored in $errorMsg
?>


<body>
    <nav class="navbar">
        <!-- Navigation bar -->
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="login.php" class="nav-link active">Login</a>
                </li>
                <li class="nav-item">
                    <a href="index.html" class="nav-link">Homepage</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link">Register</a>
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

    <!-- Login form -->
    <?php if ($errorMsg): ?>
<p class="error"><?php echo $errorMsg; ?></p>
<?php endif; ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Login</h2>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Login</button>
</form>
</body>
</html>
