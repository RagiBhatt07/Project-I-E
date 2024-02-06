<?php
require_once 'vendor\autoload.php'; // Correct path to the Twilio SDK
use Twilio\Rest\Client;

function notify_students($course_id, $course_name) {
    include 'db_conn.php';  // Make sure this path is correct
    $twilio_sid = 'AC4c96c3e834b99d7b44c0a90a667302c2';
    $twilio_token = 'c6e1cbc5a17a2199da4ab208e28741e1';
    $twilio_from_number = '33785595633';
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
                    'body' => "Notification: The course '{$course_name}' has been updated. The updated classroom/class is :
                    "
                ]
            );
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
