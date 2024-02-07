<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Register</title>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file here
    require 'db_conn.php';

    // Get the form input values
    $s_id = $_POST['s_id']; // Assuming this is how you collect the student ID from the form
    $s_lastname = $_POST['s_lastname'];
    $s_firstname = $_POST['s_firstname'];
    $s_year = $_POST['s_year'];
    $s_email = $_POST['s_email'];
    $s_password = $_POST['s_password'];
    $s_phone = $_POST['s_phone']; // You should hash passwords before storing

    // Check for valid email
    if (!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Check for duplicate student ID
        $stmt = $pdo->prepare("SELECT * FROM register WHERE s_id = ?");
        $stmt->execute([$s_id]);
        if ($stmt->rowCount() > 0) {
            echo "A user with this student ID already exists.";
        } else {
            // No duplicate student ID, continue with email check
            $stmt = $pdo->prepare("SELECT * FROM register WHERE s_email = ?");
            $stmt->execute([$s_email]);
            if ($stmt->rowCount() > 0) {
                echo "A student with this email already exists.";
            } else {
                // Email is also unique, proceed to insert new record
                $hashed_password = password_hash($s_password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO register (s_id, s_lastname, s_firstname, s_year, s_email, s_password, s_phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$s_id, $s_lastname, $s_firstname, $s_year, $s_email, $hashed_password, $s_phone])) {
                    echo "Registration successful!";
                } else {
                    echo "Error: " . $stmt->errorInfo()[2];
                }
            }
        }
    }
}
?>



    <nav class="navbar">
        <!-- Navigation bar -->
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="index.html" class="nav-link">Homepage</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Registration form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="max-width: 400px; margin: auto;">
    <h2 style="text-align:center;">Register</h2>
    <div style="display: flex; flex-direction: column; gap: 10px;">
        <input type="text" name="s_id" placeholder="Student ID" required>
        <input type="text" name="s_lastname" placeholder="Last Name" required>
        <input type="text" name="s_firstname" placeholder="First Name" required>
        
        <select type="year" name="s_year" required>
            <option value="" disabled selected>Select your year</option>
            <option value="M1 AI">M1 AI</option>
            <option value="M2 AI">M2 AI</option>
            <option value="M1 DS">M1 DS</option>
            <option value="M2 DS">M2 DS</option>
            <option value="M2 HCI">M2 HCI</option>
        </select>
        
        <input type="email" name="s_email" placeholder="Email" required>
        <input type="password" name="s_password" placeholder="Password" required>
        <input type="phone" name="s_phone" placeholder="Phone" required>
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;">Register</button>
    </div>
</form>

</body>
</html>
