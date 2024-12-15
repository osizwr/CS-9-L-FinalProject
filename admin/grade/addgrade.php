<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $studentsubject_ids = $_POST['studentsubject_ids'];
    $grades = $_POST['grades'];

    // Validate input data
    if (count($studentsubject_ids) === count($grades)) {
        $stmt = $con->prepare("INSERT INTO studentgrades (studentSubjectID, gradeID) VALUES (?, ?)");

        // Process each grade
        foreach ($studentsubject_ids as $index => $studentsubject_id) {
            $grade_id = intval($grades[$index]);

            // Bind and execute the query
            $stmt->bind_param("ii", $studentsubject_id, $grade_id);

            if (!$stmt->execute()) {
                echo "Error inserting grade for Student Subject ID {$studentsubject_id}: " . $stmt->error . "<br>";
            }
        }

        $stmt->close();
        header("Location: ../manage-grades.php");
        exit();
    } else {
        echo "Error: Mismatch in submitted data. Please try again.";
    }
}

$con->close();
?>
