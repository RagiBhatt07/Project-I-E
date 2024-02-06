<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weekly Calendar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <style>
     body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f2f5;
    }
    .calendar {
      display: flex;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin: 20px;
      overflow: hidden;
    }
    .timeline {
      flex: 0 0 50px;
    }
    .time-marker {
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      padding-right: 10px;
      box-sizing: border-box;
      position: relative;
    }
    .days {
      display: flex;
      flex: 1;
      position: relative; /* For absolute positioning of lines */
    }
    .day {
      flex: 1;
      min-width: 0;
      border-left: 1px solid #ccc;
      position: relative;
    }
    .date-day {
      height: 60px;
      background-color: #f9f9f9;
      text-align: center;
      font-weight: bold;
      border-bottom: 1px solid #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .events {
      position: absolute;
      top: 60px;
      left: 0;
      right: 0;
      bottom: 0;
    }
    .event {
      position: absolute;
      left: 0;
      right: 0;
      padding: 10px;
      margin: 1px 0; /* Small margin for separating events */
      border: 1px solid #ccc;
      background-color: #f0f0f0;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      box-sizing: border-box;
    }
    .title {
      font-weight: bold;
      margin-bottom: 5px;
    }
    /* Add horizontal grid lines */
    .grid-line {
      position: absolute;
      left: 0px; /* Starts after the timeline */
      right: 0;
      border-top: 1px solid #ccc;
      z-index: 0;
    }
    .day:first-child .grid-line {
      left: 0; /* Start lines from the very left edge on the first day column */
    }
    .event:nth-child(1) { background-color: #ffcccc; }
    .event:nth-child(2) { background-color: #ccffcc; }
    .event:nth-child(3) { background-color: #ccccff; }
    .event:nth-child(4) { background-color: #ffffcc; }
    .event:nth-child(5) { background-color: #ffccff; }
  </style>
</head>
<body>
<nav class="navbar">
  <!-- Navigation bar -->
  <div class="nav-container">
      <ul class="nav-menu">
          <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
          </li>
          <li class="nav-item">
              <a href="student_main.php" class="nav-link">Homepage</a>
          </li>
      </ul>
  </div>
</nav>
  
<div class="calendar">
  <div class="timeline">
  <div class="time-marker" style="top: 60px;"></div>
    <div class="time-marker">8 AM</div>
    <div class="time-marker">9 AM</div>
    <div class="time-marker">10 AM</div>
    <div class="time-marker">11 AM</div>
    <div class="time-marker">12 PM</div>
    <div class="time-marker">1 PM</div>
    <div class="time-marker">2 PM</div>
    <div class="time-marker">3 PM</div>
    <div class="time-marker">4 PM</div>
    <div class="time-marker">5 PM</div>
    <div class="time-marker">6 PM</div>
    <div class="time-marker">7 PM</div>
    <div class="time-marker">8 PM</div>
    <div class="time-marker">9 PM</div>
    <div class="time-marker">10 PM</div>
  </div>

  <div class="days">
  <?php for ($hour = 8; $hour <= 18; $hour++): ?>
      <div class="grid-line" style="top: <?= ($hour - 7) * 60 ?>px; left: 0;"></div>
    <?php endfor; ?>
    <?php
    include 'retrieve_courses.php';
    $courses = getCourses();
    
    // Function to calculate the start of the week
    function getStartOfWeek($courses) {
      $courseDates = array_map(function($course) {
        return strtotime($course['c_time']);
      }, $courses);
      sort($courseDates);
      $firstCourseDate = $courseDates[0];
      return strtotime('monday this week', $firstCourseDate);
    }

    // Calculate the week dates from Monday to Friday based on the first course
    $startOfWeek = getStartOfWeek($courses);
    $daysOfWeek = ["Mon", "Tue", "Wed", "Thu", "Fri"];
    $weekDates = array_combine($daysOfWeek, array_map(function($dayOffset) use ($startOfWeek) {
      return date('Y-m-d', strtotime("+$dayOffset days", $startOfWeek));
    }, range(0, 4)));

    foreach ($daysOfWeek as $day) {
      $dateOfDay = $weekDates[$day];
      echo '<div class="day">';
      echo '<div class="date-day">' . $dateOfDay . ' ' . $day . '</div>';
      echo '<div class="events">';

      foreach ($courses as $course) {
        $courseDate = date("Y-m-d", strtotime($course['c_time'])); // Extract the date
        if ($courseDate == $dateOfDay) {
          $courseStartTime = strtotime($course['c_time']);
          $courseEndTime = strtotime("+2 hours", $courseStartTime); // Assuming each class is 2 hours

          // Calculate the position of the course
          $startHour = (int)date("G", $courseStartTime);
          $startMinutes = (int)date("i", $courseStartTime);
          $topPosition = ($startHour - 8) * 60 + $startMinutes; // Calculate position from top, starting at 8 AM
          $duration = ($courseEndTime - $courseStartTime) / 60; // Duration in minutes

          // Output the event
          echo '<div class="event" style="top: ' . $topPosition . 'px; height: ' . $duration . 'px;">';
          echo '<p class="title">' . $course['c_name'] . '</p>';
          echo '<p>' . date("g:i A", $courseStartTime) . ' - ' . date("g:i A", $courseEndTime) . '</p>';
          echo '<p>Room ' . $course['c_room'] . '</p>';
          echo '</div>';
        }
      }
      echo '</div></div>';
    }
    ?>
  </div>


</div>
</body>
</html>
