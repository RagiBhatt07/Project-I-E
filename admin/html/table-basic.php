<?php
// Start a new session or resume the existing session
session_start();

// Include your database connection file here
require 'db_conn.php';

// SQL query to select data from classes table
$sql = "SELECT c_id, c_name, c_room, c_time, c_prof FROM courses";
$result = $conn->query($sql);

  
if ($result->num_rows > 0) {
                                                      
          while($row = $result->fetch_assoc()) {
              echo "<tr>
               <td>".$row["c_id"]."</td>
              <td>".$row["c_name"]."</td>
              <td>".$row["c_room"]."</td>
              <td>".$row["c_time"]."</td>
              <td>".$row["c_prof"]."</td>
              </tr>";
                   }
              } else {
                   echo "<tr><td colspan='4'>No results found</td></tr>";
                       }
                      $conn->close();
?>
                             

