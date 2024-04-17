<?php
include 'dbconfig.in.php';


if (isset($_GET['studentID'])) {
    $studentID = $_GET['studentID'];

    try {

        $sql = "SELECT * FROM Student WHERE studentID = :studentID";
        $stmt = $pdo->prepare($sql);

     
        $stmt->bindParam(':studentID', $studentID, PDO::PARAM_INT);

  
        $stmt->execute();


        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($student) {
            // Start the HTML content
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student Details</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 22px;
  }
  .student-photo {
    float: left;
    margin-right: 22px;
  }
  .student-details {
    font-size: 16px;
    line-height: 1.6;
  }
  .contact-info {
    margin-top: 20px;
  }
  .contact-info a {
    display: block;
    margin: 5px 0;
  }
</style>
</head>
<body>
<div class="student-photo">
  <?php
 
  $image_path = 'Assignment3/images/' . htmlspecialchars($student['studentID']) . '.jpeg';
  ?>
  <img src="<?php echo $image_path; ?>" alt="Student Photo" width="100">
</div>
<div class="student-details">
  <h2>Student ID: <?php echo htmlspecialchars($student['studentID']); ?>, Name: <?php echo htmlspecialchars($student['studentName']); ?></h2>
  <ul>
    <li>Average: <?php echo htmlspecialchars($student['avarege']); ?></li>
    <li>Department: <?php echo htmlspecialchars($student['department']); ?></li>
    <li>Date of birth: <?php echo htmlspecialchars($student['dateOfBirth']); ?></li>
  </ul>
</div>
<div class="contact-info">
  <strong>Contact</strong><br>
  <br>
  Send Email to: <a href="mailto:<?php echo htmlspecialchars($student['email']); ?>"><?php echo htmlspecialchars($student['email']); ?></a><br>
  Tel.: <a href="tel:<?php echo htmlspecialchars($student['tel']); ?>"><?php echo htmlspecialchars($student['tel']); ?></a><br>
  Address: <em><?php echo htmlspecialchars($student['address'] . ', ' . $student['city']); ?> </em>
         
</div>
</body>
</
html>

<?php
        } else {
            echo "<p>Student not found.</p>";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "<p>No student ID provided.</p>";
}
?>
