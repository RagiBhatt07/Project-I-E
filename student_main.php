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
    include 'db_conn.php';
    ?>


 <nav class="navbar">
        <!-- Navigation bar -->
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="student_main.php" class="nav-link">Homepage</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
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


    <div class="center-container">
        <a href="student_choice.php" class="button">All Courses</a>
        <a href="display_course.php" class="button">My Courses</a>
        <a href="calendar.php" class="button">Calendar</a>
    </div>
</body>
</html>
