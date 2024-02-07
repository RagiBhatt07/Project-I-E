<?php
session_start();
include 'db_conn.php';  // Make sure this path is correct

require_once '/vendor/autoload.php'; // Correct path to the Twilio SDK
use Twilio\Rest\Client;

// Define the function outside of the if statement
function notify_students($pdo, $courseID, $twilio_sid, $twilio_token, $twilio_from_number) {
    $client = new Client($twilio_sid, $twilio_token);

    try {
        // Assuming $pdo is passed correctly into the function
        $stmt = $pdo->prepare("SELECT s.s_phone, c.c_name, c.c_room, c.c_time, c.c_date FROM students s INNER JOIN student_courses sc ON s.s_id = sc.s_id INNER JOIN courses c ON sc.c_id = c.c_id WHERE sc.c_id = ?");
        $stmt->execute([$courseID]);
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($students as $student) {
            if (!empty($student['s_phone'])) {
                // Send the message
                $message = $client->messages->create(
                    $student['s_phone'], // to
                    [
                        'from' => $twilio_from_number,
                        'body' => "Notification: The course '{$student['c_name']}' has been updated. The updated classroom/class is '{$student['c_room']}' and the time is {$student['c_time']} on {$student['c_date']}. Please check your calendar for more details."
                    ]
                );
                echo "Message sent to: " . $student['s_phone'] . " SID: " . $message->sid . "\n";
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Twilio credentials
$twilio_sid = 'ACdeffc5778c18fb64ec6411e7fd99a765';
$twilio_token = 'a3528b839229c3089d5ed04993dddb75';
$twilio_from_number = '+13203342200';

// Check if course_id is set in the URL
if (isset($_GET['c_id'])) {
    $courseID = $_GET['c_id'];
    // Call the function with correct parameters
    notify_students($pdo, $courseID, $twilio_sid, $twilio_token, $twilio_from_number);
} else {
    echo "Course ID not specified.";
}
?>
