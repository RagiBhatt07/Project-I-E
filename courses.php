<?php include 'retrieve_courses.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Scrollable List with Colored Rectangles</title>
<style>
  body {
    background-color: #808080; /* Gray background */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .scroll-list {
    height: 400px; /* Set the height of the list container */
    width: 80%; /* Use a percentage of the viewport width for responsiveness */
    overflow-y: scroll; /* Add a scrollbar for vertical scrolling */
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow for better visibility */
  }
  .list-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 12px;
    padding: 20px; /* Larger padding for bigger items */
    color: black;
    border-radius: 15px; /* Slightly larger radius */
    font-size: 1.5em; /* Larger text */
  }
  /* Colors for different items */
  .item1 { background-color: #FFC0CB; }
  .item2 { background-color: #FFD700; }
  .item3 { background-color: #ADFF2F; }
  .item4 { background-color: #87CEEB; }
  .item5 { background-color: #BA55D3; }

  .list-item label {
    display: block;
    flex-grow: 1;
  }
  .list-item input[type="checkbox"] {
    margin-left: 20px; /* Larger margin for bigger checkbox */
    transform: scale(1.5); /* Scale up the checkbox */
  }
</style>
</head>
<body>

<div class="scroll-list">
  <?php
  $courses = getCourses();
  $colors = ['#FFC0CB', '#FFD700', '#ADFF2F', '#87CEEB', '#BA55D3']; // Color array
  foreach ($courses as $index => $course):
      $colorClass = "item" . ($index % count($colors) + 1); // Apply color class based on index
  ?>
    <div class="list-item <?php echo $colorClass; ?>">
        <label for="item<?php echo $course['c_id']; ?>">
            <?php echo htmlspecialchars($course['c_name']); ?><br>
            <?php echo htmlspecialchars($course['c_time']); ?> - 
            <?php echo htmlspecialchars($course['c_room']); ?><br>
            <?php echo htmlspecialchars($course['c_prof']); ?>
        </label>
        <input type="checkbox" id="item<?php echo $course['c_id']; ?>">
    </div>
  <?php endforeach; ?>
</div>
</body>
</html>
