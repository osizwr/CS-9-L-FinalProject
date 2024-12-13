<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = (int)$_POST['studentID'];
    $selectedSubjects = $_POST['subjects'] ?? [];

    // Fetch currently assigned subjects
    $currentSubjectsQuery = "SELECT subjectID FROM studentsubjects WHERE studentID = ?";
    $stmtCurrent = $con->prepare($currentSubjectsQuery);
    $stmtCurrent->bind_param("i", $studentID);
    $stmtCurrent->execute();
    $currentSubjectsResult = $stmtCurrent->get_result();

    $currentSubjects = [];
    while ($row = $currentSubjectsResult->fetch_assoc()) {
        $currentSubjects[] = $row['subjectID'];
    }
    $stmtCurrent->close();

    // Find subjects to add
    $subjectsToAdd = array_diff($selectedSubjects, $currentSubjects);
    foreach ($subjectsToAdd as $subjectID) {
        $subjectID = (int)$subjectID;
        $addQuery = "INSERT INTO studentsubjects (studentID, subjectID) VALUES (?, ?)";
        $stmtAdd = $con->prepare($addQuery);
        $stmtAdd->bind_param("ii", $studentID, $subjectID);
        $stmtAdd->execute();
        $stmtAdd->close();
    }

    // Find subjects to remove
    $subjectsToRemove = array_diff($currentSubjects, $selectedSubjects);
    foreach ($subjectsToRemove as $subjectID) {
        $subjectID = (int)$subjectID;
        $removeQuery = "DELETE FROM studentsubjects WHERE studentID = ? AND subjectID = ?";
        $stmtRemove = $con->prepare($removeQuery);
        $stmtRemove->bind_param("ii", $studentID, $subjectID);
        $stmtRemove->execute();
        $stmtRemove->close();
    }

    echo "Subjects updated successfully!";
}
?>
