<?php
include 'dbconfig.in.php';


function getStudentById($pdo, $studentId) {
 
    $sql = "SELECT * FROM Student WHERE studentId = :studentId";

    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    
    $stmt->execute();
   
    return $stmt->fetch();
}


function Update ($pdo, $studentId, $studentData) {
    // SQL query to update a student record
    $sql = "UPDATE Student SET studentName = :studentName, gender = :gender, dateOfBirth = :dateOfBirth, department = :department, 
            avarege = :avarege, address = :address, city = :city, country = :country, 
            tel = :tel, email = :email WHERE studentId = :studentId";
   
    $stmt = $pdo->prepare($sql);
   
    $stmt->bindParam(':studentName', $studentData['studentName']);
    $stmt->bindParam(':gender', $studentData['gender']);
    $stmt->bindParam(':dateOfBirth', $studentData['dateOfBirth']);
    $stmt->bindParam(':department', $studentData['department']);
    $stmt->bindParam(':avarege', $studentData['avarege']);
    $stmt->bindParam(':address', $studentData['address']);
    $stmt->bindParam(':city', $studentData['city']);
    $stmt->bindParam(':country', $studentData['country']);
    $stmt->bindParam(':tel', $studentData['tel']);
    $stmt->bindParam(':email', $studentData['email']);
    
    $stmt->bindValue(':studentId', $studentId, PDO::PARAM_INT);
  
    $stmt->execute();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $studentId = $_POST['studentID'];
    $studentData = [
        'studentName' => $_POST['studentName'],
        'gender' => $_POST['gender'],
        'dateOfBirth' => $_POST['dateOfBirth'],
        'department' => $_POST['department'],
        'avarege' => $_POST['avarege'],
        'address' => $_POST['address'],
        'city' => $_POST['city'],
        'country' => $_POST['country'],
        'tel' => $_POST['tel'],
        'email' => $_POST['email']
    ];

    // Call the function to update the student record
    Update($pdo, $studentId, $studentData);

    // Redirect to the students.php page after updating
    header('Location: Students.php');
    exit;
}


if (isset($_GET['studentID'])) {
    $studentId = $_GET['studentID'];
    $student = getStudentById($pdo, $studentId);
    
    // If no student is found, display an error message
    if (!$student) {
        die("Student not found.");
    }
    
    
}
?>

<?php include 'Edit.html'; ?>