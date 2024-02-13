
<?php
// Function to retrieve courses
function getCourses() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query('SELECT c_id, c_name, c_room, c_time, c_endtime, c_prof, c_day FROM courses');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return [];
}


// Function to retrieve courses for a specific student
function getStudentCourses($studentId) {
    // Use the same database connection parameters as getCourses
    $host = 'localhost';
    $db   = 'calendar';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';


    // Set up options for PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        // Create a new PDO instance (connect to the database)
        $pdo = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');

        // Prepare the SQL query to fetch courses for a specific student
        $stmt = $pdo->prepare('
            SELECT c.c_id, c.c_name, c.c_room, c.c_time, c.c_endtime, c.c_prof, c.c_day
            FROM courses c
            INNER JOIN student_courses sc ON c.c_id = sc.c_id
            WHERE sc.s_id = :studentId
        ');

        // Execute the query with the student ID parameter
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch and return the courses
 
        return $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return [];
}




?>

