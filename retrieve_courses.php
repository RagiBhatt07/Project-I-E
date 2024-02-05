
<?php
// Function to retrieve courses
function getCourses() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query('SELECT c_id, c_name, c_room, c_time, c_prof FROM courses');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return [];
}
?>
