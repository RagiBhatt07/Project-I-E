<?php
require_once 'path/to/vendor/autoload.php'; // Correct path to the Twilio SDK
use Twilio\Rest\Client;

function notify_students($course_id, $course_name) {
    include 'db_conn.php';  // Make sure this path is correct
    $twilio_sid = 'YOUR_TWILIO_ACCOUNT_SID';
    $twilio_token = 'YOUR_TWILIO_AUTH_TOKEN';
    $twilio_from_number = 'YOUR_TWILIO_PHONE_NUMBER';
    $client = new Client($twilio_sid, $twilio_token);

    try {
        $stmt = $pdo->prepare("
            SELECT s_phone
            FROM student_courses sc
            JOIN students s ON sc.s_id = s.s_id
            WHERE sc.c_id = ?
        ");
        $stmt->execute([$course_id]);
        $students = $stmt->fetchAll();

        foreach ($students as $student) {
            $client->messages->create(
                $student['s_phone'],
                [
                    'from' => $twilio_from_number,
                    'body' => "Notification: The course '{$course_name}' has been updated."
                ]
            );
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
