<?php
include 'dbconfig.in.php';
if (isset($_GET['studentID'])) {
    $studentID = $_GET['studentID'];

    try {
        
        $sql = "DELETE FROM Student WHERE studentID = :studentID";
        $stmt = $pdo->prepare($sql);

    
        $stmt->bindParam(':studentID', $studentID, PDO::PARAM_INT);

       
        $stmt->execute();

        
        header("Location:Students.php");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "<p>No student ID provided.</p>";
}
?>