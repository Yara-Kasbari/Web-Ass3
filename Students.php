<?php
include 'dbconfig.in.php';

try {
   
    $sql = "SELECT * FROM Student";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $Student = $stmt->fetchAll(PDO::FETCH_ASSOC);

	
	 echo '<div class="register">';
     echo 'To register a new Student, click on the following link <a href="register.php">Register</a><br>';
     echo '</div>';
     


    echo '<div style="margin-top: 20px;">';
    echo 'Or use the action below to edit or delete a student record.';
    echo '</div>';
    
    
     echo '<br>';

    echo '<table border="1">';
    echo '<caption> Students Table Result </caption>';
    echo '<tr><th>Student Photo</th><th>student ID</th><th>Student Name</th><th>Avarege</th><th>Department</th><th>Action</th></tr>';

    // Iterate over each student 
    foreach ($Student as $student) {
        
        echo '<tr>';
	  echo '<td><img src="./images/' . htmlspecialchars ($student['photo']) . '" alt="Student Photo"></td>';
		echo '<td>';
	 
        echo '<a href="viewStudent.php?studentID=' . htmlspecialchars($student['studentID']) . '">' . $student['studentID'] . '</a>';
		echo '</td>';
		
        echo '<td>' . htmlspecialchars($student['studentName']) . '</td>';
        echo '<td>' . htmlspecialchars($student['avarege']) . '</td>';
        echo '<td>' . htmlspecialchars($student['department']) . '</td>';
        echo '<td class="Action">' ;
		echo '<a href="Edit.php?studentID=' . htmlspecialchars($student['studentID']) . '"><img src="edit.png" alt="Edit"></a> ';
        echo '<a href="Delete.php?studentID=' . htmlspecialchars($student['studentID']) . '"><img src="delete.png" alt="Delete"></a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
    
} catch (PDOException $e) {
    // Handle any errors
    die("Error: " . $e->getMessage());
}

?>