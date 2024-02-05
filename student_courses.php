<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Student Courses</title>
    <style>
        /* Style for table */
        table.table-bordered {
            border-collapse: collapse;
            width: 100%;
        }

        table.table-bordered th,
        table.table-bordered td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        table.table-bordered th {
            background-color: #f2f2f2;
        }

        table.table-striped tbody tr:nth-child(odd) {
            background-color: #f5f5f5;
        }

        /* Optional: Style for action buttons */
        /* Add your own styles for action buttons here if needed */
        td.actions {
            text-align: center;
        }
    </style>


</head>
<body>
    <?php
    session_start(); // Ensure this is at the top to start or resume a session
    include 'db_conn.php'; // Adjust the path as necessary

    // Check if the user is logged in, using the same session variable as set in login script
    if (!isset($_SESSION['user_id'])) {
        die("You must be logged in to perform this action.");
    }
    $s_id = $_SESSION['user_id']; // Use the same session variable name as in the login script

    try {
        // Adjusted query to fetch user-specific courses along with c   ourse names and professors
        $stmt = $pdo->prepare("
            SELECT sc.*, c.c_name, c.c_prof, c.c_time
            FROM student_courses sc
            JOIN courses c ON sc.c_id = c.c_id
            WHERE sc.s_id = ?
        ");
        $stmt->execute([$s_id]);
        $courses = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Could not fetch courses: " . $e->getMessage());
    }
    ?>

<nav class="navbar">
        <!-- Navigation bar -->
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.html" class="nav-link">Homepage</a>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View All Courses here</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course</th>
                                        <th>Professor</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($courses as $course): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($course['c_id']); ?></td>
                                        <td><?= htmlspecialchars($course['c_name']); ?></td>
                                        <td><?= htmlspecialchars($course['c_prof']); ?></td>
                                        <td><?= htmlspecialchars($course['c_time']); ?></td>
                                        <td>
                                            <a href="remove_course_student.php?c_id=<?= $course['c_id']; ?>" class="btn btn-primary">Remove</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>