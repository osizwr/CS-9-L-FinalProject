<?php
include '../../dbcon.php'; // Include your database connection file

$subject = "SELECT CONCAT(subjectCode, ' - ', subjectName) AS mysubject FROM subjects";
$stmt = $con->prepare($subject);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Loop through the result set and display the student details
    while ($row = $result->fetch_assoc()) {
        echo '<label class="selectgroup-item">
                    <input type="checkbox" name="value" value="HTML" class="selectgroup-input">
                    <span class="selectgroup-button">'. $row['mysubject'] . '</span>
                </label>';
    }
} else {
    echo "No Subject Found.";
}

$stmt->close();
?>

