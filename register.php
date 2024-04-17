<?php
include 'dbconfig.in.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $studentID  = $_POST['studentID'];
    $studentName = $_POST['studentName'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $department = $_POST['department'];
    $avarege = $_POST['avarege'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $photo = $_POST['photo'];

    // Insert data into the database
    try {
        $sql = "INSERT INTO Student (studentID, studentName, gender, dateOfBirth,department,avarege,address,city,country,tel,email,photo) VALUES (:studentID, :studentName, :gender, :dateOfBirth, :department, :avarege, :address, :city, :country, :tel, :email, :photo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':studentID', $studentID, PDO::PARAM_INT);
        $stmt->bindValue(':studentName', $studentName, PDO::PARAM_STR);
        $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindValue(':dateOfBirth', $dateOfBirth, PDO::PARAM_STR);
        $stmt->bindValue(':department', $department, PDO::PARAM_STR);
        $stmt->bindValue(':avarege', $avarege, PDO::PARAM_INT);
        $stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $stmt->bindValue(':city', $city, PDO::PARAM_STR);
        $stmt->bindValue(':country', $country, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':photo', $photo, PDO::PARAM_STR);
     

        // Execute the statement
        $stmt->execute();


       
        header("Location: Students.php");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

?> 

<?php include 'register.html'; ?>