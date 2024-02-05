<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Main Page</title>
    <link rel="stylesheet" href="./css/main.css">
    <style>
        .center-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .button {
            width: 150px;
            text-align: center;
            padding: 10px 20px;
            margin: 10px;
            font-size: 20px;
            background-color: #4CAF50;;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #2d762f;
        }
    </style>
</head>


<body>
<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['user_id'])) {
    $s_id = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("
            SELECT c.* 
            FROM student_courses sc
            JOIN courses c ON sc.c_id = c.c_id
            WHERE sc.s_id = ?
        ");
        $stmt->execute([$s_id]);
        $courses = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Could not fetch courses: " . $e->getMessage());
    }
} else {
    // Redirect the user to the login page if not logged in
    header('Location: login.php');
    exit;
}
?>


<!-- Navigation bar -->
 <nav class="navbar">
        <!-- Navigation bar -->
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link active">Logout</a>
                </li>
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

<!-- Main content -->
<!-- Adding a table to display the courses -->
     <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Courses you take:</h4>
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Course Name</th>
                                                <th class="border-top-0">Time</th>
                                                <th class="border-top-0">End Time</th>
                                                <th class="border-top-0">Room</th>
                                                <th class="border-top-0">Professor</th>
                                                <th class="border-top-0">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody id="courseTableBody">
                                        <?php if (is_array($courses) && !empty($courses)): ?>
                                        <?php foreach ($courses as $course): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($course['c_id']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_name']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_time']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_endtime']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_room']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_prof']); ?></td>
                                                <td>
                                                    <a href="remove-course.php?c_id=<?php echo $course['c_id']; ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to remove this course?');">Remove</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="6">No courses found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</body>
</html>