<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">

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

        /* Optional: Style for action buttons */
        /* Add your own styles for action buttons here if needed */
        td.actions {
            text-align: center;
        }
    </style>

        

</head>

<body>
    <?php
    include 'db_conn.php';

    try {
        $stmt = $pdo->prepare("SELECT * FROM courses");
        $stmt->execute();
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
                    <a href="login.php" class="nav-link active">Login</a>
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



    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View All Courses here</h4>
                        
                        <form action="enroll_course.php" method="post">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course</th>
                                        <th>Professor</th>
                                        <th>Time</th>
                                        <th> Day</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="studentTableBody">
                                    <?php if (is_array($courses) && !empty($courses)): ?>
                                        <?php foreach ($courses as $course): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($course['c_id']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_name']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_prof']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_time']); ?></td>
                                                <td><?php echo htmlspecialchars($course['c_day']); ?></td>
                                                <td class="actions">
                                                        <input type="checkbox" name="checkbox[]" value="<?php echo htmlspecialchars($course['c_id']); ?>">
                                                    </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">No course found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                            <input type="submit" class="button" value="Enroll">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
