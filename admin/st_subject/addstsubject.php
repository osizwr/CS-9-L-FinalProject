<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = (int)$_POST['selectstudent']; // Ensure studentID is an integer
    $subjects = $_POST['subjects'] ?? [];

    if (!empty($studentID) && !empty($subjects)) {
        foreach ($subjects as $subjectID) {
            $subjectID = (int)$subjectID; // Ensure subjectID is an integer

            // Check if the record already exists
            $checkQuery = "SELECT COUNT(*) AS count FROM studentsubjects WHERE studentID = ? AND subjectID = ?";
            $stmtCheck = $con->prepare($checkQuery);

            if (!$stmtCheck) {
                die("Prepare failed: " . $con->error);
            }

            $stmtCheck->bind_param("ii", $studentID, $subjectID);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();
            $row = $resultCheck->fetch_assoc();

            if ($row['count'] > 0) {
                echo "Subject ID $subjectID is already assigned to Student ID $studentID. Skipping...<br>";
                $stmtCheck->close();
                continue; // Skip the insert for this subject
            }
            $stmtCheck->close();

            // Insert the record
            $insertQuery = "INSERT INTO studentsubjects (studentID, subjectID) VALUES (?, ?)";
            $stmtInsert = $con->prepare($insertQuery);

            if (!$stmtInsert) {
                die("Prepare failed: " . $con->error);
            }

            $stmtInsert->bind_param("ii", $studentID, $subjectID);

            if ($stmtInsert->execute()) {
                echo "Successfully added Subject ID $subjectID for Student ID $studentID.<br>";
            } else {
                echo "Failed to add Subject ID $subjectID for Student ID $studentID: " . $stmtInsert->error . "<br>";
            }

            $stmtInsert->close();
        }
    } else {
        echo "Please select a student and at least one subject.";
    }
} else {
    echo "Invalid request.";
}
?>
