<?php
session_start();
include 'db_conn.php';
require_once __DIR__ . '/../../vendor/autoload.php'; // Include Composer's autoloader

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Define the function to notify students via email
function notify_students_email($pdo, $courseID, $email_from) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'sparkdelena@gmail.com'; // SMTP username
        $mail->Password = 'ebiq aheg vkjn kgwg'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port =  587; // TCP port to connect to
        $mail->IsHTML(true);
	    $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
		    )
	    );

        // Assuming $pdo is passed correctly into the function
        $stmt = $pdo->prepare("SELECT s.s_email, c.c_name, c.c_room, c.c_time, c.c_date FROM register s INNER JOIN student_courses sc ON s.s_id = sc.s_id INNER JOIN courses c ON sc.c_id = c.c_id WHERE sc.c_id = ?");
        $stmt->execute([$courseID]);
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($students as $student) {
            if (!empty($student['s_email'])) {
                //Recipients
                $mail->setFrom($email_from, 'Mailer');
                $mail->addAddress($student['s_email']); // Add a recipient

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Course Update Notification';
                $mail->Body    = "Hello,<br><br>This is a notification that the course '{$student['c_name']}' has been updated. The updated classroom is '{$student['c_room']}', and the time is {$student['c_time']} on {$student['c_date']}. Please check your calendar for more details.<br><br>Best regards,";
                $mail->AltBody = "Hello,\n\nThis is a notification that the course '{$student['c_name']}' has been updated. The updated classroom is '{$student['c_room']}', and the time is {$student['c_time']} on {$student['c_date']}. Please check your calendar for more details.\n\nBest regards,";

                $mail->send();
                echo "Email sent to: " . $student['s_email'] . "\n<br><br>";
            }
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Your email address
$email_from = 'sparkdelena@gmail.com';

// Check if course_id is set in the URL
if (isset($_GET['c_id'])) {
    $courseID = $_GET['c_id'];
    // Call the function with correct parameters
    notify_students_email($pdo, $courseID, $email_from);
} else {
    echo "Course ID not specified.";
}
?>
