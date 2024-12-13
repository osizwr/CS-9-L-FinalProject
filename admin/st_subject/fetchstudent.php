<?php
include '../dbcon.php';

$student = "SELECT studentID, CONCAT(studentID, ' - ', lastName, ', ', firstName) AS studentName FROM students";
$stmt1 = $con->prepare($student);
$stmt1->execute();
$result = $stmt1->get_result();

if ($result->num_rows > 0) {
    // Loop through the result set and display the student details
    while ($row = $result->fetch_assoc()) {
        echo '<option class="selectgroup-item" value="'. $row['studentID'] . '">'. $row['studentName'] . '</option>';
    }
} else {
    echo "No Subject Found.";
}

$stmt1->close();
?>