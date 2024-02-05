<?php
// Start the session and include the database connection file
session_start();
include 'db_conn.php';

// Initialize a variable to hold any error messages
$errorMsg = '';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['c_id'])) {
    // Assign the POST data to variables
    $c_id = $_POST['c_id'];
    $c_name = $_POST['c_name'];
    $c_time = $_POST['c_time'];
    $c_endtime = $_POST['c_endtime'];
    $c_room = $_POST['c_room'];
    $c_prof = $_POST['c_prof'];
    $c_day = isset($_POST['c_day']) ? $_POST['c_day'] : '';  // Default to an empty string if not set


    // Update the course in the database
    try {
        $stmt = $pdo->prepare("UPDATE courses SET c_name = ?, c_time = ?, c_endtime = ?, c_room = ?, c_prof = ?, c_day = ? WHERE c_id = ?");
        $stmt->execute([$c_id, $c_name, $c_time, $c_endtime, $c_room, $c_prof, $c_day]);

        // If you want to add Twilio notification after updating, you can call it here
        // send_twilio_notification($c_id);

        // Redirect to the course listing page or display success message
        header('Location: subject.php');
        exit;
    } catch (PDOException $e) {
        $errorMsg = "Error updating course: " . $e->getMessage();
    }
}

// If a course ID is provided, fetch the course data to pre-fill the form
if (isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM courses WHERE c_id = ?");
        $stmt->execute([$c_id]);
        $course = $stmt->fetch();

        // If no course is found, redirect back to the course listing or show an error
        if (!$course) {
            header('Location: subject.php');
            exit;
        }
    } catch (PDOException $e) {
        $errorMsg = "Error fetching course details: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <!-- Include your stylesheets here -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>
<body>
    <!-- Display any error messages -->
    <?php if ($errorMsg): ?>
        <p><?php echo $errorMsg; ?></p>
    <?php endif; ?>

    <!-- Display the form for editing a course -->
    <?php if (isset($course)): ?>
        <form action="update_course.php" method="post">
            <input type="hidden" name="c_id" value="<?php echo htmlspecialchars($course['c_id']); ?>">
            <label for="c_name">Course Name:</label>
            <input type="text" name="c_name" value="<?php echo htmlspecialchars($course['c_name']); ?>">
            <label for="c_time">Course Time:</label>
            <input type="text" name="c_time" value="<?php echo htmlspecialchars($course['c_time']); ?>">
            <input type="text" name="c_endtime" value="<?php echo htmlspecialchars($course['c_endtime']); ?>">
            <input type="text" name="c_room" value="<?php echo htmlspecialchars($course['c_room']); ?>">
            <input type="text" name="c_prof" value="<?php echo htmlspecialchars($course['c_prof']); ?>">
            <div class="form-group">
                                        <label class="col-sm-12">Select Day</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none ps-0 border-0 form-control-line" name="c_day">
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                            </select>
                                        </div>
                                    </div>
            
            <input type="submit" value="Update Course">
        </form>
    <?php endif; ?>
</body>
</html>
